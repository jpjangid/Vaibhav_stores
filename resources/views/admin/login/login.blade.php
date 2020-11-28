<!-- <form action="{{ route('AdminLogin') }}" method="POST" enctype="multipart/form-data">
@csrf
    <input type="text" name="email">
    <input type="password" name="password">
    <button type="submit">SUBMIT</button>
</form> -->

@extends ('layouts.backendlogin')

@section ('content')
<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
            <!--begin::Aside-->
            <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url(<?php echo url('/'); ?>/static/images/slideshow-01.png);">
                <div class="kt-grid__item">
                    <a href="#" class="kt-login__logo">
                        <img src="<?php echo url('/'); ?>/static/images/logo.png" width="150px">
                    </a>
                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                    <div class="kt-grid__item kt-grid__item--middle">
                        <h3 class="kt-login__title">Welcome to {{ config('app.name') }} Admin Panel !</h3>
                        <h4 class="kt-login__subtitle">Here you can manage you site.</h4>
                    </div>
                </div>
                <div class="kt-grid__item">
                    <div class="kt-login__info">
                        <div class="kt-login__copyright">
                            {{ config('app.footer_text') }}
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Aside-->

            <!--begin::Content-->
            <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

                <!--begin::Body-->
                <div class="kt-login__body">



                    <!--begin::Signin-->
                    <div class="kt-login__form kt-signin">
                        <div class="kt-login__title">
                            <h3>Sign In</h3>
                        </div>

                        <!--begin::Form-->
                        <form action="{{ route('AdminLogin') }}" class="kt-form" method="POST" novalidate="novalidate" id="kt_login_form">
                        @csrf
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Username" name="email" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="Password" name="password"  autocomplete="off">
                            </div>
                            <div class="kt-login__extra text-right">
                                <a href="javascript:;" id="kt_login_forgot">Forget Password ?</a>
                            </div>
                            <!--begin::Action-->
                            <div class="kt-login__actions">
                                <button type="submit"  class="btn btn-primary btn-elevate kt-login__btn-primary">Sign In</button>
                            </div>
                            <!--end::Action-->
                        </form>

                        @if(Session::has('fail'))
                            <div class="alert alert-danger">
                               {{Session::get('fail')}}
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                               {{Session::get('success')}}
                            </div>
                        @endif
                        <!--end::Form-->

                    </div>
                    <div class="kt-login__form kt-forgot" style="display:none;">
                        <div class="kt-login__title">
                            <h3>Forgotten Password ?</h3>
                            <h4>Enter your email to reset your password:</h4>
                        </div>
                        <form action="{{ route('admin.forgottenpassword') }}" class="kt-form" method="POST" novalidate="novalidate" id="kt_login_form">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off" required>
                            </div>
                            <div class="kt-login__actions">
                                <button type="submit"  class="btn btn-primary btn-elevate kt-login__btn-primary">Request</button>
                                <button id="kt_login_forgot_cancel" type="button" class="btn btn-outline-brand  btn-elevate">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <!--end::Signin-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Content-->
        </div>
    </div>
</div>
<!-- end:: Page -->
@endsection
