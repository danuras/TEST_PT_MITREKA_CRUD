<!DOCTYPE html>
<html>

<head>
    <title>Perpustakaan X</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Bootstrap 4 Template For Software Startups">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <!-- <link rel="shortcut icon" href="favicon.ico"> -->

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- FontAwesome JS-->
    <script defer src="{{asset('fontawesome/js/all.min.js')}}"></script>

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.2/styles/atom-one-dark.min.css">
    <link rel="stylesheet" href="{{asset('plugins/simplelightbox/simple-lightbox.min.css')}}">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{asset('css/theme.css')}}">
    @include('components.style-controller')
    <style>
        /* Style for the container of each label and input pair */
        .form-group {
            align-items: center;
            margin-bottom: 15px;
        }

        /* Style for the labels */
        label {
            width: 100px;
            /* Adjust width to align labels */
            font-size: 16px;
            align-items: left;
        }

        /* Style for the text field */
        .custom-textfield {
            width: 300px;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #8d9de8;
            /* Border color */
            border-radius: 5px;
            /* Optional: rounded corners */
        }

        /* Optional: Add focus effect */
        .custom-textfield:focus {
            outline: none;
            border-color: #6c7ae0;
            /* Darker shade on focus */
            box-shadow: 0 0 5px rgba(141, 157, 232, 0.5);
            /* Soft shadow on focus */
        }
    </style>

    <link rel="shortcut icon" href="{{asset('images/logo.png')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}">
</head>


<body class="docs-page">
    <header class="header fixed-top">
        <div class="branding docs-branding">
            <div class="container-fluid position-relative py-2">
                <div class="docs-logo-wrapper">
                    <button id="docs-sidebar-toggler" class="docs-sidebar-toggler docs-sidebar-visible me-2 d-xl-none"
                        type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <div class="site-logo"><a class="navbar-brand" href="/"><span class="logo-text"><span
                                    class="text-alt">Perpustakaan&nbsp;</span> X</span></a>
                    </div>
                </div><!--//docs-logo-wrapper-->
                <div class="docs-top-utilities d-flex justify-content-end align-items-center">
                    <!-- <div class="top-search-box d-none d-lg-flex">
                        <form class="search-form">
                            <input type="text" placeholder="Search the docs..." name="search"
                                class="form-control search-input">
                            <button type="submit" class="btn search-btn" value="Search"><i
                                    class="fas fa-search"></i></button>
                        </form>
                    </div> -->
                    <ul class="social-list list-inline mx-md-3 mx-lg-5 mb-0 d-none d-lg-flex">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-youtube fa-fw"></i></a></li>
                    </ul><!--//social-list-->

                    @if(Auth::check())
                        <a href="/keluar" class="btn btn-primary d-none d-lg-flex">Keluar</a>
                    @else
                        <a href="/masuk" class="btn btn-primary d-none d-lg-flex">Masuk</a>
                    @endif

                </div><!--//docs-top-utilities-->
            </div><!--//container-->
        </div><!--//branding-->
    </header><!--//header-->

    @include('components.slide-bar-docomentation')

    <div class="docs-wrapper">
        <div class="docs-content">
            <div class="container">
                <article class="docs-article" id="section-1">

                    @include($viewFile)

                </article>

                <footer class="footer">
                    <div class="container text-center py-5">
                        <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                        <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart"
                                style="color: #fb866a;"></i> by <a class="theme-link"
                                href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for
                            developers</small>
                        <ul class="social-list list-unstyled pt-4 mb-0">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook fa-fw"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram fa-fw"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube fa-fw"></i></a></li>
                        </ul><!--//social-list-->
                    </div>
                </footer>
            </div>
        </div>
    </div><!--//docs-wrapper-->


    <!-- Javascript -->
    <script src="{{asset('plugins/popper.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>


    <!-- Page Specific JS -->
    <script src="{{asset('plugins/smoothscroll.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
    <script src="{{asset('js/highlight-custom.js')}}"></script>
    <script src="{{asset('plugins/simplelightbox/simple-lightbox.min.js')}}"></script>
    <script src="{{asset('plugins/gumshoe/gumshoe.polyfills.min.js')}}"></script>
    <script src="{{asset('js/docs.js')}}"></script>
</body>

</html>