<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    <title>Arthurkai - KOI</title>

    <link rel="icon" type="image/png" href="{{ asset("images/logo/koilogo.png") }}">

    <!-- CSS FILES -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="{{ asset("website/css/bootstrap.min.css") }}" rel="stylesheet">

    <link href="{{ asset("website/css/bootstrap-icons.css") }}" rel="stylesheet">

    <link href="{{ asset("website/css/style.css") }}" rel="stylesheet">

    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    @yield("css")

</head>

<body>

    <main>

        <nav class="navbar navbar-expand-lg">

            <div class="container">

                <a class="navbar-brand" href="index.html">

                    <img src="{{ asset("website/images/logom.png") }}" class="logomobile">

                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="navbar-nav align-items-lg-center ms-auto me-auto">

                        <li class="nav-item">

                            <a class="nav-link @yield("our")" href="{{ route("our") }}">Our Collection</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link @yield("news")" href="{{ route("news") }}">News</a>

                        </li>

                        <a class="navbar-brand active" href="{{ route("homepage") }}">

                            <img src="{{ asset("website/images/logom.png") }}" class="logokoi">

                        </a>

                        <li class="nav-item">

                            <a class="nav-link @yield("aboutus")" href="{{ route("aboutus") }}">About Us</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link @yield("contact")" href="{{ route("contactus") }}">Contact</a>

                        </li>

                    </ul>

                </div>

            </div>

        </nav>

        @yield("content")

    </main>

    <footer class="site-footer">

        <div class="site-footer-bottom">

            <div class="container">

                <div class="row">

                    <div class="col-lg-2 col-6">

                        <img class="imgfooter" src="{{ asset("website/images/logofooter.png") }}">

                    </div>

                    <div class="sitelink col-lg-10 col-6">

                        <div class="row">

                            <ul class="site-footer-links">

                                <li class="site-footer-link-item">

                                    <a href="#" class="site-footer-link">About Arthur Kai</a>

                                </li>

                                <li class="site-footer-link-item">

                                    <a href="#" class="site-footer-link">How/Where To Buy</a>

                                </li>

                                <li class="site-footer-link-item">

                                    <a href="#" class="site-footer-link">License Certificate</a>

                                </li>

                                <li class="site-footer-link-item">

                                    <a href="#" class="site-footer-link">Our Champions</a>

                                </li>

                            </ul>

                        </div>

                    </div>

                    <div class="copyright">

                        <p class="copyright-text">Copyright © 2024 Arthur Kai, All right reserved </p>

                    </div>

                </div>

            </div>

        </div>

    </footer>

    <!-- JAVASCRIPT FILES -->

    <script src="{{ asset("website/js/jquery.min.js") }}"></script>

    <script src="{{ asset("website/js/bootstrap.min.js") }}"></script>

    <script src="{{ asset("website/js/jquery.sticky.js") }}"></script>

    <script src="{{ asset("website/js/custom.js") }}"></script>

    @yield("script")

</body>

</html>
