<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Order</title>
</head>
<body style="margin:0;">

<div style="font:normal 17px 'Poppins',sans-serif;width:600px;max-width:100%; margin:auto;background:#f1f1f1;line-height:1.3">
	<div style="border-bottom:1px solid #9e9e9e; margin:0 30px;text-align:center;padding:15px 15px 12px">
		<img src="{{ asset('storage/images/logo.png') }}" alt="Vaibhav">
	</div>
	<div style="background:#e51a4b;color:#fff;margin-top:36px;text-align:center;padding:20px;">
		<h2 style="font-size:25px;text-transform:uppercase;font-weight:normal;font-weight:500;margin:0;text-align:center;color:#fff;">Order Confirmation</h2>
		<p style="text-align:center;color:#fff;"><?php echo $name; ?>, thank you for your order!</p>
		<p style="max-width:500px;margin:0 auto;text-align:center;color:#fff;">We’ve received your order and will contact you as soon as your package is shipped. You can find your purchase information below.</p>
	</div>
	
	<h2 style="font-size:25px;font-weight:normal;font-weight:500;margin:0;text-align: center;
    padding: 40px 20px 20px;">Order Summary</h2>
	
  <div style="padding:15px;">
  	<table cellpadding="0" cellspacing="0" style="width:100%;">
