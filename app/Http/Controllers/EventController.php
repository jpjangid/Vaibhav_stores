<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\EventOrder;
use Illuminate\Support\Facades\Route;
include_once(app_path() . '/razorpay/razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventBookingOrder;

class EventController extends Controller
{
    public function __construct()
    {
        // $name = Route::currentRouteName();
        // if($name == 'event.academyDetails')
        // {
        //     $this->middleware('auth');
        // }
    }
    public function academy()
    {
        $recentEvents = Event::where('event_date', '<', date("Y-m-d"))->where('is_published',1)->orderBy('event_date','DESC')->paginate(8);
        $upcomingEvents = Event::where('event_date', '>=', date("Y-m-d"))->where('is_published',1)->orderBy('event_date','ASC')->get();
        $page_title = 'Learn Latest Trends | Beauty Industry Techniques | Vaibhav Academy';
        $body_class = 'academy';
		 $meta_keyword = 'skills & techniques of beauty and fashion industry ';
        $meta_description = 'Learn the latest skills & techniques of beauty for the salon from industry experts. Boost your knowledge at Vaibhav Academy by attending workshops, seminars and training programs';
        return view('events.academy',compact('recentEvents','upcomingEvents','page_title','body_class','meta_keyword','meta_description'))
            ->with('i', (request()->input('page', 1) - 1) * 8);
    }
    public function academyDetails(Request $request, $id)
    {
        $user = auth()->user();
        $event = Event::find($id);

        //$keyId = 'rzp_test_GE1ObDQkLEiuRm';
       // $keySecret = 'EXduVTbD30P8JPrdpXAnKt98';
	   
         $keyId = 'rzp_live_f7q120n58ysQwH';
        $keySecret = 'xHKdv1TyRYrGr81uAfCDlFC0';
		
        $api = new Api($keyId, $keySecret);
        $amount = (float)$event->price*100;

        $orderData = [
            'receipt'         => 3456,
            'amount'          => $amount, // 2000 rupees in paise
            'currency'        => 'INR',
            'payment_capture' => 1 // auto capture
        ];

        $razorpayOrder = $api->order->create($orderData);
        $razorpayOrderId = $razorpayOrder['id'];

        $request->session()->put('razorpay_order_id', $razorpayOrderId);
        $name = "";
        $email = "";
        if($user)
        {
            $name = $user->name;
            $email = $user->email;
        }
        $data = [
            "key"               => $keyId,
            "amount"            => $amount,
            "name"              => "VAIBHAV STORES",
            "description"       => "A UNIT OF 28 SOUTH VENTURES",
            "image"             => url('/')."/static/images/logo.png",
            "prefill"           => [
            "name"              => $name,
            "email"             => $email,
            "contact"           => "",
            ],
            "notes"             => [
            "address"           => "",
            "merchant_order_id" => "",
            ],
            "theme"             => [
            "color"             => "#F37254"
            ],
            "order_id"          => $razorpayOrderId,
        ];


        $json = json_encode($data);

        
        $body_class = 'academy-detail';
		$page_title = $event->meta_title;
		 $meta_keyword = $event->meta_keyword;
        $meta_description = $event->meta_description;
        return view('events.academy-detail',compact('event','page_title','body_class', 'json', 'user','meta_keyword','meta_description'));
    }
    public function academyBuy(Request $request, $id)
    {
        $user = auth()->user();
        $event = Event::find($id);

        $razorpay_order_id = null;
        $razorpay_payment_id = null;
        $razorpay_signature = null;

       // $keyId = 'rzp_test_GE1ObDQkLEiuRm';
       // $keySecret = 'EXduVTbD30P8JPrdpXAnKt98';
		
		$keyId = 'rzp_live_f7q120n58ysQwH';
        $keySecret = 'xHKdv1TyRYrGr81uAfCDlFC0';
		
        $success = true;
        $error = "Payment Failed";
        if (empty($_POST['razorpay_payment_id']) === false)
        {
            $api = new Api($keyId, $keySecret);

            try
            {
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => $request->session()->get('razorpay_order_id'),
                    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                    'razorpay_signature' => $_POST['razorpay_signature']
                );

                $api->utility->verifyPaymentSignature($attributes);
            }
            catch(SignatureVerificationError $e)
            {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }

        if ($success === true)
        {
            $online_payment = "success";
            $razorpay_order_id = $request->session()->get('razorpay_order_id');
            $razorpay_payment_id = $_POST['razorpay_payment_id'];
            $razorpay_signature = $_POST['razorpay_signature'];

            #Saving Order
            $Order = new EventOrder;
            $Order->event_id = $event->id;
            $Order->order_date = date('Y-m-d H:i:s');
            if($user)
            {
                $Order->user_id = $user->id;
            }
            $Order->order_no = $this->newOrderNumber();
            $Order->order_amount = $event->price;
            $Order->payment_status = 'success';
            $Order->name = $request->name;
            $Order->mobile = $request->mobile;
            $Order->email = $request->email;
            $Order->razorpay_order_id = $razorpay_order_id;
            $Order->razorpay_payment_id = $razorpay_payment_id;
            $Order->razorpay_signature = $razorpay_signature;
            $Order->save();
            sendSms($request->mobile,"Thank you for registering. We will share the other details soon. Thank you. Vaibhav Academy. Ph: +91 8041518183");
            Mail::to($request->email)->send(
                new EventBookingOrder(
                    $request->name,
                    $Order->order_no,
                    'Your event ticket booked successfully.',
					$request->mobile,
						$request->email,
						$online_payment,
						$event->price,
						$event->name,
						$event->image,
						$event->id
                    )
                );
            Mail::to('academy@vaibhavstores.in')->send(
                    new EventBookingOrder(
                         $request->name,
                        $Order->order_no,
                        'Event ticket booked.',
						$request->mobile,
						$request->email,
						$online_payment,
						$event->price,
						$event->name,
						$event->image,
						$event->id
                        )
                    );
            return redirect()->route('event.academy')
                        ->with('success','Event ticket booked successfully.');
        }
        else
        {
            return redirect()->route('event.academyDetails', $event->id)
                    ->with('fail','Payment failed.');
        }
        exit;
    }

    public function newOrderNumber()
    {
        $order = EventOrder::latest('order_no')->limit(1)->first();
        if ($order) return $order->order_no+1;
        else return 1001;
    }
}
