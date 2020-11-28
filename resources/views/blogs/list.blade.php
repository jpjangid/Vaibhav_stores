@extends ('layouts.front')


@section ('content')
<section class="category-banner--wrapper assign-right--transparent">
  <div class="container-fluid">
     <div class="row">
        <div class="owl-carousel category-slideshow owl-theme">
           <div class="item">
              <div class="slideshow-details--wrap">
                 <div class="slideshow-image--wrap">
                    <img class="slide-on--desktop" src="<?php echo url('/'); ?>/static/images/vaibhav-blog.jpg" alt="" title="">
                    <img class="slide-on--mobile" src="<?php echo url('/'); ?>/static/images/vaibhav-blog.jpg" alt="" title="">
                 </div>
              </div>
           </div>
           <div class="item">
              <div class="slideshow-details--wrap">
                 <div class="slideshow-image--wrap">
                    <img class="slide-on--desktop" src="<?php echo url('/'); ?>/static/images/vaibhav-academy-slideshow-02.jpg" alt="" title="">
                    <img class="slide-on--mobile" src="<?php echo url('/'); ?>/static/images/vaibhav-academy-slideshow-02.jpg" alt="" title="">
                 </div>
              </div>
           </div>
           <div class="item">
              <div class="slideshow-details--wrap">
                 <div class="slideshow-image--wrap">
                    <img class="slide-on--desktop" src="<?php echo url('/'); ?>/static/images/vaibhav-academy-slideshow-03.jpg" alt="" title="">
                    <img class="slide-on--mobile" src="<?php echo url('/'); ?>/static/images/vaibhav-academy-slideshow-03.jpg" alt="" title="">
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
</section>

<section class="blog-listing--wrapper">
  <div class="container-fluid">
     <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="breadcrumb-wrap">
           <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="#">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Blogs</li>
              </ol>
           </nav>
        </div>
     </div>
     <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="title-ui--wrap">
           <div class="title-text--middle">
              <h2>Blogs</h2>
           </div>
        </div>
     </div>
     <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="blog-listing--grid">
           @if ($blogs)
           @foreach ($blogs as $blog)
           <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
              <div class="blog-listing--wrap">
                 <a href="{{ route('blogs.view', $blog->slug) }}">
                    @if ($blog->featured_image)
                    <img src="{{ asset('storage/blog/'.$blog->id.'/'.$blog->featured_image) }}" alt="{{$blog->title}}"/>
                    @endif
                  </a>
                 <div class="blog-excerpt--wrap">
                    <div class="published-date">
                       <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                       {{ date('F d Y', strtotime($blog->created_at)) }}
                    </div>
                    <h2><a href="{{ route('blogs.view', $blog->slug) }}">{{$blog->title }}</a></h2>
                    <p>{{$blog->excerpt }}</p>
                 </div>
              </div>
           </div>
           @endforeach
           @endif
        </div>
     </div>
  </div>
</section>
@endsection