<!DOCTYPE html>
<html lang="en" >
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8"/>

    <title>{{ config('app.name') }} Admin Panel | Login</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <!--end::Fonts -->


    <!--begin::Page Custom Styles(used by this page) -->
     <link href="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/css/pages/login/login-1.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Skins -->

    <link rel="shortcut icon" href="<?php echo url('/'); ?>/static/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo url('/'); ?>/static/images/favicon.ico" type="image/x-icon">
    <!-- Hotjar Tracking Code for keenthemes.com -->
    <!-- <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1070954,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script> -->

    <!-- <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-37564768-1');
    </script>    -->
</head>

    <!-- begin::Body -->
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >

    @yield ('content')


    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
    </script>
    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->
   <script src="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
   <script src="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/js/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->


    <!--begin::Page Scripts(used by this page) -->
    <script src="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/js/pages/custom/login/login-1.js" type="text/javascript"></script>
    <!--end::Page Scripts -->
</body>
<!-- end::Body -->
<script>
    $(document).ready(function(){
        $(document).on('click','#kt_login_forgot',function(){
            $('.kt-signin').css('display','none');
            $('.kt-forgot').css('display','block');
        });
        $(document).on('click','#kt_login_forgot_cancel',function(){
            $('.kt-forgot').css('display','none');
            $('.kt-signin').css('display','block');
        });
    });
</script>
</html>
