<?php
if (!isset($seo)) {
    $seo = (object) [
        'seo_title' => $siteSetting->site_name,
        'seo_description' => $siteSetting->site_name,
        'seo_keywords' => $siteSetting->site_name,
        'seo_other' => ''
    ];
}
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="{{ session('localeDir', 'ltr') }}" dir="{{ session('localeDir', 'ltr') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __($seo->seo_title) }}</title>
    <meta name="description" content="{{ $seo->seo_description }}">
    <meta name="keywords" content="{{ $seo->seo_keywords }}">
    {!! $seo->seo_other !!}

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('favicon_images/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon_images/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon_images/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon_images/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon_images/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon_images/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon_images/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon_images/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon_images/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_images/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon_images/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon_images/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_images/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon_images/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @if (session('localeDir', 'ltr') == 'rtl')
        <link href="{{ asset('css/rtl-style.css') }}" rel="stylesheet">
    @endif
    <link href="{{ asset('admin_assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>
    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('admin_assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin_assets/global/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    {!! NoCaptcha::renderJs() !!}
    @stack('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(document).scrollTo('.has-error', 2000);
        });
        function showProcessingForm(btn_id){
            $("#"+btn_id).val('Processing .....');
            $("#"+btn_id).attr('disabled', 'disabled');
        }
    </script>
</body>

</html>
