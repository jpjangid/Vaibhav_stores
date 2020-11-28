@extends ('layouts.front')

@section ('content')


<section class="academy-information--wrapper">
    <div class="container-fluid">
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="breadcrumb-wrap">
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Academy</li>
                </ol>
             </nav>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="title-ui--wrap">
             <div class="title-text--middle">
                <h2>Event Title</h2>
             </div>
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert" data-dismiss="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="academy-information--grid">
             <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="academy-information--image" data-toggle="modal" data-target="#imgzoom">
					<img src="{{ asset('storage/event/'.$event->id.'/'.$event->image) }}" alt=""/>
					<div class="academy-excerpt--action"><a href="javascript:void(0);">Enlarge</a></div>
                </div>
				
                @if ($event->event_date > date('Y-m-d'))
                <div class="academy-information--book">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#ticket_modal">Book Your Tickets</a>
                    <form  action="{{ route('event.academyBuy', $event->id) }}" method="POST"  class="kt-form" id="event-form" name="razorpayform">
                        @csrf
                        <div class="modal fade" id="ticket_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">User Information</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($user)
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="mb-3">
                                                    <label for="city">Name*</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="mb-3">
                                                    <label for="city">Mobile No.*</label>
                                                    <input type="text" class="form-control" id="mobile" name="mobile" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="mb-3">
                                                    <label for="city">Email*</label>
                                                    <input type="text" class="form-control" id="email" name="email"  value="{{ $user->email }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="mb-3">
                                                        <label for="city">Name*</label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="mb-3">
                                                        <label for="city">Mobile No.*</label>
                                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="mb-3">
                                                        <label for="city">Email*</label>
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="" required>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="do-payment" class="btn btn-primary">Buy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                        <input type="hidden" name="razorpay_signature"  id="razorpay_signature">
                    </form>
                </div>
                @endif
             </div>
             <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="academy-information--text">
                   <?php echo $event->description; ?>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 
 <div class="modal fade" id="imgzoom" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header" style="padding: 0;border: none;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
			</div>
			<div class="modal-body">
				<img src="{{ asset('storage/event/'.$event->id.'/'.$event->image) }}" alt="Vaibhav" class="img-fluid"/>
			</div>
		</div>
	</div>
</div>


@endsection

@section ('footer-script')
<div class="whats-app-icon hide-on-mobile d-none d-lg-block">
      <a class="nav-link whats-app" href="https://web.whatsapp.com/send?phone=+916366094647&text=<?php echo Request::fullUrl(); ?>" 
      target="_blank">
		<img src="<?php echo url('/'); ?>/static/images/whatsapp.png" width="60" alt="WhatsApp"/>
		
	  </a>
</div>
<script src="<?php echo url('/'); ?>/static/js/jquery.zoom.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    $( "#event-form" ).validate({
      rules: {
        name: {
          required: true
        },
        email: {
            email: true,
          required: true
        },
        mobile: {
            required: true,
            minlength:10,
            maxlength:10,
            number: true
        }
      },
        messages:{
            name:"Please enter your name",
            email:"Please enter your email",
            mobile:"Enter your mobile no."
        }
    });
    // Checkout details as a json
    var options = <?php echo $json?>;

    /**
     * The entire list of Checkout fields is available at
     * https://docs.razorpay.com/docs/checkout-form#checkout-fields
     */
    options.handler = function (response){
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.razorpayform.submit();
    };

    // Boolean whether to show image inside a white frame. (default: true)
    options.theme.image_padding = false;

    options.modal = {
        ondismiss: function() {
            console.log("This code runs when the popup is closed");
        },
        // Boolean indicating whether pressing escape key
        // should close the checkout form. (default: true)
        escape: true,
        // Boolean indicating whether clicking translucent blank
        // space outside checkout form should close the form. (default: false)
        backdropclose: false
    };

    var rzp = new Razorpay(options);

    $(document).on('click', '#do-payment', function(){
        if($("#event-form").valid()){
            rzp.open();
            e.preventDefault();
        }
    });


</script>
@endsection
