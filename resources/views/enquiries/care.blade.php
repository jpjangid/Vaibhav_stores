@extends ('layouts.front')

@section ('content')
<?php
    use \App\Http\Controllers\HomeController;
    $headerCategories = HomeController::headerCategories();
?>
<section class="category-banner--wrapper assign-left--transparent">
   <div class="container-fluid">
      <div class="row">
         <div class="owl-carousel category-slideshow owl-theme">
            <div class="item">
               <div class="slideshow-details--wrap">
                  <div class="slideshow-image--wrap">
                     <img class="slide-on--desktop owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-care-slideshow-01.jpg" alt="" title="">
                     <img class="slide-on--mobile owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-care-slideshow-01.jpg" alt="" title="">
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="slideshow-details--wrap">
                  <div class="slideshow-image--wrap">
                     <img class="slide-on--desktop owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-care-slideshow-02.jpg" alt="" title="">
                     <img class="slide-on--mobile owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-care-slideshow-03.jpg" alt="" title="">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="plus-question--wrapper" style="margin-top: 30px;">
    <div class="container-fluid">
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="title-ui--wrap">
             <div class="title-text--middle">
                <h2>Care</h2>
                <h5>Repairs and Restoration Services</h5>
             </div>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="plus-information--grid">
             <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="plus-information--text">
                   <h3><span>Q.</span>What is Care?</h3>
                   <p>Care is a one stop shop for all repairs & restoration services of furniture, equipment & electricals. Moreover at Care, we also assist you to sell used products at the right price to the willing buyers. </p>
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-information--picture">
                   <img src="<?php echo url('/'); ?>/static/images/care-faq-picture-01.jpg" alt="" title="">
                </div>
             </div>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="plus-information--grid">
             <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="plus-information--text">
                   <h3><span>Q.</span>How it works?</h3>
                   <p>All you have to do is register a complaint with us. Our expert repair team will then take over the process by collecting the product, analysing the issue, giving you a cost estimate and proceed with repair or refurbishment. You can also track</p>
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-information--picture">
                   <img src="<?php echo url('/'); ?>/static/images/care-faq-picture-02.jpg" alt="" title="">
                </div>
             </div>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="plus-information--grid">
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-information--picture">
                   <img src="<?php echo url('/'); ?>/static/images/care-faq-picture-03.jpg" alt="" title="">
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="plus-information--text">
                   <h3><span>Q.</span>Who is it for?</h3>
                   <p>Ideally this service is for anyone who is facing trouble with their furniture, beauty equipment or beauty electrical. This service is available for everyone whether you have purchased the product from us or elsewhere as long as we can repair it.</p>
                </div>
             </div>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="plus-information--grid">
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-information--picture">
                   <img src="<?php echo url('/'); ?>/static/images/care-faq-picture-04.jpg" alt="" title="">
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="plus-information--text">
                   <h3><span>Q.</span>Whom to get in touch with?</h3>
                   <p>Our team is trained to service your products with utmost care & precision. Get in touch with our team on the details given below. </p>
                </div>
             </div>
          </div>
       </div>
    </div>
</section>

