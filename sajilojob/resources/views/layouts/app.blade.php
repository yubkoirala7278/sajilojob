<?php
if (!isset($seo)) {
    $seo = (object) ['seo_title' => $siteSetting->site_name, 'seo_description' => $siteSetting->site_name, 'seo_keywords' => $siteSetting->site_name, 'seo_other' => ''];
}
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="{{ session('localeDir', 'ltr') }}" dir="{{ session('localeDir', 'ltr') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __($seo->seo_title) }}</title>
    <meta name="Description" content="{!! $seo->seo_description !!}">
    <meta name="Keywords" content="{!! $seo->seo_keywords !!}">
    {!! $seo->seo_other !!}
    <!-- Fav Icon -->
    <!--<link rel="shortcut icon" href="{{ asset('/') }}favicon.ico">-->

    <link rel="shortcut icon" href="{{ asset('/favicon_images') }}/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/favicon_images') }}/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/favicon_images') }}/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/favicon_images') }}/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/favicon_images') }}/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/favicon_images') }}/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/favicon_images') }}/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/favicon_images') }}/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/favicon_images') }}/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/favicon_images') }}/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('/favicon_images') }}/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon_images') }}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/favicon_images') }}/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon_images') }}/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('/favicon_images') }}/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('/favicon_images') }}/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Slider -->
    <link href="{{ asset('/') }}js/revolution-slider/css/settings.css" rel="stylesheet">
    <!-- Owl carousel -->
    <link href="{{ asset('/') }}css/owl.carousel.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('/') }}css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('/') }}css/font-awesome.css" rel="stylesheet">
    <!-- Custom Style -->
    <link href="{{ asset('/') }}css/main.css" rel="stylesheet">
    @if (session('localeDir', 'ltr') == 'rtl')
        <!-- Rtl Style -->
        <link href="{{ asset('/') }}css/rtl-style.css" rel="stylesheet">
    @endif
    <link href="{{ asset('/') }}admin_assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"
        rel="stylesheet" />
    <link href="{{ asset('/') }}admin_assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}admin_assets/global/plugins/select2/css/select2-bootstrap.min.css"
        rel="stylesheet" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="{{ asset('/') }}js/html5shiv.min.js"></script>
          <script src="{{ asset('/') }}js/respond.min.js"></script>
        <![endif]-->
    @stack('styles')
</head>

<body>
    @yield('content')
    <!-- Bootstrap's JavaScript -->
    <script src="{{ asset('/') }}js/jquery.min.js"></script>
    <script src="{{ asset('/') }}js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}js/popper.js"></script>
    <!-- Owl carousel -->
    <script src="{{ asset('/') }}js/owl.carousel.js"></script>
    <script src="{{ asset('/') }}js/owl.autoplay.js"></script>
    <script src="{{ asset('/') }}admin_assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
        type="text/javascript"></script>
    <script src="{{ asset('/') }}admin_assets/global/plugins/Bootstrap-3-Typeahead/bootstrap3-typeahead.min.js"
        type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{ asset('/') }}admin_assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('/') }}admin_assets/global/plugins/jquery.scrollTo.min.js" type="text/javascript"></script>
    <!-- Revolution Slider -->
    <script type="text/javascript" src="{{ asset('/') }}js/revolution-slider/js/jquery.themepunch.tools.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('/') }}js/revolution-slider/js/jquery.themepunch.revolution.min.js">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    {!! NoCaptcha::renderJs() !!}
    @stack('scripts')
    <!-- Custom js -->
    <script src="{{ asset('/') }}js/script.js"></script>
    <script type="text/JavaScript">
        $(document).ready(function(){
                    $(document).scrollTo('.has-error', 2000);
                    });
                    function showProcessingForm(btn_id){		
                    $("#"+btn_id).val( 'Processing .....' );
                    $("#"+btn_id).attr('disabled','disabled');		
                    }
                </script>
</body>

</html>
