@extends ('layouts.front')


@section ('content')
<section class="item-review--wrapper">
   <div class="container">
      <div class="row">
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
             <div class="title-ui--wrap">
                <div class="title-text--middle">
                   <h2>Rate and Review</h2>
                </div>
             </div>
         </div>
         <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
            <table class="review-detail--image">
               <tr>
                  <td>
                     <img src="{{ asset('storage/product/'.$product->product_image_primary->image) }}" alt="" width="70">
                  </td>
               </tr>
               <tr><td height="30"></td></tr>
               <tr>
                  <td>
                     <h4>{{ $product->name }}</h4>
                  </td>
               </tr>
            </table>
         </div>
         <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
            <form action="{{ route('saveReview') }}" id="saveReview" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="order_row_id" value="{{ $order_row_id }}">
            <style type="text/css">
                 .rating {
                   display: inline-block;
                   position: relative;
                   height: 50px;
                   line-height: 50px;
                   font-size: 50px;
                 }

                 .rating label {
                   position: absolute;
                   top: 0;
                   left: 0;
                   height: 100%;
                   cursor: pointer;
                 }

                 .rating label:last-child {
                   position: static;
                 }

                 .rating label:nth-child(1) {
                   z-index: 5;
                 }

                 .rating label:nth-child(2) {
                   z-index: 4;
                 }

                 .rating label:nth-child(3) {
                   z-index: 3;
                 }

                 .rating label:nth-child(4) {
                   z-index: 2;
                 }

                 .rating label:nth-child(5) {
                   z-index: 1;
                 }

                 .rating label input {
                   position: absolute;
                   top: 0;
                   left: 0;
                   opacity: 0;
                 }

                 .rating label .icon {
                   float: left;
                   color: transparent;
                 }

                 .rating label:last-child .icon {
                   color: #CCC;
                 }

                 .rating:not(:hover) label input:checked ~ .icon,
                 .rating:hover label:hover input ~ .icon {
                   color: #E51A4B;
                 }

                 .rating label input:focus:not(:checked) ~ .icon:last-child {
                   color: #CCC;
                   text-shadow: 0 0 5px #E51A4B;
                 }
            </style>
            <div class="form-group row">
                 <label for="rating" class="col-md-12 col-form-label">{{ __('Rating') }}</label>
                 <div class="col-md-12">
                     <div class="rating">
                         <label>
                             <input type="radio" name="stars" value="1" />
                             <span class="icon">★</span>
                         </label>
                         <label>
                             <input type="radio" name="stars" value="2" />
                             <span class="icon">★</span>
                             <span class="icon">★</span>
                         </label>
                         <label>
                             <input type="radio" name="stars" value="3" />
                             <span class="icon">★</span>
                             <span class="icon">★</span>
                             <span class="icon">★</span>   
                         </label>
                         <label>
                             <input type="radio" name="stars" value="4" />
                             <span class="icon">★</span>
                             <span class="icon">★</span>
                             <span class="icon">★</span>
                             <span class="icon">★</span>
                         </label>
                         <label>
                             <input type="radio" name="stars" value="5" />
                             <span class="icon">★</span>
                             <span class="icon">★</span>
                             <span class="icon">★</span>
                             <span class="icon">★</span>
                             <span class="icon">★</span>
                         </label>
                     </div>
                     @error('rating')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>
            </div>
            <div class="form-group row">
                 <label for="review" class="col-md-12 col-form-label">{{ __('Review') }}</label>
                 <div class="col-md-12">
                     <textarea id="review" class="form-control @error('review') is-invalid @enderror" name="review" required placeholder="Write your review...">{{ old('review') }}</textarea>
                     @error('review')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>
            </div>
            <button class="btn btn-primary " type="submit">Save Rating & Review</button>
            </form>
         </div>
      </div>
   </div>
</section>

@endsection



