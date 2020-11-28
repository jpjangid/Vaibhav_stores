@extends ('layouts.front')

@section ('content')

<!-- Need to move into css file -->
    <style>
    span.checked {
      color: #F9B536;
    }
    </style>
    <!-- Need to move into css file -->

  <link rel="stylesheet" type="text/css" href="<?php echo url('/'); ?>/share/jssocials.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo url('/'); ?>/share/jssocials-theme-flat.css" />

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
   <?php $index = 0; ?>
    @if ($products->count() > 0)
        <section class="single-excerpt--wrapper">
            <div class="container-fluid">
                @foreach($products as $product)
                    <div class="leaf-title--wrap">
                        <a href="{{ route('products.product-detail',[$category->slug,$subCategoryData->slug,$product->slug]) }}" data-tooltip="View Details">
                            {{$product->name}}</span>
                        </a>
                    </div>
                    <div class="single-excerpt--grid">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7">
                            <div class="single-product--carousel">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div id="big-{{++$index}}" class="owl-carousel owl-theme">
                                       @foreach ($product->productImages as $item)
                                       <div class="item zoom zoomin">
                                          <a href="{{ route('products.product-detail',[$category->slug,$subCategoryData->slug,$product->slug]) }}"><img src="{{ asset('storage/product/'.$item->image) }}" alt="{{$product->name}}"/></a>
                                       </div>
                                       @endforeach
                                    </div>
                                    <div id="thumbs-{{$index}}" class="thumb-carousel owl-carousel owl-theme">
                                         @foreach ($product->productImages as $item)
                                         <div class="item">
                                            <img src="{{ asset('storage/product/'.$item->image) }}" alt="{{$product->name}}"/>
                                         </div>
                                         @endforeach
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 ordering-thumbs">
                            <div class="single-product--properties">
                                <div class="ecommerce-item--details">
                                    <form action="{{ route('addTocart') }}" class="ItemAddToCart"  product_id="{{$product->id}}" method="POST">
                                        @csrf
                                        <div class="ecommerce-item--name">
                                            <h3>
                                                <a href="{{ route('products.product-detail',[$category->slug,$subCategoryData->slug,$product->slug]) }}">
                                                    {{$product->name}}</span>
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="ecommerce-item--excerpt">
                                            <?php echo substr($product->short_description, 0, 200); ?>
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
                                        <div class="ecommerce-item--feeds">
                                            <!-- <div style="direction:ltr;">
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
                                              <div class="ecommerce-item--share">
                                                <a class="share-this" data-toggle="collapse" href="#share_{{$product->id}}" role="button" aria-expanded="false" aria-controls="share-social">
                                                     <i class="fa fa-share-alt" aria-hidden="true"></i> Share
                                                  </a>
                                                  <div class="collapse" id="share_{{$product->id}}" style="float: right; margin-top: -21px; margin-left: 10px;">
                                                    <div class="card card-body">
                                                        <div id="share"></div>
                                                    </div>
                                                  </div>
                                             </div>
                                       </div>
                                        <div class="ecommerce-item--buttons">
                                            <ul>
                                                <li>
                                                    {{-- <input type="hidden" name="product_id" value="{{$product->id}}"> --}}
                                                    <button type="submit">Add To Cart</button>
                                                </li>
                                                <li><button type="button" class="open-enquery-modal" product_id="{{$product->id}}" category_slug="{{$category->slug}}" enquiry_type="consumable">Enquire Now</button></li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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

@section ('footer-script')

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
<script src="<?php echo url('/'); ?>/share/jssocials.js"></script>
<script>
    @foreach($products as $product)
        $("#share_{{$product->id}}").jsSocials({
            url: "<?php echo url('/'); ?>/product/<?php echo $product->slug; ?>",
            text: "<?php echo $product->name; ?>",
            showLabel: false,
            showCount: "inside",
            shares: ["email", "twitter", "facebook", "whatsapp"]
        });
    @endforeach
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

</script>
@endsection

