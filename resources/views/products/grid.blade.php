@extends ('layouts.front')

@section ('header-style')
<style>
    body.product-list{
        position: relative;
    }
</style>
<!-- Need to move into css file -->
    <style>
    span.checked {
      color: #F9B536;
    }
    </style>
    <!-- Need to move into css file -->
@endsection

@section ('content')

   <section class="category-slideshow--wrapper">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
               <div class="breadcrumb-wrap">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('products.category-list',[$category->slug])}}">{{$category->name}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$subCategoryData->name}}</li>
                     </ol>
                  </nav>
               </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
               <div class="title-ui--wrap">
                  <div class="title-text--middle">
                     <h2>{{$subCategoryData->name}}</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   @if ($products->count() > 0)
   <section class="items-archive--wrapper">
      <div class="container-fluid">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="item-archive--title">
               <h3>{{$subCategoryData->name}}</h3>
            </div>
         </div>
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 padding-0">
            <div class="item-archive--list">
                @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 padding-0">
                    <div class="item-excerpt--wrap">
                        <div class="item-excerpt--image">
                            <img src="{{ asset('storage/product/'.$product->product_image_primary->image) }}" alt="{{$product->name}}"/>
                            <div class="item-excerpt--action">
                                <a href="{{route('products.product-detail',[$category->slug,$subCategoryData->slug,$product->slug])}}" class="addToCart">View Details</a>
                            </div>
                        </div>
                        <div class="item-excerpt--details">
                            <div class="item-excerpt--meta">
                                <div class="title">
                                  <h4>
                                    <a href="{{route('products.product-detail',[$category->slug,$subCategoryData->slug,$product->slug])}}" title="{{$product->name}}">
                                    <?php
                                    if(strlen($product->name) > 20)
                                    {
                                      echo substr($product->name, 0, 20).'..';
                                    }
                                    else {
                                      echo $product->name;
                                    }
                                    ?>
                                    </a>
                                  </h4>
                                </div>
                            </div>
                            <div class="ecommerce-item--price">
                                <ul>
                                <?php
                                    $whole = floor($product->sale_price);
                                    $fraction = $product->sale_price - $whole;
                                ?>
                                <li class="new-price">Rs. {{ round($product->sale_price, 0) }}</li>
                                <?php
                                    $whole = floor($product->regular_price);
                                    $fraction = $product->regular_price - $whole;
                                ?>
                                <li class="old-price">Rs. {{ round($product->regular_price, 0) }}</li>
                                <li class="discount">({{$product->discount}}% Off)</li>
                                </ul>
                            </div>
                            <!--<div style="direction:ltr;">
                                <?php
                                    $stars = 0;
                                    if ($product->avgRating != null)
                                    {
                                        $stars = $product->avgRating->rating;
                                    }
                                    for ($i=1; $i <= 5 ; $i++) {
                                        if ($i<=$stars) $checked = "checked";
                                        else $checked = "";
                                        echo '<span class="fa fa-star '.$checked.'" style="margin-right: 8px;font-size: 14px;"></span>';
                                    }
                                ?>
                            </div>-->
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
         </div>
      </div>
   </section>
   @else
   <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 thank-you--wrapper">
            <div class="thank-you--details">
                <h2><i class="fa fa-ban" aria-hidden="true" style="color:red"></i> No product available.</h2>
            </div>
        </div>
    @endif

@endsection

<?php 
$cat_id=$category->id;
if($cat_id==1){
	$mobile="8884748849";
}elseif($cat_id==2){
	$mobile="7829632084";
}else{
	$mobile="7829632084";
}
 ?>
 
<div class="whats-app-icon hide-on-mobile d-none d-lg-block">
      <a class="nav-link whats-app" href="https://web.whatsapp.com/send?phone=+91<?php echo $mobile; ?>&text=<?php echo Request::fullUrl(); ?>" 
      target="_blank">
		<img src="<?php echo url('/'); ?>/static/images/whatsapp.png" width="60" alt="WhatsApp"/>
		
	  </a>
</div>

<div class="whats-app-icon show-on-mobile d-block d-lg-none">
      <a class="nav-link whats-app" href="https://wa.me/91<?php echo $mobile; ?>?text=<?php echo Request::fullUrl(); ?>" 
      target="_blank"><img src="<?php echo url('/'); ?>/static/images/whatsapp.png" width="50" alt="WhatsApp"/></a>
</div>