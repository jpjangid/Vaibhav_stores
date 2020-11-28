@extends ('layouts.front')

@section ('content')

    <link rel="stylesheet" type="text/css" href="<?php echo url('/'); ?>/share/jssocials.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo url('/'); ?>/share/jssocials-theme-flat.css" />
	
	<div id="loading">
		<div class="loaderimg">
			<img src="/static/images/pageloader.gif">
		</div>
	</div>
	
	<div id="after_loader">
    <section class="hero-slideshow--wrapper">
      <div class="container-fluid">
         <div class="row">
            <div class="owl-carousel hero-slideshow owl-theme">
				 
              
               <div class="item">
                  <div class="slideshow-details--wrap">
                     <div class="slideshow-image--wrap">
                        <a href="<?php echo url('/'); ?>/consumable">
                           <img class="slide-on--desktop owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-slideshow-01.jpg" alt="" title="">
                           <img class="slide-on--mobile owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-slideshow-01.jpg" alt="" title="">
                        </a>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="slideshow-details--wrap">
                     <div class="slideshow-image--wrap">
                        <a href="<?php echo url('/'); ?>/brands">
                           <img class="slide-on--desktop owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-slideshow-02.jpg" alt="" title="">
                           <img class="slide-on--mobile owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-slideshow-02.jpg" alt="" title="">
                        </a>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="slideshow-details--wrap">
                     <div class="slideshow-image--wrap">
                        <a href="<?php echo url('/'); ?>/care">
                           <img class="slide-on--desktop owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-slideshow-03.jpg" alt="" title="">
                           <img class="slide-on--mobile owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-slideshow-03.jpg" alt="" title="">
                        </a>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="slideshow-details--wrap">
                     <div class="slideshow-image--wrap">
                        <a href="<?php echo url('/'); ?>/xpress">
                           <img class="slide-on--desktop owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-slideshow-04.jpg" alt="" title="">
                           <img class="slide-on--mobile owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-slideshow-04.jpg" alt="" title="">
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </section>

    <!-- Need to move into css file -->
    <style>
    span.checked {
      color: #F9B536;
    }
    </style>
    <!-- Need to move into css file -->
    @if ($furnitureProduct1 && $furnitureProduct2 && $furnitureProduct3 && $furnitureProduct4)
    <section class="category-ui--one">
      <div class="container-fluid">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="title-ui--wrap">
               <!-- <div class="title-text--up">
                  <h4>Want to Shop?</h4>
               </div> -->
               <div class="title-text--middle">
                  <h2>Furniture</h2>
               </div>
               <div class="title-text--action">
                  <a href="<?php echo url('/'); ?>/salon-furnitures" target="_blank">View All</a>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div id="owl-category--one" class="category-blocks--ui owl-carousel">
               <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">
                  <div class="category-block--wrap green-ui">
					<img src="{{ asset('storage/product/'.$furnitureProduct1->product_image_primary->image) }}" alt="{{ $furnitureProduct1->name }}" title="{{ $furnitureProduct1->name }}" class="homefimg"/>
                     <div class="ecommerce-item--details">
                        <div class="ecommerce-item--name">
                           <h3><a href="{{ route('products.product-detail',[$furnitureProduct1->category->slug,$furnitureProduct1->subcategory->slug,$furnitureProduct1->slug]) }}">{{ $furnitureProduct1->name }}</a></h3>
                        </div>
                        <div class="ecommerce-item--price">
                           <ul>
                              <li class="discount"> ({{ $furnitureProduct1->discount }}% Off)</li>
                              <li class="old-price"> Rs. {{ round($furnitureProduct1->regular_price, 0) }}</li>
                              <li class="new-price"> Rs. {{ round($furnitureProduct1->sale_price, 0) }}</li>
                           </ul>
                        </div>
                        <div style="direction:ltr;">
                            <?php
                                $stars = 0;
                                if ($furnitureProduct1->avgRating != null)
                                {
                                    $stars = $furnitureProduct1->avgRating->rating;
                                }
                                for ($i=1; $i <= 5 ; $i++) {
                                    if ($i<=$stars) $checked = "checked";
                                    else $checked = "";
                                    echo '<span class="fa fa-star '.$checked.'" style="margin-right: 8px"></span>';
                                }
                            ?>
                        </div>
                        <div class="ecommerce-item--buttons">
                           <ul>
                                <li>
                                    <form action="{{ route('addTocart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" class="query_product_id" name="product_id" value="{{$furnitureProduct1->id}}">
                                        {{-- <button type="submit">Buy Now</button> --}}
                                    </form>
                                    <button type="button" class="open-enquery-modal" product_id="{{$furnitureProduct1->id}}" category_slug="{{$furnitureProduct1->subCategory->category->slug}}" enquiry_type="furniture">Enquire Now</button>
                                </li>
                              <li><a href="{{route('products.product-detail',[$furnitureProduct1->category->slug,$furnitureProduct1->subcategory->slug,$furnitureProduct1->slug])}}">Explore</a></li>
                           </ul>
                        </div>
                        <div class="ecommerce-item--share">
                             <a class="share-this" data-toggle="collapse" href="#share-social-furniture-0" role="button" aria-expanded="false" aria-controls="share-social-furniture-0">
                               <i class="fa fa-share-alt" aria-hidden="true"></i> Share
                            </a>
                            <div class="collapse" id="share-social-furniture-0">
                              <div class="card card-body">
                                  <div id="FurnitureShare0"></div>
                              </div>
                            </div>
                         </div>
                     </div>
                        
                  </div>
               </div>
               <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8">
                  <div class="category-block--wrap peach-ui">
					<img src="{{ asset('storage/product/'.$furnitureProduct2->product_image_primary->image) }}" alt="{{ $furnitureProduct2->name }}" title="{{ $furnitureProduct2->name }}" class="homefimg"/>
                     <div class="ecommerce-item--details">
                        <div class="ecommerce-item--name">
                           <h3><a href="{{ route('products.product-detail',[$furnitureProduct2->category->slug,$furnitureProduct2->subcategory->slug,$furnitureProduct2->slug]) }}">{{ $furnitureProduct2->name }}</a></h3>
                        </div>
                        <div class="ecommerce-item--price">
                           <ul>
                              <li class="discount">({{ $furnitureProduct2->discount }}% Off)</li>
                              <li class="old-price">Rs. {{ round($furnitureProduct2->regular_price, 0) }}</li>
                              <li class="new-price">Rs. {{ round($furnitureProduct2->sale_price, 0) }}</li>
                           </ul>
                        </div>
                        <div style="direction:ltr;">
                            <?php
                                $stars = 0;
                                if ($furnitureProduct2->avgRating != null)
                                {
                                    $stars = $furnitureProduct2->avgRating->rating;
                                }
                                for ($i=1; $i <= 5 ; $i++) {
                                    if ($i<=$stars) $checked = "checked";
                                    else $checked = "";
                                    echo '<span class="fa fa-star '.$checked.'" style="margin-right: 8px"></span>';
                                }
                            ?>
                        </div>
                        <div class="ecommerce-item--buttons">
                           <ul>
                                <li>
                                    <form action="{{ route('addTocart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$furnitureProduct2->id}}">
                                        {{-- <button type="submit">Buy Now</button> --}}
                                    </form>
                                    <button type="button" class="open-enquery-modal" product_id="{{$furnitureProduct2->id}}" category_slug="{{$furnitureProduct2->subCategory->category->slug}}" enquiry_type="furniture">Enquire Now</button>
                                </li>
                              <li><a href="{{route('products.product-detail',[$furnitureProduct2->category->slug,$furnitureProduct2->subcategory->slug,$furnitureProduct2->slug])}}">Explore</a></li>
                           </ul>
                        </div>
                        <div class="ecommerce-item--share">
                             <a class="share-this" data-toggle="collapse" href="#share-social-furniture-1" role="button" aria-expanded="false" aria-controls="share-social-furniture-1">
                               <i class="fa fa-share-alt" aria-hidden="true"></i> Share
                            </a>
                            <div class="collapse" id="share-social-furniture-1">
                              <div class="card card-body">
                                  <div id="FurnitureShare1"></div>
                              </div>
                            </div>
                         </div>
                     </div>
                        
                  </div>
               </div>
               <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
                  <div class="category-block--wrap blue-ui">
					<img src="{{ asset('storage/product/'.$furnitureProduct3->product_image_primary->image) }}" alt="{{ $furnitureProduct3->name }}" title="{{ $furnitureProduct3->name }}" class="homefimg"/>
                     <div class="ecommerce-item--details">
                        <div class="ecommerce-item--name">
                           <h3><a href="{{ route('products.product-detail',[$furnitureProduct3->category->slug,$furnitureProduct3->subcategory->slug,$furnitureProduct3->slug]) }}">{{ $furnitureProduct3->name }}</a></h3>
                        </div>
                        <div class="ecommerce-item--price">
                           <ul>
                              <li class="discount">({{ $furnitureProduct3->discount }}% Off)</li>
                              <li class="old-price">Rs. {{ round($furnitureProduct3->regular_price, 0) }}</li>
                              <li class="new-price">Rs. {{ round($furnitureProduct3->sale_price, 0) }}</li>
                           </ul>
                        </div>
                        <div style="direction:ltr;">
                            <?php
                                $stars = 0;
                                if ($furnitureProduct3->avgRating != null)
                                {
                                    $stars = $furnitureProduct3->avgRating->rating;
                                }
                                for ($i=1; $i <= 5 ; $i++) {
                                    if ($i<=$stars) $checked = "checked";
                                    else $checked = "";
                                    echo '<span class="fa fa-star '.$checked.'" style="margin-right: 8px"></span>';
                                }
                            ?>
                        </div>
                        <div class="ecommerce-item--buttons">
                           <ul>
                                <li>
                                    <form action="{{ route('addTocart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$furnitureProduct3->id}}">
                                        {{-- <button type="submit">Buy Now</button> --}}
                                    </form>
                                    <button type="button" class="open-enquery-modal" product_id="{{$furnitureProduct3->id}}" category_slug="{{$furnitureProduct3->subCategory->category->slug}}" enquiry_type="furniture">Enquire Now</button>
                                </li>
                              <li><a href="{{route('products.product-detail',[$furnitureProduct3->category->slug,$furnitureProduct3->subcategory->slug,$furnitureProduct3->slug])}}">Explore</a></li>
                           </ul>
                        </div>
                        <div class="ecommerce-item--share">
                             <a class="share-this" data-toggle="collapse" href="#share-social-furniture-2" role="button" aria-expanded="false" aria-controls="share-social-furniture-2">
                               <i class="fa fa-share-alt" aria-hidden="true"></i> Share
                            </a>
                            <div class="collapse" id="share-social-furniture-2">
                              <div class="card card-body">
                                  <div id="FurnitureShare2"></div>
                              </div>
                            </div>
                         </div>
                     </div>
                       
                  </div>
               </div>
               <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7">
                  <div class="category-block--wrap pink-ui">
					<img src="{{ asset('storage/product/'.$furnitureProduct4->product_image_primary->image) }}" alt="{{ $furnitureProduct4->name }}" title="{{ $furnitureProduct4->name }}" class="homefimg"/>
                     <div class="ecommerce-item--details">
                        <div class="ecommerce-item--name">
                           <h3><a href="{{ route('products.product-detail',[$furnitureProduct4->category->slug,$furnitureProduct4->subcategory->slug,$furnitureProduct4->slug]) }}">{{ $furnitureProduct4->name }}</a></h3>
                        </div>
                        <div class="ecommerce-item--price">
                           <ul>
                              <li class="discount">({{ $furnitureProduct4->discount }}% Off)</li>
                              <li class="old-price">Rs. {{ round($furnitureProduct4->regular_price, 0) }}</li>
                              <li class="new-price">Rs. {{ round($furnitureProduct4->sale_price, 0) }}</li>
                           </ul>
                        </div>
                        <div style="direction:ltr;">
                            <?php
                                $stars = 0;
                                if ($furnitureProduct4->avgRating != null)
                                {
                                    $stars = $furnitureProduct4->avgRating->rating;
                                }
                                for ($i=1; $i <= 5 ; $i++) {
                                    if ($i<=$stars) $checked = "checked";
                                    else $checked = "";
                                    echo '<span class="fa fa-star '.$checked.'" style="margin-right: 8px"></span>';
                                }
                            ?>
                        </div>
                        <div class="ecommerce-item--buttons">
                           <ul>
                                <li>
                                    <form action="{{ route('addTocart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$furnitureProduct4->id}}">
                                        {{-- <button type="submit">Buy Now</button> --}}
                                    </form>
                                    <button type="button" class="open-enquery-modal" product_id="{{$furnitureProduct4->id}}" category_slug="{{$furnitureProduct4->subCategory->category->slug}}" enquiry_type="furniture">Enquire Now</button>
                                </li>
                              <li><a href="{{route('products.product-detail',[$furnitureProduct4->category->slug,$furnitureProduct4->subcategory->slug,$furnitureProduct4->slug])}}">Explore</a></li>
                           </ul>
                        </div>
                        <div class="ecommerce-item--share">
                             <a class="share-this" data-toggle="collapse" href="#share-social-furniture-3" role="button" aria-expanded="false" aria-controls="share-social-furniture-3">
                               <i class="fa fa-share-alt" aria-hidden="true"></i> Share
                            </a>
                            <div class="collapse" id="share-social-furniture-3">
                              <div class="card card-body">
                                  <div id="FurnitureShare3"></div>
                              </div>
                            </div>
                         </div>
                     </div>
                        
                  </div>
               </div>
            </div>
         </div>
      </div>
    </section>
    @endif

    @if ($consumablesProduct)
    <section class="highlighted-single--wrapper">
      <div class="container-fluid">
         <div class="single-excerpt--grid">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
               <div class="title-ui--wrap">
                  <div class="title-text--middle">
                     <h2>Consumables</h2>
                  </div>
                  <div class="title-text--action">
                    
					  <a href="<?php echo url('/'); ?>/consumable" target="_blank">View All</a>
                  </div>
               </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
               <div class="highlighted-single--grids">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                     <div class="single-product--carousel">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                           <div id="big" class="owl-carousel owl-theme">
                             @foreach ($consumablesProduct->productImages as $item)
                              <div class="item">
                                  <img src="{{ asset('storage/product/'.$item->image) }}" alt="{{$consumablesProduct->name}}"/>
                              </div>
                              @endforeach
                           </div>
                           <div id="thumbs" class="thumb-carousel owl-carousel owl-theme">
                              @foreach ($consumablesProduct->productImages as $item)
                              <div class="item">
                                 <img src="{{ asset('storage/product/'.$item->image) }}" alt="{{$consumablesProduct->name}}"/>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                     <div class="single-product--properties">
                        <div class="ecommerce-item--details">
                           <div class="ecommerce-item--name">
                              <h3>
                                  <a href="{{ route('products.product-detail',[$consumablesProduct->category->slug,$consumablesProduct->subcategory->slug,$consumablesProduct->slug]) }}">
                                      {{ $consumablesProduct->name }} <span>- {{ $consumablesProduct->subCategory->name }}</span>
                                  </a>
                              </h3>
                           </div>
                           <div class="ecommerce-item--excerpt">
                               <?php echo $consumablesProduct->short_description; ?>
                           </div>
                           <div class="ecommerce-item--price">
                              <ul>
                                 <li class="new-price">Rs. {{ round($consumablesProduct->sale_price, 0) }}</li>
                                 <li class="old-price">Rs. {{ round($consumablesProduct->regular_price, 0) }}</li>
                                 <li class="discount">({{ $consumablesProduct->discount }}% Off)</li>
                              </ul>
                           </div>
                           <div style="direction:ltr;">
                                  <?php
                                      $stars = 0;
                                      if ($consumablesProduct->avgRating != null)
                                      {
                                          $stars = $consumablesProduct->avgRating->rating;
                                      }
                                      for ($i=1; $i <= 5 ; $i++) {
                                          if ($i<=$stars) $checked = "checked";
                                          else $checked = "";
                                          echo '<span class="fa fa-star '.$checked.'" style="margin-right: 8px"></span>';
                                      }
                                  ?>
                              </div>
                           <div class="ecommerce-item--buttons">
                              <ul>
                                  <li>
                                      <form action="{{ route('addTocart') }}" method="POST">
                                          @csrf
                                          <input type="hidden" name="product_id" value="{{$consumablesProduct->id}}">
                                          {{-- <button type="submit">Buy Now</button> --}}
                                      </form>
                                      <button type="button" class="open-enquery-modal" product_id="{{$consumablesProduct->id}}"  category_slug="{{$consumablesProduct->subCategory->category->slug}}" enquiry_type="consumable">Enquire Now</button>
                                  </li>
                                 <li><a href="{{route('products.product-detail',[$consumablesProduct->category->slug,$consumablesProduct->subcategory->slug,$consumablesProduct->slug])}}">Explore</a></li>
                              </ul>
                           </div>
                           <div class="ecommerce-item--share">
                               <a class="share-this" data-toggle="collapse" href="#share-social-consumable" role="button" aria-expanded="false" aria-controls="share-social-consumable">
                                 <i class="fa fa-share-alt" aria-hidden="true"></i> Share
                              </a>
                              <div class="collapse" id="share-social-consumable">
                                <div class="card card-body">
                                    <div id="ConsumablesShare"></div>
                                </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </section>
    @endif

    @if ($electricalsProduct1 && $electricalsProduct2 && $electricalsProduct3 && $electricalsProduct4)
    <section class="category-ui--two">
      <div class="container-fluid">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="title-ui--wrap">
               <!-- <div class="title-text--up">
                  <h4>Want to Shop?</h4>
               </div> -->
               <div class="title-text--middle">
                  <h2>Electricals</h2>
               </div>
               <div class="title-text--action">
                
				  <a href="<?php echo url('/'); ?>/electricals" target="_blank">View All</a>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div id="owl-category--two" class="category-blocks--ui owl-carousel">
               <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8">
                  <div class="category-block--wrap peach-ui">
                     <div class="ecommerce-item--details">
                        <div class="ecommerce-item--name">
                           <h3><a href="{{ route('products.product-detail',[$electricalsProduct1->category->slug,$electricalsProduct1->subcategory->slug,$electricalsProduct1->slug]) }}">{{ $electricalsProduct1->name }}</a></h3>
                        </div>
                        <div class="ecommerce-item--price">
                           <ul>
                              <li class="discount">({{ $electricalsProduct1->discount }}% Off)</li>
                              <li class="old-price">Rs. {{ round($electricalsProduct1->regular_price, 0) }} </li>
                              <li class="new-price">Rs. {{ round($electricalsProduct1->sale_price, 0) }}</li>
                           </ul>
                        </div>
                        <div style="direction:ltr;">
                            <?php
                                $stars = 0;
                                if ($electricalsProduct1->avgRating != null)
                                {
                                    $stars = $electricalsProduct1->avgRating->rating;
                                }
                                for ($i=1; $i <= 5 ; $i++) {
                                    if ($i<=$stars) $checked = "checked";
                                    else $checked = "";
                                    echo '<span class="fa fa-star '.$checked.'" style="margin-right: 8px"></span>';
                                }
                            ?>
                        </div>
                        <div class="ecommerce-item--buttons">
                           <ul>
                                <li>
                                    <form action="{{ route('addTocart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$electricalsProduct1->id}}">
                                        {{-- <button type="submit">Buy Now</button> --}}
                                    </form>
                                    <button type="button" class="open-enquery-modal" product_id="{{$electricalsProduct1->id}}" category_slug="{{$electricalsProduct1->subCategory->category->slug}}" enquiry_type="electrical">Enquire Now</button>
                                </li>
                              <li><a href="{{route('products.product-detail',[$electricalsProduct1->category->slug,$electricalsProduct1->subcategory->slug,$electricalsProduct1->slug])}}">Explore</a></li>
                           </ul>
                        </div>
                        <div class="ecommerce-item--share">
                             <a class="share-this" data-toggle="collapse" href="#share-social-electrical-0" role="button" aria-expanded="false" aria-controls="share-social-electrical-0">
                               <i class="fa fa-share-alt" aria-hidden="true"></i> Share
                            </a>
                            <div class="collapse" id="share-social-electrical-0">
                              <div class="card card-body">
                                  <div id="ElectricalsShare0"></div>
                              </div>
                            </div>
                         </div>
                     </div>
                     <div class="ecommerce-item--image">
                        <img src="{{ asset('storage/product/'.$electricalsProduct1->product_image_primary->image) }}" alt="{{ $electricalsProduct1->name }}" title="{{ $electricalsProduct1->name }}"/>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">
                  <div class="category-block--wrap green-ui">
                     <div class="ecommerce-item--details">
                        <div class="ecommerce-item--name">
                           <h3><a href="{{ route('products.product-detail',[$electricalsProduct2->category->slug,$electricalsProduct2->subcategory->slug,$electricalsProduct2->slug]) }}">{{ $electricalsProduct2->name }}</a></h3>
                        </div>
                        <div class="ecommerce-item--price">
                           <ul>
                              <li class="new-price">Rs. {{ round($electricalsProduct2->sale_price, 0) }}</li>
                              <li class="old-price">Rs. {{ round($electricalsProduct2->regular_price, 0) }} </li>
                              <li class="discount">({{ $electricalsProduct2->discount }}% Off)</li>
                           </ul>
                        </div>
                        <div style="direction:ltr;">
                            <?php
                                $stars = 0;
                                if ($electricalsProduct2->avgRating != null)
                                {
                                    $stars = $electricalsProduct2->avgRating->rating;
                                }
                                for ($i=1; $i <= 5 ; $i++) {
                                    if ($i<=$stars) $checked = "checked";
                                    else $checked = "";
                                    echo '<span class="fa fa-star '.$checked.'" style="margin-right: 8px"></span>';
                                }
                            ?>
                        </div>
                        <div class="ecommerce-item--buttons">
                           <ul>
                                <li>
                                    <form action="{{ route('addTocart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$electricalsProduct2->id}}">
                                        {{-- <button type="submit">Buy Now</button> --}}
                                    </form>
                                    <button type="button" class="open-enquery-modal" product_id="{{$electricalsProduct2->id}}" category_slug="{{$electricalsProduct2->subCategory->category->slug}}" enquiry_type="electrical">Enquire Now</button>
                                </li>
                              <li><a href="{{route('products.product-detail',[$electricalsProduct2->category->slug,$electricalsProduct2->subcategory->slug,$electricalsProduct2->slug])}}">Explore</a></li>
                           </ul>
                        </div>
                        <div class="ecommerce-item--share">
                             <a class="share-this" data-toggle="collapse" href="#share-social-electrical-1" role="button" aria-expanded="false" aria-controls="share-social-electrical-1">
                               <i class="fa fa-share-alt" aria-hidden="true"></i> Share
                            </a>
                            <div class="collapse" id="share-social-electrical-1">
                              <div class="card card-body">
                                  <div id="ElectricalsShare1"></div>
                              </div>
                            </div>
                         </div>
                     </div>
                     <div class="ecommerce-item--image">
                        <img src="{{ asset('storage/product/'.$electricalsProduct2->product_image_primary->image) }}" alt="{{ $electricalsProduct2->name }}" title="{{ $electricalsProduct2->name }}"/>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7">
                  <div class="category-block--wrap pink-ui">
                     <div class="ecommerce-item--image">
                        <img src="{{ asset('storage/product/'.$electricalsProduct3->product_image_primary->image) }}" alt="{{ $electricalsProduct3->name }}" title="{{ $electricalsProduct3->name }}"/>
                     </div>
                     <div class="ecommerce-item--details">
                        <div class="ecommerce-item--name">
                           <h3><a href="{{ route('products.product-detail',[$electricalsProduct3->category->slug,$electricalsProduct3->subcategory->slug,$electricalsProduct3->slug]) }}">{{ $electricalsProduct3->name }}</a></h3>
                        </div>
                        <div class="ecommerce-item--price">
                           <ul>
                              <li class="discount">({{ $electricalsProduct3->discount }}% Off)</li>
                              <li class="old-price">Rs. {{ round($electricalsProduct3->regular_price, 0) }}</li>
                              <li class="new-price">Rs. {{ round($electricalsProduct3->sale_price, 0) }}</li>
                           </ul>
                        </div>
                        <div style="direction:ltr;">
                            <?php
                                $stars = 0;
                                if ($electricalsProduct2->avgRating != null)
                                {
                                    $stars = $electricalsProduct2->avgRating->rating;
                                }
                                for ($i=1; $i <= 5 ; $i++) {
                                    if ($i<=$stars) $checked = "checked";
                                    else $checked = "";
                                    echo '<span class="fa fa-star '.$checked.'" style="margin-right: 8px"></span>';
                                }
                            ?>
                        </div>
                        <div class="ecommerce-item--buttons">
                           <ul>
                                <li>
                                    <form action="{{ route('addTocart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$electricalsProduct3->id}}">
                                        {{-- <button type="submit">Buy Now</button> --}}
                                    </form>
                                    <button type="button" class="open-enquery-modal" product_id="{{$electricalsProduct3->id}}" category_slug="{{$electricalsProduct3->subCategory->category->slug}}" enquiry_type="electrical">Enquire Now</button>
                                </li>
                              <li><a href="{{route('products.product-detail',[$electricalsProduct3->category->slug,$electricalsProduct3->subcategory->slug,$electricalsProduct3->slug])}}">Explore</a></li>
                           </ul>
                        </div>
                        <div class="ecommerce-item--share">
                             <a class="share-this" data-toggle="collapse" href="#share-social-electrical-2" role="button" aria-expanded="false" aria-controls="share-social-electrical-2">
                               <i class="fa fa-share-alt" aria-hidden="true"></i> Share
                            </a>
                            <div class="collapse" id="share-social-electrical-2">
                              <div class="card card-body">
                                  <div id="ElectricalsShare2"></div>
                              </div>
                            </div>
                         </div>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
                  <div class="category-block--wrap blue-ui">
                     <div class="ecommerce-item--details">
                        <div class="ecommerce-item--name">
                           <h3><a href="{{ route('products.product-detail',[$electricalsProduct4->category->slug,$electricalsProduct4->subcategory->slug,$electricalsProduct4->slug]) }}">{{ $electricalsProduct4->name }}</a></h3>
                        </div>
                        <div class="ecommerce-item--price">
                           <ul>
                              <li class="new-price">Rs. {{ round($electricalsProduct4->sale_price, 0) }}</li>
                              <li class="old-price">Rs. {{ round($electricalsProduct4->regular_price, 0) }}</li>
                              <li class="discount">({{ $electricalsProduct4->discount }}% Off)</li>
                           </ul>
                        </div>
                        <div style="direction:ltr;">
                            <?php
                                $stars = 0;
                                if ($electricalsProduct4->avgRating != null)
                                {
                                    $stars = $electricalsProduct4->avgRating->rating;
                                }
                                for ($i=1; $i <= 5 ; $i++) {
                                    if ($i<=$stars) $checked = "checked";
                                    else $checked = "";
                                    echo '<span class="fa fa-star '.$checked.'" style="margin-right: 8px"></span>';
                                }
                            ?>
                        </div>
                        <div class="ecommerce-item--buttons">
                           <ul>
                                <li>
                                    <form action="{{ route('addTocart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$electricalsProduct4->id}}">
                                        {{-- <button type="submit">Buy Now</button> --}}
                                    </form>
                                    <button type="button" class="open-enquery-modal" product_id="{{$electricalsProduct4->id}}" category_slug="{{$electricalsProduct4->subCategory->category->slug}}" enquiry_type="electrical">Enquire Now</button>
                                </li>
                              <li><a href="{{route('products.product-detail',[$electricalsProduct4->category->slug,$electricalsProduct4->subcategory->slug,$electricalsProduct4->slug])}}">Explore</a></li>
                           </ul>
                        </div>
                        <div class="ecommerce-item--share">
                             <a class="share-this" data-toggle="collapse" href="#share-social-electrical-3" role="button" aria-expanded="false" aria-controls="share-social-electrical-3">
                               <i class="fa fa-share-alt" aria-hidden="true"></i> Share
                            </a>
                            <div class="collapse" id="share-social-electrical-3">
                              <div class="card card-body">
                                  <div id="ElectricalsShare3"></div>
                              </div>
                            </div>
                         </div>
                     </div>
                     <div class="ecommerce-item--image">
                        <img src="{{ asset('storage/product/'.$electricalsProduct4->product_image_primary->image) }}" alt="{{ $electricalsProduct4->name }}" title="{{ $electricalsProduct4->name }}"/>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </section>
    @endif

    <section class="store-ui--wrapper">
      <div class="container-fluid">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="title-ui--wrap">
               <div class="title-text--middle">
                  <h2>View our store</h2>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="store-gallery--wrap">
               <div class="store-ui--column">
                  <div class="store-video--ui">
                     <img src="<?php echo url('/'); ?>/static/images/store-video.jpg" alt="Vaibhav Stores"/>
                     <div class="video-icon">
                        <button type="button" class="btn" data-toggle="modal" data-target="#video-store">
                           <img src="<?php echo url('/'); ?>/static/images/video-icon.png" alt="Video Icon"/>
						   <div>Vaibhav Stores Walkthrough</div>
                        </button>
                     </div>
                  </div>
               </div>
               <div class="store-ui--column">
                  <div class="store-gallery--ui">
                     <div class="gallery-image--one">
                        <img src="<?php echo url('/'); ?>/static/images/vworld_gallery.jpg" alt=""/>
                        <div class="gallery-icon">
                           <button type="button" class="btn" data-toggle="modal" data-target="#gallery-one">
                              <img src="<?php echo url('/'); ?>/static/images/gallery-icon.png" alt="Video Icon"/>
							  <div>World of Vaibhav</div>
                           </button>
                        </div>
                     </div>
                     <div class="gallery-image--two">
                        <img src="<?php echo url('/'); ?>/static/images/archives/IMG_0906.jpg" alt=""/>
                        <div class="gallery-icon">
                           <button type="button" class="btn" data-toggle="modal" data-target="#gallery-two">
                              <img src="<?php echo url('/'); ?>/static/images/gallery-icon.png" alt="Video Icon"/>
							  <div>From the Archives</div>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- Modal for Loading Iframe -->
         <div class="modal fade" id="video-store" tabindex="-1" role="dialog" aria-labelledby="video-storeLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                  <iframe width="100%" height="480" data-src="https://www.youtube.com/embed/0msE1u2EtzM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
               </div>
             </div>
           </div>
         </div>

         <!-- Modal for Gallery One -->
         <div class="modal fade" id="gallery-one" tabindex="-1" role="dialog" aria-labelledby="video-storeLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                  <div class="card-columns">
                     
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/_VIK7177.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/_VIK9487.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/_VIK9539.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9410.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9447.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9450.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9453.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9457.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9512.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9520.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9521.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9528.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9531.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9570.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9577.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9582.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9675.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9682.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9685.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9686.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9718.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/SSZ_9728.jpg" alt="World of Vaibhav">
                     </div>
					 <div class="card">
                         <img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/vworld/_VIK7173.jpg" alt="World of Vaibhav">
                     </div>
                 </div>
               </div>
             </div>
           </div>
         </div>

         <!-- Modal for Gallery Two -->
         <div class="modal fade" id="gallery-two" tabindex="-1" role="dialog" aria-labelledby="video-storeLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                  <div class="card-columns">
                     <div class="card">
                         <!--<img class="card-img-top lazy_load" data-srcnew="<?php echo url('/');?>/static/images/archives/IMG_0900.jpg" alt="Vaibhav">-->
                     </div>
                     
                 </div>
               </div>
             </div>
           </div>
         </div>

      </div>
    </section>

    <section class="verticals-ui--wrapper">
      <div class="container-fluid">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="title-ui--wrap">
               <div class="title-text--middle">
                  <h2>Business Verticals</h2>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="verticals-block--wrap">
               <div class="owl-carousel vertical-ui-slideshow owl-theme">
                  <div class="item">
                     <div class="slideshow-details--wrap">
                        <div class="slideshow-image--wrap">
                           <a href="<?php echo url('/'); ?>/xpress">
                              <img class="slide-on--desktop owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-xpress-banner.jpg" alt="" title="">
                              <img class="slide-on--mobile owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-xpress-banner-mobile.jpg" alt="" title="">
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="slideshow-details--wrap">
                        <div class="slideshow-image--wrap">
                           <a href="<?php echo url('/'); ?>/plus">
                              <img class="slide-on--desktop owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-plus-banner.jpg" alt="" title="">
                              <img class="slide-on--mobile owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-plus-banner-mobile.jpg" alt="" title="">
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="slideshow-details--wrap">
                        <div class="slideshow-image--wrap">
                           <a href="<?php echo url('/'); ?>/care">
                              <img class="slide-on--desktop owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-care-banner.jpg" alt="" title="">
                              <img class="slide-on--mobile owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-care-banner-mobile.jpg" alt="" title="">
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="item">
                     <div class="slideshow-details--wrap">
                        <div class="slideshow-image--wrap">
                           <a href="<?php echo url('/'); ?>/academy">
                              <img class="slide-on--desktop owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-academy-banner.jpg" alt="" title="">
                              <img class="slide-on--mobile owl-lazy" data-src="<?php echo url('/'); ?>/static/images/vaibhav-academy-banner-mobile.jpg" alt="" title="">
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

    @if($brands)
    <section class="thumbnails-ui--two">
      <div class="container-fluid">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="title-ui--wrap">
               <div class="title-text--middle">
                  <h2>Our Channel Partners</h2>
               </div>
               <div class="title-text--action">
               <a href="{{ route('brand.list')}}">View All</a>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="owl-carousel partner-slideshow owl-theme">
               <!-- Slide 01 -->
               @foreach ($brands as $brand)
                    <?php
                        $brnad_short_descriptions = preg_split('/\r\n|[\r\n]/', $brand->short_description);
                    ?>
                    <div class="item">
                        <div class="thumbnail-block--wrap align-items-center">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                <div class="thumbnail-brand--ui">
                                <div class="thumbnail-brand--logo">
                                    <img class="owl-lazy" data-src="{{ asset('storage/brand/'.$brand->logo) }}" alt="{{ $brand->name }}" title="{{ $brand->name }}"/>
                                </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 hide--this">
                                <div class="thumbnail-properties--ui">
                                <div class="thumbnail-properties--list">
                                    <?php echo $brand->short_description; ?>
                                    {{-- <ul>
                                        @foreach ($brnad_short_descriptions as $brnad_short_description)
                                        <li>{{ $brnad_short_description }}</li>
                                        @endforeach
                                    </ul> --}}
                                    <a href="{{route('brand.detail',$brand->name)}}" class="button">View Detail</a>
                                </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 hide-thumbnail--this">
                                <div class="thumbnail-product--image">
                                    <img src="{{ asset('storage/brand/'.$brand->image) }}" alt="{{ $brand->name }}" title="{{ $brand->name }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
               @endforeach
            </div>
         </div>
      </div>
    </section>
    @endif
    <section class="follow-ui--wrapper">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
               <div class="title-ui--wrap">
                  
                  <div class="title-text--middle">
                     <h2>Follow Us</h2>
                  </div>
               </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 padding-0">
               <div class="follow-images--wrap">
                  <div class="follow-image--block">
					<a href="https://www.facebook.com/vaibhavstores.in" target="_blank">
						<img src="<?php echo url('/'); ?>/static/images/facebook.png" alt=""/>
					</a>
                  </div>
                  <div class="follow-image--block">
					<a href="https://www.instagram.com/vaibhavstores/" target="_blank">
						<img src="<?php echo url('/'); ?>/static/images/instagram.png" alt=""/>
					</a>
                  </div>
                  <div class="follow-image--block">
					<a href="https://in.pinterest.com/vaibhavstores/" target="_blank">
						<img src="<?php echo url('/'); ?>/static/images/pinterest.png" alt=""/>
					</a>
                  </div>
                  <div class="follow-image--block">
					<a href="https://www.youtube.com/channel/UCmmEZN3IKueozmKURAF-BxA?" target="_blank">
						<img src="<?php echo url('/'); ?>/static/images/youtube.png" alt=""/>
					</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </section>
	</div> <!--after_loader end-->
	
