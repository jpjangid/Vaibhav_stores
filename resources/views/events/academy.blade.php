@extends ('layouts.front')

@section ('content')

<section class="category-banner--wrapper assign-right--transparent">
      <div class="container-fluid">
         <div class="row">
            <div class="owl-carousel category-slideshow owl-theme">
               <div class="item">
                    <div class="slideshow-details--wrap">
                       <div class="slideshow-image--wrap">
                          <img class="slide-on--desktop" src="<?php echo url('/'); ?>/static/images/vaibhav-academy-slideshow-01.jpg" alt="" title="">
                          <img class="slide-on--mobile" src="<?php echo url('/'); ?>/static/images/vaibhav-academy-slideshow-01.jpg" alt="" title="">
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

<!-- <section class="academy-information--wrapper">
    <div class="container-fluid">
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="breadcrumb-wrap">
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Academy</li>
                </ol>
             </nav>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="title-ui--wrap">
             <div class="title-text--middle">
                <h2>Academy</h2>
             </div>
             @if(Session::has('success'))
                <div class="alert alert-success" role="alert" data-dismiss="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="academy-information--grid">
             <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="academy-information--image">
                   <img src="<?php // echo url('/'); ?>/img/academy-information-image-01.png" alt=""/>
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="academy-information--text">
                   <p>Vaibhav Stores is a skill development initiative by us to help beauty professionals hone their skills & stay up to date with latest developments of our industry. You can enrol for workshops, seminars & training sessions led by expert beauty professionals. Its also an effective platform to network with other beauty professionals & build contacts.</p>
                   <a href="#" class="btn btn-primary">Read More</a>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section> -->

  <section class="plus-question--wrapper" style="margin-top: 30px;">
    <div class="container-fluid">
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="title-ui--wrap">
             <div class="title-text--middle">
                <h2>Academy</h2>
                <h5>For Professional Skill Training</h5>
             </div>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="plus-information--grid">
             <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="plus-information--text">
                   <h3><span>Q.</span>What is Academy?</h3>
                   <p>Vaibhav Academy is a not for profit skill development academy for professional skills training. At the academy, various workshops, seminars and training programs are conducted by expert beauty professionals.</p>
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-information--picture">
                   <img src="<?php echo url('/'); ?>/static/images/academy-faq-picture-01.jpg" alt="" title="">
                </div>
             </div>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="plus-information--grid">
             <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="plus-information--text">
                   <h3><span>Q.</span>How it works?</h3>
                   <p>Budding beauty professionals can view the schedule for upcoming seminars & workshops of the academy. Select the event you are interested to attend. Pay the registration fee & confirm your participation for the workshop.</p>
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-information--picture">
                   <img src="<?php echo url('/'); ?>/static/images/academy-faq-picture-02.jpg" alt="" title="">
                </div>
             </div>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="plus-information--grid">
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-information--picture">
                   <img src="<?php echo url('/'); ?>/static/images/academy-faq-picture-03.jpg" alt="" title="">
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="plus-information--text">
                   <h3><span>Q.</span>Who is it for?</h3>
                   <p>Attending skill development workshops helps individuals polish their skills & learn useful tips/tricks from the experts. If you are a budding beauty professional, a beginner or would just like to polish your skills, then you should register for our various workshops. </p>
                </div>
             </div>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="plus-information--grid">
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-information--picture">
                   <img src="<?php echo url('/'); ?>/static/images/academy-faq-picture-04.jpg" alt="" title="">
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="plus-information--text">
                   <h3><span>Q.</span>Whom to get in touch with?</h3>
                   <p>We have a dedicated team just to guide you at every step. Feel free to get in touch with them on the details given below. </p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>

@if (count($recentEvents) > 0)
<section class="academy-carousel--wrapper">
    <div class="container-fluid">
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="title-ui--wrap">
             <div class="title-text--up">
                <h3>Recent Event</h3>
             </div>
          </div>
       </div>
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="academy-carousel--wrap">
             <div class="owl-carousel category-inner owl-theme">
                 @foreach ($recentEvents as $recentEvent)
                    <a href="{{route('event.academyDetails',$recentEvent->id)}}" style="text-decoration:none;">
                        <div class="item">
                            <div class="slideshow-details--wrap">
                                <div class="slideshow-details--image">
                                    <img src="{{ asset('storage/event/'.$recentEvent->id.'/'.$recentEvent->image) }}" alt="{{$recentEvent->name}}"/>
                                </div>
                                <div class="slideshow-details--title">
                                    <h4>{{$recentEvent->name}} -<span>{{date('M Y',strtotime($recentEvent->event_date))}}</span></h4>
                                </div>
                            </div>
                        </div>
                    </a>
                 @endforeach
             </div>
          </div>
       </div>
    </div>
 </section>
@endif

@if (count($upcomingEvents) > 0)
 <section class="academy-item--wrapper">
    <div class="container-fluid">
       <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="academy-archive--list">
            @foreach ($upcomingEvents as $upcomingEvent)
             <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="academy-excerpt--wrap">
                   <div class="academy-excerpt--image">
                      <img src="{{ asset('storage/event/'.$upcomingEvent->id.'/'.$upcomingEvent->image) }}" alt="{{$upcomingEvent->name}}"/>
                      <div class="academy-excerpt--action">
                      <a href="{{route('event.academyDetails',$upcomingEvent->id)}}">View</a>
                      </div>
                   </div>
                   <div class="academy-excerpt--details">
                      <div class="date"><span>{{date('jS',strtotime($upcomingEvent->event_date))}}</span> {{date('M',strtotime($upcomingEvent->event_date))}}</div>
                      <div class="meta">
                        <h3>{{$upcomingEvent->name}}</h3>
                        <?php
                            $whole = floor($upcomingEvent->price);
                            $fraction = $upcomingEvent->price - $whole;
                        ?>
                        <p>Price: Rs. {{ ($fraction > 0) ? $upcomingEvent->price : $whole}}</p>
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
                   <p>1091, F1, OTC Road, <br/>Bengaluru 560002</p>
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-connect-wrap">
                   <h5><span><i class="fa fa-phone" aria-hidden="true"></i></span> Telephone</h5>
                   <p>Mobile - +91-6366094647</p>
                   <p>Landline - 080-41518183</p>
                </div>
             </div>
             <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="plus-connect-wrap">
                   <h5><span><i class="fa fa-envelope" aria-hidden="true"></i></span> Email</h5>
                   <p>academy@vaibhavstores.in</p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>

 @endsection
 
<div class="whats-app-icon hide-on-mobile d-none d-lg-block">
      <a class="nav-link whats-app" href="https://web.whatsapp.com/send?phone=+916366094647&text=<?php echo Request::fullUrl(); ?>" 
      target="_blank">
		<img src="<?php echo url('/'); ?>/static/images/whatsapp.png" width="60" alt="WhatsApp"/>
		
	  </a>
</div>
<div class="whats-app-icon show-on-mobile d-block d-lg-none">
      <a class="nav-link whats-app" href="https://wa.me/916366094647?text=<?php echo Request::fullUrl(); ?>" 
      target="_blank"><img src="<?php echo url('/'); ?>/static/images/whatsapp.png" width="50" alt="WhatsApp"/></a>
</div>
