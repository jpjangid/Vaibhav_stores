@extends ('layouts.front')

@section ('content')

   <section class="brand-details--wrapper">
    <div class="container-fluid px-lg-5">
       <div class="row brand-details--grid align-items-center">
          <div class="col-12 col-md-6 col-lg-8 col-xl-8">
             <div class="row brand-details--items align-items-center">
                <div class="col-12 col-lg-6 col-xl-4">
                  <div class="brand-logo--wrap">
                     <img src="{{ asset('storage/brand/'.$brand->logo) }}" alt="{{$brand->name}}"/>
                   </div>
                </div>
                <div class="col-lg-6 col-xl-8 d-none d-lg-block">
                     <div class="owl-carousel brand-single--slideshow owl-theme">
                        <div class="item">
                           <img src="{{ asset('storage/brand/'.$brand->image) }}" alt="{{$brand->name}}"/>
                        </div>
                        <div class="item">
                           <img src="{{ asset('storage/brand/'.$brand->image) }}" alt="{{$brand->name}}"/>
                        </div>
                      </div>
                  </div>
             </div>
          </div>
		<div class="col-12 col-md-6 col-lg-4 col-xl-4">
             <div class="brand-details--properties">
                <div class="ecommerce-item--details">
                     <div class="ecommerce-item--name">
                         <h3>KEY PRODUCTS</h3>
                     </div>
                     <div class="ecommerce-item--excerpt">
                        <?php echo $brand->short_description; ?>
                        <button type="button" class="brand-enquiry open-enquery-modal" product_id="{{$brand->id}}" category_slug="{{$brand->name}}" enquiry_type="brand">Book Demo</button>
                     </div>
                </div>
             </div>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 mt-4">
            <div class="title-ui--wrap" style="justify-content: flex-start; align-items: flex-start;">
               <div class="title-text--middle">
                  <h2 style="text-align: left;">Brand Profile</h2>
               </div>
            </div>
           <div class="brand-details--properties">
              <div class="">
                   <div class="ecommerce-item--excerpt">
                       <?php echo $brand->description; ?>
                   </div>
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
                   <p>1091, F1, OTC ROAD, <br/>Bengaluru 560002</p>
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-connect-wrap">
                   <h5><span><i class="fa fa-phone" aria-hidden="true"></i></span> Telephone</h5>
                   <p>Mobile - +91-7829632084</p>
                   <p>Landline - 080-41518183</p>
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-connect-wrap">
                   <h5><span><i class="fa fa-envelope" aria-hidden="true"></i></span> Email</h5>
                   <p>enquiry@vaibhavstores.in</p>
                </div>
				
             </div>
          </div>
       </div>
    </div>
 </section>
 
@endsection

<div class="whats-app-icon hide-on-mobile d-none d-lg-block">
      <a class="nav-link whats-app" href="https://web.whatsapp.com/send?phone=+917829632084&text=<?php echo Request::fullUrl(); ?>" 
      target="_blank">
		<img src="<?php echo url('/'); ?>/static/images/whatsapp.png" width="60" alt="WhatsApp"/>
		
	  </a>
</div>
<div class="whats-app-icon show-on-mobile d-block d-lg-none">
      <a class="nav-link whats-app" href="https://wa.me/917829632084?text=<?php echo Request::fullUrl(); ?>" 
      target="_blank"><img src="<?php echo url('/'); ?>/static/images/whatsapp.png" width="50" alt="WhatsApp"/></a>
</div>
