<!DOCTYPE html>
<html lang="en">

<head>
    <title>Petshop Kitten </title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords"
        content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('template/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/bootstrap/css/bootstrap.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/assets/icon/icofont/css/icofont.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body>
    <!-- Pre-loader start -->

    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('backend.layout.navbar')
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('backend.layout.sidebar')
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    @yield('content')
                                </div>

                                {{-- <div id="styleSelector">

                                    </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->


    <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>
    <!-- sweetalert End -->
    <!-- konfirmasi success-->
    @if (session('failed'))
    <script>
        Swal.fire({
            icon: 'failed',
            title: 'Failed!',
            text: "{{ session('failed') }}"
        });
    </script>
    @endif
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}"
        });
    </script>
    @endif

    <script type="text/javascript" src="{{ asset('template/assets/js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('template/assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('template/assets/js/popper.js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('template/assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('template/assets/js/jquery-slimscroll/jquery.slimscroll.js')}}">
    </script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('template/assets/js/modernizr/modernizr.js')}}"></script>
    <!-- am chart -->
    <script src="{{ asset('template/assets/pages/widget/amchart/amcharts.min.js')}}"></script>
    <script src="{{ asset('template/assets/pages/widget/amchart/serial.min.js')}}"></script>
    <!-- Todo js -->
    <script type="text/javascript " src="{{ asset('template/assets/pages/todo/todo.js')}} "></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('template/assets/pages/dashboard/custom-dashboard.js')}}"></script>
    <script type="text/javascript" src="{{ asset('template/assets/js/script.js')}}"></script>
    <script type="text/javascript " src="{{ asset('template/assets/js/SmoothScroll.js')}}"></script>
    <script src="{{ asset('template/assets/js/pcoded.min.js')}}"></script>
    <script src="{{ asset('template/assets/js/demo-12.js')}}"></script>
    <script src="{{ asset('template/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    <script>
        var $window = $(window);
        var nav = $('.fixed-button');
        $window.scroll(function () {
            if ($window.scrollTop() >= 200) {
                nav.addClass('active');
            } else {
                nav.removeClass('active');
            }
        });

    </script>

<script>
    ClassicEditor
    .create(document.querySelector('#ckeditor'))
    .catch(error => {
        console.error(error);
    });
</script>
<script>
    //preview foto
    function previewFoto() {
        const foto = document.querySelector('input[name="image"]');
        const fotoPreview = document.querySelector('.foto-preview');
        fotoPreview.style.display = 'block';
        const fotoReader = new FileReader();
        fotoReader.readAsDataURL(foto.files[0]);
        fotoReader.onload = function(fotoEvent) {
            fotoPreview.src = fotoEvent.target.result;
            fotoPreview.style.width = '100%';
        }
    }
    function previewFoto2() {
        const foto = document.querySelector('input[name="image2"]');
        const fotoPreview = document.querySelector('.foto-preview2');
        fotoPreview.style.display = 'block';
        const fotoReader = new FileReader();
        fotoReader.readAsDataURL(foto.files[0]);
        fotoReader.onload = function(fotoEvent) {
            fotoPreview.src = fotoEvent.target.result;
            fotoPreview.style.width = '100%';
        }
    }
</script>

</body>

</html>
