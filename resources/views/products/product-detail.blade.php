@extends ('layouts.front')

@section('header-style')
<style>
   @media screen and (max-width: 600px) {
      #web_image {
         display: none;
      };
      .ecommerce-item--details {
         padding-top: 0px !important;
      }
   }
   @media screen and (max-width: 600px) {
      .ecommerce-item--details {
         padding-top: 0px !important;
      }
   }
</style>
@endsection
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
<?php 
$cat_id=$product->category_id; 
if($cat_id==1){
	$mobile="8884748849";
}elseif($cat_id==2){
	 $sub_category_id=$product->sub_category_id;

	$subcategory=[72,24,46,48,51,61,52];
	if(in_array($sub_category_id, $subcategory)){
		$mobile="7829632084";
	}else{
		$mobile="8884748849";
	}

}else{
	$mobile="7829632084";
}
 ?>
<section class="single-excerpt--wrapper">
    <div class="container-fluid">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="breadcrumb-wrap">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                     <li class="breadcrumb-item"><a href="{{route('products.category-list',[$product->category->slug,'c'])}}">{{$product->category->name}}</a></li>
                     <li class="breadcrumb-item"><a href="{{route('products.list', [$product->category->slug,$product->subcategory->slug])}}">{{$product->subCategory->name}}</a></li>
                     <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                  </ol>
               </nav>
            </div>
         </div>
       <div class="single-excerpt--grid">
          <div class="col-12 col-sm-12 col-md-5 offset-md-1 col-lg-5 offset-lg-1 col-xl-5 offset-xl-1">
             <div class="single-product--carousel">
                  <div id="big" class="owl-carousel owl-theme">
                       @foreach ($product->productImages as $item)
                       <div class="item zoom zoomin">
                           <img src="{{ asset('storage/product/'.$item->image) }}" alt="{{$product->name}}"/>
                       </div>
                       @endforeach
                  </div>
                  @if ($product->productImages->count() > 1)
                  <div id="thumbs" class="thumb-carousel owl-carousel owl-theme">
                       @foreach ($product->productImages as $item)
                       <div class="item">
                           <img src="{{ asset('storage/product/'.$item->image) }}" alt="{{$product->name}}"/>
                       </div>
                       @endforeach
                  </div>
                 @else
                 <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 padding-0">
                    @foreach ($product->productImages as $item)
                     <div class="no-thumb-carousel" id="web_image">
                        <div class="item">
                            <img src="{{ asset('storage/product/'.$item->image) }}" alt="{{$product->name}}"/>
                        </div>
                     </div>
                    @endforeach
                 </div>
                 @endif
             </div>
          </div>
          <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
             <div class="single-product--properties">
                <div class="ecommerce-item--details">
                    <form action="{{ route('addTocart') }}" class="ItemAddToCart" product_id="{{$product->id}}" method="POST">
                        @csrf
                        <div class="ecommerce-item--name">
                            <h3>{{$product->name}}</h3>
                        </div>
                        <div class="ecommerce-item--excerpt">
                            <?php echo $product->short_description; ?>
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
                                <div class="ecommerce-item--share">
                                   <a class="share-this" data-toggle="collapse" href="#share-social" role="button" aria-expanded="false" aria-controls="share-social">
                                     <i class="fa fa-share-alt" aria-hidden="true"></i> Share
                                  </a>
                                  <div class="collapse" id="share-social" style="float: right; margin-top: -15px;">
                                    <div class="card card-body">
                                        <div id="share"></div>
                                    </div>
                                  </div>
                               </div>
                        </div>
                        <div class="ecommerce-item--buttons">
                            <ul>
                              @if($product->category->name != 'Furnitures')
                                <li>
                                    {{-- <input type="hidden" name="product_id"  value="{{$product->id}}"> --}}
                                    <button type="submit">Add To Cart</button>
                                </li>
                              @endif
                              <li><button type="button" class="open-enquery-modal" product_id="{{$product->id}}" category_slug="{{$product->category->slug}}" enquiry_type="{{$enquiry_type}}">Enquire Now</button></li>
                            </ul>
                        </div>
                    </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>

 @if (strip_tags($product->description) != '')
 <section class="single-description--wrapper">
    <div class="container-fluid">
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="title-ui--wrap">
             <div class="title-text--middle">
                <h2>Product Description</h2>
             </div>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="single-description--text">
            <?php echo $product->description; ?>
          </div>
       </div>
    </div>
 </section>
 @endif
{{-- <section class="review-rating--wrapper">
   <div class="container-fluid">
       @if ($ratings > 0)
      <div class="rating-numbers--wrap">
         <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
            <div class="rating-block">
               <div class="ecommerce-item--rating">
                  <div class="rate" data-rate-value={{$ratings}}></div>
               </div>
               <h2>{{($ratings - floor($ratings)>0)?number_format($ratings,1):number_format($ratings,0)}} <small>/ 5</small></h2>
               <p>Based on {{$totalReviews}} Ratings</p>
            </div>
         </div>
         <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
            <div class="rating-breakdown--wrap">
               <div class="pull-left">
                  <div class="pull-left" style="width:35px; line-height:1;">
                     <div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
                  </div>
                  <div class="pull-left" style="width:180px;">
                     <div class="progress" style="height:9px; margin:8px 0;">
                       <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
                        <span class="sr-only">80% Complete (danger)</span>
                       </div>
                     </div>
                  </div>
                  <div class="pull-right" style="margin-left:10px;">{{$rating5}}</div>
               </div>
               <div class="pull-left">
                  <div class="pull-left" style="width:35px; line-height:1;">
                     <div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
                  </div>
                  <div class="pull-left" style="width:180px;">
                     <div class="progress" style="height:9px; margin:8px 0;">
                       <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                        <span class="sr-only">80% Complete (danger)</span>
                       </div>
                     </div>
                  </div>
                  <div class="pull-right" style="margin-left:10px;">{{$rating4}}</div>
               </div>
               <div class="pull-left">
                  <div class="pull-left" style="width:35px; line-height:1;">
                     <div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
                  </div>
                  <div class="pull-left" style="width:180px;">
                     <div class="progress" style="height:9px; margin:8px 0;">
                       <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                        <span class="sr-only">80% Complete (danger)</span>
                       </div>
                     </div>
                  </div>
                  <div class="pull-right" style="margin-left:10px;">{{$rating3}}</div>
               </div>
               <div class="pull-left">
                  <div class="pull-left" style="width:35px; line-height:1;">
                     <div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
                  </div>
                  <div class="pull-left" style="width:180px;">
                     <div class="progress" style="height:9px; margin:8px 0;">
                       <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                        <span class="sr-only">80% Complete (danger)</span>
                       </div>
                     </div>
                  </div>
                  <div class="pull-right" style="margin-left:10px;">{{$rating2}}</div>
               </div>
               <div class="pull-left">
                  <div class="pull-left" style="width:35px; line-height:1;">
                     <div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
                  </div>
                  <div class="pull-left" style="width:180px;">
                     <div class="progress" style="height:9px; margin:8px 0;">
                       <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                        <span class="sr-only">80% Complete (danger)</span>
                       </div>
                     </div>
                  </div>
                  <div class="pull-right" style="margin-left:10px;">{{$rating1}}</div>
               </div>
            </div>
         </div>
      </div>
      @endif
      @if ($totalReviews > 0)
        <div class="review-details--wrap">
            <h3>Customer review <span>
                @if ($totalReviews > 5)
                    Showing 1 - 5 out of {{$totalReviews}}
                @endif
            </span></h3>
            <div class="review-single--wrap">
                <h4>{{$product->name}}</h4>
                @foreach ($productReviews as $review)
                    <div class="review-meta--wrap">
                        <div class="ecommerce-item--rating">
                            <div class="rate" data-rate-value="{{$review->rating}}"></div>
                        </div>
                        <div class="name">{{$review->user->name}}</div>
                        <div class="date">{{date('Y-m-d',strtotime($review->created_at))}}</div>
                    </div>
                    <div class="review-text--wrap">
                        <p>{{$review->review}}</p>
                    </div>
                @endforeach
            </div>
        </div>
      @endif

   </div>
</section> --}}

