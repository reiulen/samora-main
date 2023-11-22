<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.header')
    @stack('custom-style')
</head>

<body>
    <div class="main-wrapper">
        @include('include.sidebar')

        <div class="page-wrapper">
            @include('include.navbar')

            <div class="page-content">
                @yield('content')
            </div>

            @include('include.footer')
        </div>
    </div>
    <!-- core:js -->
    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    @stack('custom-script')
    <!-- End custom js for this page -->
</body>

</html>