<section class="support-search--wrapper">
    <div class="container-fluid">
       <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
             <div class="title-ui--wrap">
                <div class="title-text--middle">
                   <h2>Got a repair request? We are happy to help.</h2>
                </div>
                <div class="title-text--description">
                   <p>File a repair request or check your complaint status</p>
                </div>
             </div>
          </div>
         <!--container-->
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
             <div class="support-category--wrap">
                {{-- @foreach ($headerCategories as $headerCategory) --}}
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                   <div class="support-category--thumbnail">
                      <div class="support-categry--image">
                         <div class="title">
                            <h3>Furnitures</h3>
                         </div>
                         <div class="image"><img src="<?php echo url('/'); ?>/static/images/care-furniture.png" alt="Furniture"/></div>
                      </div>
                      <div class="support-categry--action">
                         <a href="javascript:void(0)" class="btn btn-primary care-enquiry">File Complaint</a>
                      </div>
                   </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="support-category--thumbnail">
                       <div class="support-categry--image">
                          <div class="title">
                             <h3>Consumables</h3>
                          </div>
                          <div class="image"><img src="<?php echo url('/'); ?>/static/images/care-consumables.png" alt="Furniture"/></div>
                       </div>
                       <div class="support-categry--action">
                          <a href="javascript:void(0)" class="btn btn-primary care-enquiry">File Complaint</a>
                       </div>
                    </div>
                 </div>
                 <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="support-category--thumbnail">
                       <div class="support-categry--image">
                          <div class="title">
                             <h3>Electricals</h3>
                          </div>
                          <div class="image"><img src="<?php echo url('/'); ?>/static/images/care-electricals.png" alt="Furniture"/></div>
                       </div>
                       <div class="support-categry--action">
                          <a href="javascript:void(0)" class="btn btn-primary care-enquiry">File Complaint</a>
                       </div>
                    </div>
                 </div>
                {{-- @endforeach --}}
             </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
             <div class="support-description--text">
                <p>Vaibhav Care is a specialist service vertical for repair and servicing of all types of salon and spa equipment and furniture. Care also extends the services of buying and selling old salon and spa furniture and equipment, ensuring Vaibhav is with you all the way when setting up or refurbishing an existing salon or spa.</p>
                <!-- <div class="collapse" id="collapseExample">
                  <div class="card card-body">
                    Care also extends the services of buying and selling old salon and spa furniture and equipment, ensuring Vaibhav is with you all the way when setting up or refurbishing an existing salon or spa.
                  </div>
                </div>
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                   Know More
                </a>
             </div> -->
          </div>
       </div>
    </div>
 </section>

 <section class="support-form--care" id="care-enquiry">
    <div class="container-fluid">
       <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
             <div class="title-ui--wrap">
                <div class="title-text--middle">
                   <h2>For Any Other Query</h2>
                </div>
                <div class="title-text--description">
                   <p>Unable to find solution to your complaint? Any other queries? Please fill the form below & we shall reach out to you in one business day.</p>
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert" data-dismiss="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
             </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
             <div class="support-form--wrap">
                <form action="{{ route('enquiry.store') }}" id="care-form" method="POST">
                    @csrf
                    <input type="hidden" name="enquiry_type" value="Care">
                   <div class="form-row">
                      <div class="form-group col-md-4">
                         <label for="name">Name <span>*</span></label>
                         <input type="text" name="name" id="name" class="form-control" placeholder="First name" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="mobile_no">Mobile No. <span>*</span></label>
                        <input type="text" name="mobile_no" class="form-control" id="mobile_no" placeholder="Mobile No." required>
                     </div>
					  <div class="form-group col-md-4">
                         <label for="name">Email <span>*</span></label>
                         <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                      </div>
                      <div class="form-group col-md-12">
                         <label for="email">Message <span>*</span></label>
                         <textarea name="enquiry_message" class="form-control" id="message_care" rows="3" placeholder="Your Complaint" required></textarea>
                      </div>
                      <div class="form-group col-md-12">
                         <input type="submit" class="btn btn-primary"/>
                      </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </div>
 </section>

 <section class="plus-connet--wrapper">
    <div class="container-fluid">
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="title-ui--wrap">
             <div class="title-text--middle">
                <h2>For more details connect with us</h2>
             </div>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="plus-connet--grids">
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-connect-wrap">
                   <h5><span><i class="fa fa-home" aria-hidden="true"></i></span> Address</h5>
                   <p>35/1, 3rd Cross, Cubbonpet, <br/>Bengaluru 560002</p>
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-connect-wrap">
                   <h5><span><i class="fa fa-phone" aria-hidden="true"></i></span> Telephone</h5>
                   <p>Mobile - +91-9986638184</p>
                   <p>Landline - 080-41518183</p>
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-connect-wrap">
                   <h5><span><i class="fa fa-envelope" aria-hidden="true"></i></span> Email</h5>
                   <p>service@vaibhavcare.com</p>
                </div>
				
             </div>
          </div>
       </div>
    </div>
 </section>
 @endsection

 @section ('footer-script')
 
<div class="whats-app-icon hide-on-mobile d-none d-lg-block">
      <a class="nav-link whats-app" href="https://web.whatsapp.com/send?phone=+916366008800&text=<?php echo Request::fullUrl(); ?>" 
      target="_blank">
		<img src="<?php echo url('/'); ?>/static/images/whatsapp.png" width="60" alt="WhatsApp"/>
		
	  </a>
</div>
<div class="whats-app-icon show-on-mobile d-block d-lg-none">
      <a class="nav-link whats-app" href="https://wa.me/916366008800?text=<?php echo Request::fullUrl(); ?>" 
      target="_blank"><img src="<?php echo url('/'); ?>/static/images/whatsapp.png" width="50" alt="WhatsApp"/></a>
</div>
  
 <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<script>
    $( "#care-form" ).validate({
      rules: {
        name: {
          required: true
        },
        mobile_no: {
            required: true,
            minlength:10,
              maxlength:10,
              number: true
        },
        enquiry_message: {
            required: true
        }
      }
    });
</script>
 <script>
 jQuery(document).ready(function() {
    @if(Session::has('success'))
        $('html,body').animate({ scrollTop: $("#care-enquiry").offset().top},'slow');
    @endif
    $("a.care-enquiry").click(function() {
        $('html,body').animate({ scrollTop: $("#care-enquiry").offset().top},'slow');
        $('#name').focus();
    });

    $(document).on('click','#search_complaint',function(e){
        e.preventDefault();
        var ticket_no = $('#ticket_no').val();
        $('#enquiry-complaint-view').html('<div align="center" style="font-size:20px;">Fetching your complaint status.</div>');
        $.ajax({
            type:'POST',
            url:"{{ route('enquiry.complaintSearch') }}",
            data:{ticket_no:ticket_no},
            success:function(data){
                $('#enquiry-complaint-view').html(data);
            }
        });
    });
 });
</script>

@endsection
