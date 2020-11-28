@extends ('layouts.front')
<link rel="stylesheet" type="text/css" href="<?php echo url('/'); ?>/share/jssocials.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo url('/'); ?>/share/jssocials-theme-flat.css" />
<?php
    use \App\Http\Controllers\HomeController;
    $headerCategories = HomeController::headerCategories();
    ?>
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

<section class="blog-details--wrapper">
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
        <div class="blog-details--grid">
            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7">
                <div class="blog-content--wrap">
                    <div class="blog-heading--text">
                    <h2>{{ $blog->title }}</h2>
                    </div>
                    <div class="blog-meta--wrap">
                    <div class="date">
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                        {{ date('F d Y', strtotime($blog->created_at)) }}
                    </div>
                    <div class="share">
                        <a class="share-this" data-toggle="collapse" href="#share-social-blog" role="button" aria-expanded="false" aria-controls="share-social-blog">
                            <i class="fa fa-share-alt" aria-hidden="true"></i> Share
                         </a>
                         <div class="collapse" id="share-social-blog">
                           <div class="card card-body">
                               <div id="blogShare"></div>
                           </div>
                         </div>
                    </div>
                    </div>
                    <div class="blog-featured--wrap">
                    @if ($blog->featured_image)
                    <img src="{{ asset('storage/blog/'.$blog->id.'/'.$blog->featured_image) }}" alt="{{$blog->title}}"/>
                    @endif
                    </div>
                    <div class="blog-reader--wrap">
                        <?php echo $blog->content; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
                <div class="blog-sidebar--wrap">
                    <div class="sidebar-search">
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control typeaheadblog" placeholder="Search for the blog">
                    </div>
                    </div>
                    @if ($recentBlogs->count() > 0)
                    <div class="sidebar-post--recommended">
                        <div class="sidebar-item--title">
                            <h3>Recent Post</h3>
                        </div>
                        @foreach ($recentBlogs as $recentBlog)
                            <div class="sidebar-post--item">
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                    <div class="recommended-post--image">
                                        @if ($recentBlog->featured_image)
                                            <a href="{{route('blogs.view',[$recentBlog->slug])}}">
                                                <img src="{{ asset('storage/blog/'.$recentBlog->id.'/'.$recentBlog->featured_image) }}" alt="{{$recentBlog->title}}"/>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8">
                                    <div class="recommended-post--excerpt">
                                        <a href="{{route('blogs.view',[$recentBlog->slug])}}">
                                            <h5>{{$recentBlog->title }}</h5>
                                        </a>
                                        <div class="date">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                        {{ date('F d Y', strtotime($recentBlog->created_at)) }}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    @endif
                    <div class="sidebar-item--categories">
                        <div class="sidebar-item--title">
                            <h3>Shop by Category</h3>
                        </div>
                        @foreach ($headerCategories as $headerCategory)

                        <div class="sidebar-category--item">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="recommended-category--image">
                                    <a href="{{route('products.category-list',[$headerCategory->slug])}}">
                                        <img src="{{ asset('storage/category/'.$headerCategory->image) }}" alt=""/>
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="recommended-category--excerpt">
                                    <a href="{{route('products.category-list',[$headerCategory->slug])}}">
                                        <h3>{{$headerCategory->name}}</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="sidebar-promotion--image">
						<a href="/consumable"><img src="<?php echo url('/'); ?>/static/images/promotion-banner-01.png" alt="Vaibhav"></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection
@section ('footer-script')
    <script src="<?php echo url('/'); ?>/share/jssocials.js"></script>
    <script>
        $("#blogShare").jsSocials({
            url: "<?php echo url('/'); ?>/blog/<?php echo $blog->slug; ?>",
            text: "<?php echo $blog->title; ?>",
            showLabel: false,
            showCount: "inside",
            shares: ["email", "twitter", "facebook", "whatsapp"]
        });
    </script>
@endsection
