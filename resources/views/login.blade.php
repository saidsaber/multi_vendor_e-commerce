<!DOCTYPE html>
<html lang="en">


<!-- molla/login.html  22 Nov 2019 10:04:03 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href={{ asset('assets/images/icons/apple-touch-icon.png') }}>
    <link rel="icon" type="image/png" sizes="32x32" href={{ asset('assets/images/icons/favicon-32x32.png') }}>
    <link rel="icon" type="image/png" sizes="16x16" href={{ asset('assets/images/icons/favicon-16x16.png') }}>
    <link rel="manifest" href={{ asset('assets/images/icons/site.html') }}>
    <link rel="mask-icon" href={{ asset('assets/images/icons/safari-pinned-tab.svg') }} color="#666666">
    <link rel="shortcut icon" href={{ asset('assets/images/icons/favicon.ico') }}>
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content={{ asset('assets/images/icons/browserconfig.xml') }}>
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href={{ asset('assets/css/bootstrap.min.css') }}>
    <!-- Main CSS File -->
    <link rel="stylesheet" href={{ asset('assets/css/style.css') }}>
</head>

<body>
    <div class="page-wrapper">

        <main class="main">
            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
                style="background-image: url({{ asset('assets/images/backgrounds/login-bg.jpg') }});width: 100%;height: 100vh">
                <div class="container">
                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2"
                                        role="tab" aria-controls="signin-2" aria-selected="false">Log In</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        {{ $errors->first() }}
                                    </div>
                                @endif

                                <div class="tab-pane fade show active" id="register-2" role="tabpanel"
                                    aria-labelledby="register-tab-2">
                                    @php
                                        $route = 'post.login';

                                        if ($role == 'vendor') {
                                            $route = 'post.vendor.login';
                                        } elseif ($role == 'admin') {
                                            $route = 'post.admin.login';
                                        }
                                    @endphp

                                    <form action="{{ route($route) }}" method="post" novalidate>
                                        @csrf
                                        <div class="form-group">
                                            <label for="register-email-2">Your email address *</label>
                                            <input type="text" class="form-control" id="register-email-2"
                                                name="email" value="{{ old('email') }}">
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password-2">Password *</label>
                                            <input type="password" class="form-control" id="register-password-2"
                                                name="password">
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>Log In</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
        </main><!-- End .main -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>


    <!-- Plugins JS File -->
    <script src={{ asset('assets/js/jquery.min.js') }}></script>
    <script src={{ asset('assets/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('assets/js/jquery.hoverIntent.min.js') }}></script>
    <script src={{ asset('assets/js/jquery.waypoints.min.js') }}></script>
    <script src={{ asset('assets/js/superfish.min.js') }}></script>
    <script src={{ asset('assets/js/owl.carousel.min.js') }}></script>
    <!-- Main JS File -->
    <script src={{ asset('assets/js/main.js') }}></script>
</body>


<!-- molla/login.html  22 Nov 2019 10:04:03 GMT -->

</html>