@if (count($related_products)>0)
 <section class="recommended-product--wrapper">
    <div class="container-fluid">
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="title-ui--wrap">
             <div class="title-text--middle">
                <h2>Related Products</h2>
             </div>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="recommended-carousel--wrap">
             <div class="owl-carousel recommended-items owl-theme">
                @foreach ($related_products as $product)
                <div class="item">
                   <div class="item-excerpt--wrap">
                      <div class="item-excerpt--image">
                        <img src="{{ asset('storage/product/'.$product->product_image_primary->image) }}" alt="{{$product->name}}"/>
                        <div class="item-excerpt--action">
                            <a href="{{route('products.product-detail',[$product->category->slug,$product->subcategory->slug,$product->slug])}}" class="addToCart">View Details</a>
                        </div>
                      </div>
                      <div class="item-excerpt--details">
                         <div class="item-excerpt--meta">
                            <div class="title">
                              <h4>
                                <a href="{{route('products.product-detail',[$product->category->slug,$product->subcategory->slug,$product->slug])}}">{{$product->name}}</a>
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
                         <div style="direction:ltr;">
                            <?php
                              //   $stars = 0;
                              //   if ($product->avgRating != null)
                              //   {
                              //       $stars = $product->avgRating->rating;
                              //   }
                              //   for ($i=1; $i <= 5 ; $i++) {
                              //       if ($i<=$stars) $checked = "checked";
                              //       else $checked = "";
                              //       echo '<span class="fa fa-star '.$checked.'" style="margin-right: 8px;font-size: 14px;"></span>';
                              //   }
                            ?>
                        </div>
                      </div>
                   </div>
                </div>
                @endforeach
             </div>
          </div>
       </div>
    </div>
</section>
@endif
@endsection



@section ('footer-script')


 
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

<script src="<?php echo url('/'); ?>/static/js/jquery.zoom.min.js"></script>
<script src="<?php echo url('/'); ?>/share/jssocials.js"></script>
<script>
    $("#share").jsSocials({
        url: "<?php echo url('/'); ?>/product/<?php echo $product->slug; ?>",
        text: "<?php echo $product->name; ?>",
        showLabel: false,
        showCount: "inside",
        shares: ["email", "twitter", "facebook", "whatsapp"]
    });
</script>
@endsection
