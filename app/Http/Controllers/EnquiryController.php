<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquiry;
use App\Category;
use App\Product;
use App\Brand;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomEmailId;

class EnquiryController extends Controller
{
    public function care()
    {
        $page_title = 'Buy Or Sell Old Furniture, Electricals and Equipment | Vaibhav Care';
        $meta_keyword = 'sell old furniture & equipments';
        $meta_description = 'Care serves as a platform where you can either buy or sell old furniture & equipment. We at Vaibhav store provide you with top repair and restoration services.';
        $body_class = 'care';
        return view('enquiries.care',compact('page_title','body_class','meta_keyword','meta_description'));
    }

    public function plus()
    {
        $page_title = 'Fastest Same Day Delivery Service for Retailers | Vaibhav Plus';
        $body_class = 'plus';
		 $meta_keyword = 'same day delivery';
        $meta_description = 'Vaibhav plus offers same day delivery services of all the beauty salon products for retailers, wholesalers, dealers & distributors to avoid middlemen chain.';
        return view('enquiries.plus',compact('page_title','body_class','meta_keyword','meta_description'));
    }

    public function xpress()
    {
        $page_title = 'Salon Products Delivery | Express Delivery Service | Vaibhav Xpress';
        $body_class = 'xpress';
		 $meta_keyword = 'express delivery service';
        $meta_description = 'Get the express delivery service for all the salon furniture, products for the salon, salon chairs, from the top leading distributors at Vaibhav Stores.';
        return view('enquiries.xpress',compact('page_title','body_class','meta_keyword','meta_description'));
    }
    public function store(Request $request)
    {
         $query_category_slug = $request->query_category_slug;
        
        if($request->enquiry_type == 'Care' || $request->enquiry_type == 'furniture' || $request->enquiry_type == 'consumable' || $request->enquiry_type == 'electrical') {
            $ticket_no = $this->newTicketNumber();
            $request->request->add(['ticket_no' => $ticket_no]);
        }
		
		 if($request->enquiry_type != 'Subscribe Email'){
				Enquiry::create($request->all());
		 }
        if($request->enquiry_type == 'Care') {
           $from_email = 'service@vaibhavcare.com';
          //$from_email = 'rohitkumarjoshi43@gmail.com';
         // 'Your complaint has been submited. Your ticket no. is '.$ticket_no.'.',
		 
            Mail::to($request->email)->bcc($from_email)->send(
                new CustomEmailId(
                     $ticket_no,
					  $request->enquiry_message,
					  $request->name,
					 $request->mobile_no,
					 $request->email,
					 '',
					'',
					'',
					'',
					$request->enquiry_type
		
                    )
                );
				
            return redirect()->route('enquiry.care')
                        ->with('success','Your complaint has been submited. Your ticket no. is '.$ticket_no.'.');
        }
        else if ($request->enquiry_type == 'furniture' || $request->enquiry_type == 'consumable' || $request->enquiry_type == 'electrical') {
			
			//$product = Product::where('id',$request->product_id)->first();
			$product = Product::with(['productImages'])->where('id',$request->product_id)->first();
			$product_image=$product->productImages[0]->image;
            if($request->enquiry_type == 'furniture') {
                $from_email = 'info@vaibhavstores.in';
            }
            else if($request->enquiry_type == 'consumable') {
                $from_email = 'enquiry@vaibhavstores.in';
            }
            else if($request->enquiry_type == 'electrical') {
				$sub_category_id=$product->sub_category_id;
			
				$subcategory=[72,24,46,48,51,61,52];
				if(in_array($sub_category_id, $subcategory)){
					
					$from_email = 'enquiry@vaibhavstores.in';
				}else{
					$from_email = 'info@vaibhavstores.in';
					
				}
               // $from_email = 'enquiry@vaibhavstores.in';
            }
			//$from_email="rohitkumarjoshi43@gmail.com";
            sendSms($request->mobile_no,"Thank you for placing an inquiry with us. Our representative will contact you soon. Thanks, Vaibhav Stores. Ph: +91 8041518183");
            Mail::to($request->email)->cc($from_email)->send(
                new CustomEmailId(
                    $ticket_no,
                    $request->enquiry_message,
					$request->name,
					$request->mobile_no,
					$request->email,
					$product->name,
					'',
					$product_image,
					'',
					$request->enquiry_type
                    )
                );
                return 'Thank you for enquiry and we will get back to you.';
        }
        elseif ($request->enquiry_type == 'Subscribe Email') {
			 $enquiry = Enquiry::where('enquiry_type',$request->enquiry_type)->where('email',$request->email)->first();
			 if($enquiry){
			  return 'This id is already subscribed.';
			 }else{
				 Enquiry::create($request->all()); 
				 Mail::to($request->email)->bcc('marketing@28southventures.com')->send(
                new CustomEmailId(
                    '',
                    'Email subscribed successfully',
					$request->name,
					$request->mobile_no,
					$request->email,
					'',
					'',
					'',
					'',
					$request->enquiry_type
                    )
                );
				 
				 
				 return 'Email subscribed successfully.';
			 }
            
        }
        elseif($request->enquiry_type == 'Xpress') { 
            Mail::to($request->email)->bcc('sales@vaibhavxpress.com')->send(
                new CustomEmailId(
                    '',
                    $request->enquiry_message,
					$request->name,
					$request->mobile_no,
					$request->email,
					'',
					'',
					'',
					'',
					$request->enquiry_type
                    )
                );
            return redirect()->route('enquiry.xpress')
                        ->with('success','Enquiry created successfully');
        }
        elseif($request->enquiry_type == 'Plus') {
			
            Mail::to($request->email)->bcc('sales@vaibhavplus.com')->send(
                new CustomEmailId(
                    '',
                    $request->enquiry_message,
					$request->name,
					$request->mobile_no,
					$request->email,
					'',
					'',
					'',
					'',
					$request->enquiry_type
                    )
                );
            return redirect()->route('enquiry.plus')
                        ->with('success','Enquiry created successfully');
        }
        elseif($request->enquiry_type == 'brand') {
			 sendSms($request->mobile_no,"Thank you for placing an inquiry with us. Our representative will contact you soon. Thanks, Vaibhav Stores. Ph: +91-8073422019");
			 
			  $BrandDetails = Brand::where('name',$query_category_slug)->first();
				//vedshukla1992@gmail.com 
            Mail::to($request->email)->bcc('enquiry@vaibhavstores.in')->send(
                new CustomEmailId(
                    '',
                    $request->enquiry_message,
					$request->name,
					$request->mobile_no,
					$request->email,
					'',
					$query_category_slug,
					'',
					$BrandDetails->logo,
					$request->enquiry_type
                    )
                );
                return 'Enquiry created successfully.';
             //return redirect()->route('brand.detail',$query_category_slug)
                        // ->with('success','Enquiry created successfully');
        }
    }

    public function complaintSearch(Request $request)
    {
        $enquiry = Enquiry::where('ticket_no',$request->ticket_no)->first();

        return view('enquiries.complaint_search',compact('enquiry'));
    }

    public function newTicketNumber()
    {
        $enquiry = Enquiry::where('ticket_no', '>', 0)->latest('ticket_no')->first();
        if ($enquiry) return $enquiry->ticket_no+1;
        else return 1001;
    }

}
