<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Order</title>
</head>
<body style="margin:0;">

<div style="font:normal 16px 'Poppins',sans-serif;width:600px;max-width:100%; margin:auto;background:#f1f1f1;line-height:1.3">
	<div style="border-bottom:1px solid #9e9e9e; margin:0 30px;text-align:center;padding:15px 15px 12px">
		<img src="{{ asset('storage/images/logo.png') }}" alt="Vaibhav">
	</div>
	
	<div style="padding:35px 20px;text-align:center">
		
		<img src="{{ asset('storage/images/thank.png') }}" alt="Vaibhav">
		<h2 style="font-size:49px;font-weight:normal;margin:0;text-align:center;">Thank you!</h2>
		<p style="font-size:26px;font-weight:normal;margin:0;text-align:center;"> 
		<?php if($enquiry_type!='Care'){ ?>
				for your enquiry
			<?php }else{ ?>  Your complaint has been registered.  <?php } ?></p>
	</div>
	 
	<div style="padding:0 15px;">
		<div style="max-width:532px;margin:auto">
			<div style="background:#e51a4b;color:#fff;border:1px solid #9e9e9e;margin:10px 0;text-align:center;padding:2px 15px;font-size:20px;font-weight:600">
			<?php if($enquiry_type!='Care'){ ?>
				Enquiry Details
			<?php }else{ ?>  Complaint Details  <?php } ?>
			</div>
			
			<table cellpadding="0" cellspacing="0" style="width:100%; margin-bottom:7px">
				<tr>
					
					<?php if(!empty($product_image)){ ?>
						<td style="vertical-align:top" width="172">
						<img src="{{ asset('storage/product/'.$product_image) }}" alt="Vaibhav" style="border:1px solid #9e9e9e">
						</td>
					<?php }else if(!empty($brandimage)){ ?>
					<td style="vertical-align:top" width="172">
						<img src="{{ asset('storage/brand/'.$brandimage) }}" alt="Vaibhav" style="border:1px solid #9e9e9e">
					</td>
					<?php }else{ ?>
					<!--<td style="vertical-align:top" width="172"><img src="{{ asset('storage/images/pro2.jpg') }}" alt="Vaibhav" style="border:1px solid #9e9e9e"> </td>-->
					
					<?php } ?>
					
					<td style="vertical-align:top;padding-left:15px;line-height:1.55;line-height:1.6;">
						<table cellpadding="0" cellspacing="0" width="100%" style="margin-top:5px">
						<?php if(!empty($product_name)){ ?>
							<tr>
							  <td width="40%">Product Name:</td>
							  <td style="padding-left:12px" width="60%"><?php echo @$product_name; ?></td>
						  </tr>
						<?php } ?>
						<?php if(!empty($brandname)){ ?>
							<tr>
							  <td>Brand Name:</td>
							  <td style="padding-left:12px"><?php echo @$brandname; ?></td>
						  </tr>
						<?php } ?>
							<tr>
							  <td>Name:</td>
							  <td style="padding-left:12px"><?php echo @$name; ?></td>
						  </tr>
							<tr>
							  <td>Email:</td>
							  <td style="padding-left:12px"><?php echo @$email; ?></td>
						  </tr>
							<tr>
							  <td>Contact No.:</td>
							  <td style="padding-left:12px"><?php echo @$mobile; ?></td>
						  </tr>
							<tr>
							  <td>Message :</td>
							  <td style="padding-left:12px"><?php echo @$messages; ?></td>
						  </tr>
				  </table></td>
				</tr>
			</table>
		</div>
	</div>
	
  	<div style="padding:0 15px;">
  		<div style="max-width:532px;margin:5px auto 0;text-align:center;background:#fff;padding:0 10px 10px">
  			<p style="background:#f4f4f4;width:150px;height:20px;margin:0 auto"></p>
  			<p style="font-size:16px;margin:-8px 0 14px;text-align:center;"><span style="border-bottom:1px solid #e51a4b;text-align:center;">Visit Us</span></p>
  			
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
