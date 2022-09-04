<!DOCTYPE html>


<html lang="en" class="dark-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('frest-assets/') }}/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>XM @stack('title')</title>

    <meta name="description" content="" />
    <meta name="keywords" content="">
    <!-- Canonical SEO -->
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('frest-assets/') }}/favicon.ico" />
    <link rel="preconnect" href="{{ asset('frest-assets/') }}/fonts.googleapis.com/index.html">
    <link rel="preconnect" href="{{ asset('frest-assets/') }}/fonts.gstatic.com/index.html" crossorigin="">
    <link
        href="{{ asset('frest-assets/') }}/fonts.googleapis.com/css2e40e.css?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/css/rtl/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/css/demo.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('frest-assets/') }}/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('frest-assets/') }}/vendor/js/template-customizer.js"></script>
    <script src="{{ asset('frest-assets/') }}/js/config.js"></script>

    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet"
        href="{{ asset('frest-assets/') }}/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
    <link rel="stylesheet"
        href="{{ asset('frest-assets/') }}/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/libs/jquery-timepicker/jquery-timepicker.css" />
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/libs/pickr/pickr-themes.css" />


    @stack('styles')
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/libs/sweetalert2/sweetalert2.css">
    <link rel="stylesheet" href="{{ asset('frest-assets/') }}/vendor/libs/toastr/toastr.css">
    <link rel="stylesheet" href="{{ asset('frest-assets') }}/vendor/libs/select2/select2.css"/>
    <link rel="stylesheet" href="{{ asset('frest-assets') }}/vendor/libs/bootstrap-select/bootstrap-select.css">
    <link rel="stylesheet" href="{{ asset('frest-assets') }}/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">


            <!-- Menu -->

            @include('layouts.partials.sidebar')

            <!-- / Menu -->



            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('layouts.partials.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    @yield('content')




                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-fluid d-flex  flex-wrap justify-content-end py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                <a target="_blank" href="https://www.xm.com/">XM</a>
                            </div>

                        </div>
                    </footer>
                    <!-- / Footer -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>



        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <script type="text/javascript">
        const APP_URL = '{!! config('app.url') !!}';
        const CSRF_VALUE = '{!! csrf_token() !!}';

    </script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('frest-assets/') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('frest-assets/') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('frest-assets/') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('frest-assets/') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('frest-assets/') }}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('frest-assets/') }}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('frest-assets/') }}/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{ asset('frest-assets/') }}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <script src="{{ asset('frest-assets/') }}/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="{{ asset('frest-assets/') }}/vendor/libs/toastr/toastr.js"></script>
    <script src="{{ asset('frest-assets/') }}/vendor/libs/block-ui/block-ui.js"></script>
    <!-- Main JS -->
    <script src="{{ asset('frest-assets/') }}/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <!-- Page JS -->

    <script src="{{ asset('frest-assets/') }}/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('frest-assets/') }}/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="{{ asset('frest-assets/') }}/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="{{ asset('frest-assets/') }}/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="{{ asset('frest-assets/') }}/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
    <script src="{{ asset('frest-assets/') }}/vendor/libs/pickr/pickr.js"></script>
    <script src="{{ asset('frest-assets/') }}/js/extended-ui-blockui.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('frest-assets') }}/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('frest-assets') }}/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="{{ asset('frest-assets') }}/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="{{ asset('frest-assets') }}/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="{{ asset('frest-assets') }}/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="{{ asset('frest-assets') }}/vendor/libs/formvalidation/dist/js/plugins/StartEndDate.min.js"></script>


    @stack('scripts')


    <script>

        // startDate =$("#start-date")
        // if (startDate) {
        //     startDate.flatpickr({
        //         enableTime: false,
        //         dateFormat: 'Y/m/d',
        //         maxDate : new Date(),
        //         onChange: function () {
        //                 fv.revalidateField('startDate');
        //         },
        //     });
        // }


        // endDate =$("#end-date")
        // if (endDate) {
        //     endDate.flatpickr({
        //         enableTime: false,
        //         dateFormat: 'Y/m/d',
        //         maxDate : new Date(),
        //         onChange: function () {
        //                 fv.revalidateField('endDate');
        //         },
        //     });
        // }

        $('.select2').select2({
                placeholder: 'Select',
            });

    </script>
</body>

</html>
