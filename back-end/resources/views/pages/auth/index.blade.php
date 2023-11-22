<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Samoragroup Intranet">
    <meta name="author" content="Samoragroup">

    <title>Samoragroup Intranet CMS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            @if (Session::has('message'))
                <div class="alert {{ Session::get('alert-class') }} alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                </div>
            @endif
            <div class="page-content d-flex align-items-center justify-content-center">
                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-12 col-xl-4 mx-auto">
                        <div class="card">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo d-block mb-2 text-center">
                                    <img src="{{ asset('assets/images/favicon.png') }}" alt=""
                                        class="img-fluid w-25">
                                </a>
                                <form class="forms-sample" action="{{ route('login.post') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="mb-3">
                                        <label for="userEmail" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="userEmail" placeholder="Email"
                                            name="email" required value="{{ old('email') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="userPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="userPassword" name="password"
                                            autocomplete="current-password" placeholder="Password" required>
                                    </div>
                                    <div>
                                        <input type="submit" name="submit" id="submit"
                                            class="btn btn-primary me-2 mb-2 mb-md-0 text-white" value="Login">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
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

</body>

</html>