@endsection


@section ('footer-script')
	<script>
	setTimeout(function() {
	  $('#loading').addClass('hidden');
	  $('#after_loader').css('opacity','1');
	}, 3600);
	</script>
	<script>
		$('#gallery-one').on("show.bs.modal", function () {
		$('.lazy_load').each(function(){
			var img = $(this);
			img.attr('src', img.data('src'));
		});
	});  

   function init() {
    var vidDefer = document.getElementsByTagName('iframe');
    for (var i=0; i<vidDefer.length; i++) {
        if(vidDefer[i].getAttribute('data-src')) {
         vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
        } } }
    window.onload = init;

    function gallerynew(){
       var imgDefer = document.getElementsByTagName('img');
        for (var i=0; i<imgDefer.length; i++) {
        if(imgDefer[i].getAttribute('data-srcnew')) { 
         imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-srcnew'));
        } } }
         window.onload = gallerynew;
    </script>
    <script src="<?php echo url('/'); ?>/share/jssocials.js"></script>
    <script>
        @if ($consumablesProduct)
            $("#ConsumablesShare").jsSocials({
                url: "<?php echo url('/'); ?>/<?php echo $consumablesProduct->category->slug.'/'.$consumablesProduct->subCategory->slug.'/'.$consumablesProduct->slug; ?>",
                text: "<?php echo $consumablesProduct->name; ?>",
                showLabel: false,
                showCount: "inside",
                shares: ["email", "twitter", "facebook", "whatsapp"]
            });
        @endif
        @if ($furnitureProduct1 && $furnitureProduct2 && $furnitureProduct3 && $furnitureProduct4)
            $("#FurnitureShare0").jsSocials({
                url: "<?php echo url('/'); ?>/<?php echo $furnitureProduct1->category->slug.'/'.$furnitureProduct1->subCategory->slug.'/'.$furnitureProduct1->slug; ?>",
                text: "<?php echo $furnitureProduct1->name; ?>",
                showLabel: false,
                showCount: "inside",
                shares: ["email", "twitter", "facebook", "whatsapp"]
            });

            $("#FurnitureShare1").jsSocials({
                url: "<?php echo url('/'); ?>/<?php echo $furnitureProduct2->category->slug.'/'.$furnitureProduct2->subCategory->slug.'/'.$furnitureProduct2->slug; ?>",
                text: "<?php echo $furnitureProduct2->name; ?>",
                showLabel: false,
                showCount: "inside",
                shares: ["email", "twitter", "facebook", "whatsapp"]
            });

            $("#FurnitureShare2").jsSocials({
                url: "<?php echo url('/'); ?>/<?php echo $furnitureProduct3->category->slug.'/'.$furnitureProduct3->subCategory->slug.'/'.$furnitureProduct3->slug; ?>",
                text: "<?php echo $furnitureProduct3->name; ?>",
                showLabel: false,
                showCount: "inside",
                shares: ["email", "twitter", "facebook", "whatsapp"]
            });

            $("#FurnitureShare3").jsSocials({
                url: "<?php echo url('/'); ?>/<?php echo $furnitureProduct4->category->slug.'/'.$furnitureProduct4->subCategory->slug.'/'.$furnitureProduct4->slug; ?>",
                text: "<?php echo $furnitureProduct4->name; ?>",
                showLabel: false,
                showCount: "inside",
                shares: ["email", "twitter", "facebook", "whatsapp"]
            });
            @endif
            @if ($electricalsProduct1 && $electricalsProduct2 && $electricalsProduct3 && $electricalsProduct4)
            $("#ElectricalsShare0").jsSocials({
                url: "<?php echo url('/'); ?>/<?php echo $electricalsProduct1->category->slug.'/'.$electricalsProduct1->subCategory->slug.'/'.$electricalsProduct1->slug; ?>",
                text: "<?php echo $electricalsProduct1->name; ?>",
                showLabel: false,
                showCount: "inside",
                shares: ["email", "twitter", "facebook", "whatsapp"]
            });

            $("#ElectricalsShare1").jsSocials({
                url: "<?php echo url('/'); ?>/<?php echo $electricalsProduct2->category->slug.'/'.$electricalsProduct2->subCategory->slug.'/'.$electricalsProduct2->slug; ?>",
                text: "<?php echo $electricalsProduct2->name; ?>",
                showLabel: false,
                showCount: "inside",
                shares: ["email", "twitter", "facebook", "whatsapp"]
            });

            $("#ElectricalsShare2").jsSocials({
                url: "<?php echo url('/'); ?>/<?php echo $electricalsProduct3->category->slug.'/'.$electricalsProduct3->subCategory->slug.'/'.$electricalsProduct3->slug; ?>",
                text: "<?php echo $electricalsProduct3->name; ?>",
                showLabel: false,
                showCount: "inside",
                shares: ["email", "twitter", "facebook", "whatsapp"]
            });

            $("#ElectricalsShare3").jsSocials({
                url: "<?php echo url('/'); ?>/<?php echo $electricalsProduct4->category->slug.'/'.$electricalsProduct4->subCategory->slug.'/'.$electricalsProduct4->slug; ?>",
                text: "<?php echo $electricalsProduct4->name; ?>",
                showLabel: false,
                showCount: "inside",
                shares: ["email", "twitter", "facebook", "whatsapp"]
            });
            @endif
    </script>
@endsection
