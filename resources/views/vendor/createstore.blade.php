<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href={{ asset('adminstyle/assets/img/favicon.png') }} rel="icon">
    <link href={{ asset('adminstyle/assets/img/favicon.png') }} rel="icon">
    <link href={{ asset('adminstyle/assets/img/apple-touch-icon.png') }} rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href={{ asset('adminstyle/assets/vendor/bootstrap/css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('adminstyle/assets/vendor/bootstrap-icons/bootstrap-icons.css') }} rel="stylesheet">
    <link href={{ asset('adminstyle/assets/vendor/boxicons/css/boxicons.min.css') }} rel="stylesheet">
    <link href={{ asset('adminstyle/assets/vendor/quill/quill.snow.css') }} rel="stylesheet">
    <link href={{ asset('adminstyle/assets/vendor/quill/quill.bubble.css') }} rel="stylesheet">
    <link href={{ asset('adminstyle/assets/vendor/remixicon/remixicon.css') }} rel="stylesheet">
    <link href={{ asset('adminstyle/assets/vendor/simple-datatables/style.css') }} rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('adminstyle/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
    .con {
        width: 100%;
        height: calc(100vh - 87px);
        display: grid;
        align-items: center;
        justify-content: center;
    }
</style>

<body>

    <div class="con">
        <div class="col-lg-6" style="width: 80vw">

            @if (isset($message))
                <h2 style="color: #0d6efd; text-align: center; margin-top: 50px;">
                    {{ $message }}
                @else
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form action="{{ route('vendor.create.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Store Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Store Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" style="height: 100px" name="description">{{ old('description') }}</textarea>
                                    </div>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Store Logo</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="formFile" name="logo">
                                    </div>
                                    @error('logo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit Form</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
            @endif

        </div>
    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src={{ asset('adminstyle/assets/vendor/apexcharts/apexcharts.min.js') }}></script>
    <script src={{ asset('adminstyle/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('adminstyle/assets/vendor/chart.js/chart.umd.js') }}></script>
    <script src={{ asset('adminstyle/assets/vendor/echarts/echarts.min.js') }}></script>
    <script src={{ asset('adminstyle/assets/vendor/quill/quill.min.js') }}></script>
    <script src={{ asset('adminstyle/assets/vendor/simple-datatables/simple-datatables.js') }}></script>
    <script src={{ asset('adminstyle/assets/vendor/tinymce/tinymce.min.js') }}></script>
    <script src={{ asset('adminstyle/assets/vendor/php-email-form/validate.js') }}></script>

    <!-- Template Main JS File -->
    <script src={{ asset('adminstyle/assets/js/main.js') }}></script>

</body>

</html>
