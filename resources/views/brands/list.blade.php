@extends ('layouts.front')

@section ('content')

<?php $index = 1; ?>
   <section class="brand-listing--wrapper">
       <div class="container-fluid">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
             <div class="title-ui--wrap">
                <div class="title-text--middle">
                   <h2>Our Trusted Brands</h2>
                </div>
                <div class="title-text--description">
                   <p>Make your own statement, with the trending Makeup tools, Skincare range, Salon Furniture, Haircare products, and much more. Vaibhav Store is a one-stop solution that provide trendsetting and best quality equipment for your salon. Visit the world of Vaibhav and feel spoilt for choices.</p>
                </div>
             </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
             <div class="brand-listing--grid">
               @foreach($brands as $brand)
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                  <div class="brand-thumbnail--wrap">
                     <div class="brand-listing--image">
                        <img src="{{ asset('storage/brand/'.$brand->logo) }}" alt="{{$brand->name}}"/>
                     </div>
                     <div class="brand-thumbnail--action">
                        <a href="{{route('brand.detail',$brand->slug)}}"> View</a>
                     </div>
                  </div>
                </div>
                @endforeach
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