<?php
	$total_Gst=0; $subtotal_amount=0; $grand_toatal=0;
	foreach($orders->OrderRows as $orderrow){
		$gst=0;
		
		if($orders->bill_state=='Rajasthan'){
			$total_Gst+=round($orderrow->cgst+$orderrow->sgst);
			$gst+=round($orderrow->cgst+$orderrow->sgst);
			
		}else{
			$total_Gst+=round($orderrow->igst);
			$gst+=round($orderrow->igst);
		}
		$subtotal_amount+=$orderrow->taxable_amount*$orderrow->quantity;
		$grand_toatal+=$orderrow->total_amount;
		?>
  		<tr>
  			<td style="vertical-align:top" width="244">
  				<img src="{{ asset('storage/product/'.$orderrow->product->productImages[0]->image) }}" alt="Vaibhav" style="border:1px solid #9e9e9e">
  			</td>
  			<td style="vertical-align:top;padding-left:15px;line-height:1.55;">
  				<table cellpadding="0" cellspacing="0" width="100%" style="border-top:1px solid #9e9e9e;">
					<tr>
						<td width="40%" style="font-weight:bold">Product </td>
						<td align="right">{{ $orderrow->product->name }}</td>
					</tr>
					<tr>
					  <td>Quantity</td>
					  <td align="right"> {{ $orderrow->quantity }}</</td>
				   </tr>
				  <tr>
					  <td>Price</td>
					  <td align="right">Rs. {{ $orderrow->taxable_amount }}</td>
				  </tr> 
				  <tr>
					  <td>Sub Total</td>
					  <td align="right" >Rs. {{ $orderrow->taxable_amount*$orderrow->quantity }}</td>
				  </tr> 
				  <tr>
					  <td>Gst</td>
					  <td align="right" >Rs. {{ $gst }}</td>
				  </tr> 
				  <tr>
					  <td>Total Amount</td>
					  <td align="right" style="color:#e51a4b;font-weight:bold;font-size:19px;">Rs. {{ $orderrow->total_amount }}</td>
				  </tr>
			    </table>
				
  			</td>
  		</tr>
	<?php } ?>
	
		<tr>
			<td style="vertical-align:top" width="244">
  			</td>
  			<td style="vertical-align:top;padding-left:15px;line-height:1.55;">
  				<table cellpadding="0" cellspacing="0" width="100%" style="border-top:1px solid #9e9e9e;">
					<tr>
					  <td>Sub Total</td>
					  <td align="right"> {{ $subtotal_amount }}</</td>
				   </tr>
				    <tr>
					  <td>Total Gst</td>
					  <td align="right"> {{ $total_Gst }}</</td>
				   </tr>
					<tr>
					  <td>Grand Total </td>
					  <td align="right" style="color:#e51a4b;font-weight:bold;font-size:19px;"> {{ $grand_toatal }}</</td>
				   </tr>
				
				</table>
			</td>
				
		
		</tr>
	
  	</table>
		
  </div>
  
  	<h2 style="font-size:25px;font-weight:normal;font-weight:500;margin:0;text-align: center; padding: 40px 20px 30px;">Address Details</h2>
  	
  	<div style="padding:15px;">
  		<div style="border:1px solid #9e9e9e;max-width:532px;margin:auto;text-align:center;">
			<div style="display:inline-block;max-width:100%;width:230px;padding:20px 15px;">
				<h2 style="font-size:23px;font-weight:normal;font-weight:500;margin:0; padding:0;">Billing</h2>
				<p style="font-size:20px;">
					{{ $orders->bill_name }}<br>
					{{ $orders->bill_mobile }}<br>
					{{ $orders->bill_address }}<br>
					{{ $orders->bill_state }}<br>
					{{ $orders->bill_pincode }}
					
				</p>
			</div>
			<div style="display:inline-block;max-width:100%;width:230px;padding:20px 15px;">
				<h2 style="font-size:23px;font-weight:normal;font-weight:500;margin:0; padding:0;">Shipping</h2>
				<p style="font-size:20px;">
					{{ $orders->ship_name }}<br>
					{{ $orders->ship_mobile }}<br>
					{{ $orders->ship_address }}<br>
					{{ $orders->ship_state }}<br>
					{{ $orders->ship_pincode }}
					
				</p>
			</div>
  		</div>
  	</div>
  	
  	<div style="padding:15px;">
  		<div style="max-width:532px;margin:20px auto 0;">
			<table cellpadding="0" cellspacing="0" width="100%;">
				<tr>
					<td width="50%">
						<h2 style="font-size:25px;font-weight:normal;font-weight:500;margin:0;"><strong>Payment Type </strong></h2>
						<p style="font-size:25px;font-weight:300;margin:0">Online</p>
					</td>
					<td width="50%">
						<h2 style="font-size:25px;font-weight:normal;font-weight:500;margin:0;"><strong>Payment Status </strong></h2>
						<p style="font-size:25px;font-weight:300;margin:0">Success</p>
					</td>
				</tr>
			</table>
		</div>
		
		<div style="text-align:center;margin-top:40px;">
			<a href="{{ route('orders.show',[$orders->id]) }}" style="background:#e51a4b;color:#fff;font-size: 25px;font-weight: 600;text-decoration: none;padding: 7px 30px;border-radius: 3px;display: inline-block;margin:auto">View Order</a>
		</div>
  	</div>
  	
  	<div style="padding:0 15px;">
  		<div style="max-width:532px;margin:5px auto 0;text-align:center;background:#fff;padding:0 10px 10px">
  			<p style="background:#f4f4f4;width:150px;height:20px;margin:0 auto"></p>
  			<p style="font-size:16px;margin:-8px 0 14px;text-align:center;"><span style="border-bottom:1px solid #e51a4b">Visit Us</span></p>
  			
  			<div>  
  				<a href="https://www.facebook.com/vaibhavstores.in" target="_blank" style="margin:0 3px"><img src="{{ asset('storage/images/fb.png') }}" alt="Facebook"></a>
  				<a href="#" target="_blank" style="margin:0 3px"><img src="{{ asset('storage/images/twitter.png') }}" alt="Twitter"></a>
  				<a href="https://www.instagram.com/vaibhavstores/" target="_blank" style="margin:0 3px"><img src="{{ asset('storage/images/insta.png') }}" alt="Instagram"></a>
  				<a href="https://in.pinterest.com/vaibhavstores/" target="_blank" style="margin:0 3px"><img src="{{ asset('storage/images/pinterest.png') }}" alt="Pinterest"></a>
  			</div>
			<div>
				<p style="text-align:center;"> For any complaints/suggestion email on <a href="mailto:md@28southventures.com">md@28southventures.com </a></p>
			</div>
  		</div>	
  	</div>
</div>
	

</body>
</html>
