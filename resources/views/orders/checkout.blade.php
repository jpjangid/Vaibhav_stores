@extends ('layouts.front')


@section ('content')

<form  action="{{ route('saveCheckout') }}" method="POST"  class="kt-form" id="checkout-form" name="razorpayform">
@csrf
<section class="shopping-address--wrapper">
    <div class="container-fluid">
        <div class="shopping-address--grids">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
             <div class="organize-address--wrap">
                <div class="billing-address--block">
                    <h4 class="mb-3">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" id="bill_name" name="bill_name" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid name is required.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Email*</label>
                                <input type="text" class="form-control" id="bill_email" name="bill_email" placeholder="" value="{{ auth()->user()->email }}" required>
                                <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="mobileno">Mobile No.*</label>
                                <input type="text" class="form-control" id="bill_mobile" name="bill_mobile" value="" placeholder="" required>
                                    <div class="invalid-feedback">
                                    Please enter a valid mobile no.
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="address">Address*</label>
                                <input type="text" class="form-control" id="bill_address" name="bill_address" placeholder="" required>
                                <div class="invalid-feedback">
                                    Please enter your billing address.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="pincode">Pincode*</label>
                                <input type="text" class="form-control" id="bill_pincode" name="bill_pincode" placeholder="" required>
                                <div class="invalid-feedback">
                                    Please enter your pincode.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="city">City*</label>
                                <input type="text" class="form-control" id="bill_city" name="bill_city" placeholder="" required>
                                <div class="invalid-feedback">
                                    Please enter your city.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="state">State*</label>
                                <input type="text" class="form-control" id="bill_state" name="bill_state" placeholder="" required>
                                <div class="invalid-feedback">
                                    Please enter your state.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="landmark">Landmark</label>
                                <input type="text" class="form-control" id="bill_landmark" name="bill_landmark" placeholder="">
                                <div class="invalid-feedback">
                                    Please enter your landmark.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" checked class="custom-control-input" name="same_as_billing" value="1" id="same-address">
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                    </div>
                    <div id="shippingAddress" style="display:none;">
                        <h4 class="my-3">Shipping Address</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control" id="ship_name" name="ship_name" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Valid name is required.
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mobileno">Mobile No.*</label>
                                    <input type="text" class="form-control" id="ship_mobile" name="ship_mobile" placeholder="" required>
                                        <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="address">Address*</label>
                                    <input type="text" class="form-control" id="ship_address" name="ship_address" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Please enter your billing address.
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="pincode">Pincode*</label>
                                    <input type="text" class="form-control" id="ship_pincode" name="ship_pincode" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Please enter your pincode.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="city">City*</label>
                                    <input type="text" class="form-control" id="ship_city" name="ship_city" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Please enter your city.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="state">State*</label>
                                    <input type="text" class="form-control" id="ship_state" name="ship_state" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Please enter your state.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="landmark">Landmark</label>
                                    <input type="text" class="form-control" id="ship_landmark" name="ship_landmark">
                                    <!-- <div class="invalid-feedback">
                                        Please enter your landmark.
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                </div>
             </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="shopping-cart--values">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary</div>
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total Items</strong><strong>{{ $totalItems }}</strong></li>
                            <li class="justify-content-between py-3 border-bottom" hidden><strong class="text-muted">Shipping and handling</strong><strong>0.00</strong></li>
                           <li class="justify-content-between py-3 border-bottom" hidden><strong class="text-muted">Sub Total</strong><strong>{{ $subtotal }}</strong></li>
                             <li class="justify-content-between py-3 border-bottom" hidden><strong class="text-muted">Tax</strong><strong>{{ $totalgst }}</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Total</strong>
                            <h5 class="font-weight-bold">{{ $totalAmount }}</h5>
                            </li>
                            {{-- <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Payment Options</strong>
                            <label><input type="radio" name="payment_mode" value="online" checked="checked"> Online</label>
                            <label><input type="radio" name="payment_mode" value="cod" > COD</label>
                            </li> --}}
                        </ul>
                        <button class="btn btn-dark rounded-pill py-2 btn-block" id="do-payment" type="button">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
<input type="hidden" name="razorpay_signature"  id="razorpay_signature">
</form>
@endsection


@section ('footer-script')
<script src="<?php echo url('/'); ?>/static/js/jquery.zoom.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    $( "#checkout-form" ).validate({
      rules: {
        ship_name: {
          required: true
        },
        ship_mobile: {
            required: true,
            minlength:10,
              maxlength:10,
              number: true
        },
        bill_mobile: {
            minlength:10,
              maxlength:10,
              number: true
        }
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
        if($("#checkout-form").valid()){
            // var payment_mode = $("input[name=payment_mode]:checked").val();
            var payment_mode = "online";
            if (payment_mode=="online") {
                rzp.open();
                e.preventDefault();
            } else {
                $("#checkout-form").submit();
            }
        }
    });


    $("#bill_pincode").blur(function() {
            var zip = $(this).val();
            var path="{{ route('pincode') }}";

            $.ajax(path, {
                type: 'GET',
                dataType: "JSON",
                data: {
                    zip: zip
                },
                success: function(data) {
                    
                    $("#bill_city").val(data.city);
                    $("#bill_state").val(data.state);
                }
            });
        });
        
        $("#ship_pincode").blur(function() {
            var zip = $(this).val();
            var path="{{ route('pincode') }}";

            $.ajax(path, {
                type: 'GET',
                dataType: "JSON",
                data: {
                    zip: zip
                },
                success: function(data) {
                    
                    $("#ship_city").val(data.city);
                    $("#ship_state").val(data.state);
                }
            });
        });

    jQuery(document).ready(function() {
        $(document).on('blur','.form-control',function(e){
            sameAddress();
        });
        $(document).on('change','#same-address',function(e){
            if($(this).is(':checked'))
            {
                $('#shippingAddress').hide();
                $('#ship_name').val($('#bill_name').val());
                $('#ship_mobile').val($('#bill_mobile').val());
                $('#ship_address').val($('#bill_address').val());
                $('#ship_pincode').val($('#bill_pincode').val());
                $('#ship_city').val($('#bill_city').val());
                $('#ship_state').val($('#bill_state').val());
                $('#ship_landmark').val($('#bill_landmark').val());
            }
            else
            {
                $('#shippingAddress').show();
                $('#ship_name').val('');
                $('#ship_mobile').val('');
                $('#ship_address').val('');
                $('#ship_pincode').val('');
                $('#ship_city').val('');
                $('#ship_state').val('');
                $('#ship_landmark').val('');
            }
        });

        function sameAddress()
        {
            if($('#same-address').is(':checked'))
            {
                    $('#ship_name').val($('#bill_name').val());
                    $('#ship_mobile').val($('#bill_mobile').val());
                    $('#ship_address').val($('#bill_address').val());
                    $('#ship_pincode').val($('#bill_pincode').val());
                    $('#ship_city').val($('#bill_city').val());
                    $('#ship_state').val($('#bill_state').val());
                    $('#ship_landmark').val($('#bill_landmark').val());
            }
        }
    });
</script>
@endsection
