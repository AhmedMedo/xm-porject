<!DOCTYPE html>


<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('frest-assets/') }}/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ __('Site Title') }}</title>

    <meta name="description" content="" />
    <meta name="keywords" content="">
    <!-- Canonical SEO -->

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('frest-assets/') }}/favicon.ico" />
    <link rel="preconnect" href="{{ asset('frest-assets/') }}/fonts.googleapis.com/index.html">
    <link rel="preconnect" href="{{ asset('frest-assets/') }}/fonts.gstatic.com/index.html" crossorigin="">
    <link href="{{ asset('frest-assets/') }}/fonts.googleapis.com/css2e40e.css?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('frest-assets/') }}/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('frest-assets/') }}/js/config.js"></script>


@stack('styles')
</head>

<body>

@yield('content')
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('frest-assets/') }}/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('frest-assets/') }}/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('frest-assets/') }}/vendor/js/bootstrap.js"></script>
<script src="{{ asset('frest-assets/') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{ asset('frest-assets/') }}/vendor/libs/hammer/hammer.js"></script>
<script src="{{ asset('frest-assets/') }}/vendor/libs/i18n/i18n.js"></script>
<script src="{{ asset('frest-assets/') }}/vendor/libs/typeahead-js/typeahead.js"></script>

<!-- Main JS -->
<script src="{{ asset('frest-assets/') }}/js/main.js"></script>

@stack('scripts')
</body>
</html>


