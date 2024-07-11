@extends("layouts.apparthuradm")

@section("title", "Detail")

@section("css")

    <!-- Select2 -->

    <link rel="stylesheet" href="{{ asset("plugins/select2/css/select2.min.css") }}">

    <link rel="stylesheet" href="{{ asset("plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") }}">

    <link href="https://fonts.cdnfonts.com/css/open-sauce-one" rel="stylesheet">

    <style>
        .note-editor.note-airframe .note-editing-area .note-editable,
        .note-editor.note-frame .note-editing-area .note-editable {
            padding-bottom: 60px;
        }

        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 38px !important;
            user-select: none;
            -webkit-user-select: none;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 5px;
            right: 10px;
            width: 20px;
        }

        .content {
            padding: 3em 10em 1em;
            ;
        }

        @media (max-width: 384px) {
            .content.tab {
                padding: 0.5em;
            }
        }

        @media (max-width: 384px) {
            .content {
                padding: 0.8em 0.6em 1em 1.5em;
            }
        }

        @media (max-width: 414px) {
            .content {
                padding: 0.8em 1em 1em;
            }
        }

        @media (max-width: 1366px) {
            .content {
                padding: 1.5em 2em 1em;
            }
        }
    </style>

    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
        }

        .mySwiper2 {
            height: 80%;
            width: 100%;
        }

        .mySwiper {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .mySwiper .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.4;
        }

        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper1 {
            width: 100%;
            height: 100%;
        }

        .swiper-slide1 {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide1 img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper1 {
            margin-left: auto;
            margin-right: auto;
        }
    </style>

@endsection

@section("content")

    <!-- Main Sidebar Container -->

    <!-- Main Sidebar Container -->

    <aside class="main-sidebar sidebar-dark-primary elevation-4"
        style="background: #2c7abe; overflow-y: scroll; overflow-x: hidden;">

        <!-- Brand Logo -->

        <a href="{{ route("dashboard") }}" class="brand-link"
            style="text-align: center; padding-top: 22px; padding-bottom: 22px;">

            <img width="55" src="{{ asset("images/logo/koilogo.png") }}">

        </a>

        <!-- Sidebar -->

        <div class="sidebar" style="background: #2c7abe">

            <!-- Sidebar Menu -->

            <nav class="mt-2">

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-header whitefontlist">List Setting Koi</li>

                    <li class="nav-item" style="border-bottom: 3px solid #0186fc; display:flex;">

                        <a href="{{ route("cmskoi") }}" class="nav-link" style="height: 50px;">

                            <i class="whitefont nav-icon far fa-image" style="font-size: 18px !important;"></i>

                            <p class="whitefont" style="font-size: 18px !important;">

                                Koi

                            </p>

                        </a>

                        <a href="{{ route("cmskoigrid") }}" class="nav-link" style="text-align: right; height: 50px;">

                            <i class="fa-solid fa-table-cells" style="font-size: 18px !important; color: white"></i>

                            <p class="whitefont" style="font-size: 18px !important;">

                                Koi<span> Grid</span>

                            </p>

                        </a>

                    </li>

                </ul>

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false" style="margin-top: 20px;">

                    <li class="nav-header whitefontlist"><i class="fas fa-cog"></i> <span style="margin-left: 10px">Setting

                            Koi</span></li>

                    <li class="nav-item" style="border-top: 0.6px solid white;">

                        <a href="{{ route("cmsvariety") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                Variety

                            </p>

                        </a>

                    </li>

                    <li class="nav-item" style="border-top: 0.6px solid white;">

                        <a href="{{ route("cmsbloodline") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                Bloodline

                            </p>

                        </a>

                    </li>

                    <li class="nav-item" style="border-top: 0.6px solid white;">

                        <a href="{{ route("cmsbreeder") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                Breeder

                            </p>

                        </a>

                    </li>

                    <li class="nav-item" style="border-top: 0.6px solid white; border-bottom: 0.6px solid white;">

                        <a href="{{ route("cmsagent") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                Agent

                            </p>

                        </a>

                    </li>

                </ul>

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false" style="margin-top: 20px;">

                    <li class="nav-header whitefontlist"><i class="fas fa-cog"></i> <span style="margin-left: 10px">Live

                            Website Koi</span></li>

                    <li class="nav-item" style="border-top: 0.6px solid white;">

                        <a href="{{ route("cmsourcollection") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                Our Collection

                            </p>

                        </a>

                    </li>

                    <li class="nav-item" style="border-top: 0.6px solid white;">

                        <a href="{{ route("cmsnews") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                News

                            </p>

                        </a>

                    </li>

                    <li class="nav-item" style="border-top: 0.6px solid white;">

                        <a href="{{ route("cmsaboutus") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                About Us

                            </p>

                        </a>

                    </li>

                    <li class="nav-item" style="border-top: 0.6px solid white; border-bottom: 0.6px solid white;">

                        <a href="{{ route("cmscontactus") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                Contact Us

                            </p>

                        </a>

                    </li>

                </ul>

            </nav>

            <!-- /.sidebar-menu -->

        </div>

        <!-- /.sidebar -->

    </aside>

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper" style="background: white;">

        <!-- /.content-header -->

        <div class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">

                        <h1 class="m-0"></h1>

                    </div><!-- /.col -->

                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"></li>

                            <li class="breadcrumb-item active"> </li>

                        </ol>

                    </div><!-- /.col -->

                </div><!-- /.row -->

            </div><!-- /.container-fluid -->

        </div>

        <!-- /.content-header -->

        <!-- Main content -->

        <section class="content pt-1">

            <div class="">

                <div class="card-body">

                    {{-- <div class="row">
                <div class="col-12 col-lg-1 col-md-1 col-sm-1 mb-3">

                </div>
                <div class="col-12 col-lg-11 col-md-11 col-sm-11 mb-3">
                    <h1>Ochiba Shigure</h1>
                </div>
             </div> --}}

                    <div class="row">

                        <div class="col-sm-6">

                            <a href="{{ route("cmskoi") }}" class="btn btn-sm"
                                style="margin-bottom: 5px; border-radius: 20px 1px 10px; border: black solid 1px; ">

                                <i class="fas fa-arrow-circle-left" style="position: relative; right: 3%; top: 1px;"></i>

                                back

                            </a>

                        </div>

                        <div class="col-sm-6" style="text-align: right">

                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                data-toggle="dropdown" style="background: black; color: white;">

                                @foreach ($koi as $k)
                                    {{ $k->year }}
                                @endforeach <span class="sr-only">Toggle Dropdown</span>

                            </button>

                            <div class="dropdown-menu" role="menu">

                                <a class="dropdown-item" href="{{ route("cmskoiyear", "2018") }}">2018</a>

                                <a class="dropdown-item" href="{{ route("cmskoiyear", "2019") }}">2019</a>

                                <a class="dropdown-item" href="{{ route("cmskoiyear", "2024") }}">2024</a>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        {{-- <div class="col-12 col-lg-1 col-md-1 col-sm-1">

                </div> --}}

                        <div class="col-12 col-lg-4 col-md-4 col-sm-4" style="max-width: 450px;">

                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                class="swiper mySwiper2">

                                <div class="swiper-wrapper">

                                    @foreach ($koi as $k)
                                        @foreach (explode("|", $k->photo_highlight) as $image)
                                            <div class="swiper-slide">

                                                <img src="{{ asset("img/koi/photo_highlight/" . $image) }}" />

                                            </div>
                                        @endforeach
                                    @endforeach

                                </div>

                                {{-- <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div> --}}

                            </div>

                            <div thumbsSlider="" class="swiper mySwiper">

                                <div class="swiper-wrapper">

                                    @foreach ($koi as $k)
                                        @foreach (explode("|", $k->photo_highlight) as $image)
                                            <div class="swiper-slide">

                                                <img src="{{ asset("img/koi/photo_highlight/" . $image) }}" />

                                            </div>
                                        @endforeach
                                    @endforeach

                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-lg-8 col-md-8 col-sm-8">

                            <div class="px-3" style="background: ">

                                <h2 class="mb-0"
                                    style="font-size: 2.2857142857142858rem; font-weight: 800; font-family: 'Open Sauce One', sans-serif;">

                                    @foreach ($koi as $k)
                                        {{ $k->nickname }}
                                    @endforeach

                                </h2>

                                <br>

                                <h2 class="mb-0"
                                    style="font-size: 1.2857142857142858rem; font-weight: 800; font-family: 'Open Sauce One', sans-serif;">

                                    Variety : @foreach ($koi as $k)
                                        {{ $k->variety }}
                                    @endforeach

                                </h2>

                                <br /><br />

                                <div class="row mt-4">

                                    <nav class="w-100">

                                        <div class="nav nav-tabs" id="product-tab" role="tablist">

                                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                                href="#product-desc" role="tab" aria-controls="product-desc"
                                                aria-selected="true">Spesifikasi</a>

                                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                                href="#product-comments" role="tab" aria-controls="product-comments"
                                                aria-selected="false">Detail Information</a>

                                            <a class="nav-item nav-link" id="trophy-tab" data-toggle="tab"
                                                href="#trophy" role="tab" aria-controls="trophy"
                                                aria-selected="false">Certification and Trophy</a>

                                        </div>

                                    </nav>

                                    <div class="tab-content p-3" id="nav-tabContent">

                                        <div class="tab-pane fade active show" id="product-desc" role="tabpanel"
                                            aria-labelledby="product-desc-tab">

                                            @foreach ($koi as $k)
                                                <b>Date of Ownership : {{ $k->date_ownp }}</b><br>

                                                <b>Size : {{ $k->size }}</b><br>

                                                <b>Price Buy (IDR) : {{ $k->pricebuy_idr }}</b><br>

                                                <b>Price Buy (JPY) : {{ $k->pricebuy_jpy }}</b><br>

                                                <b>Sell Price (IDR) : {{ $k->pricesell_idr }}</b><br>

                                                <b>Sell Price (JPY) : {{ $k->pricesell_jpy }}</b><br>
                                            @endforeach

                                            <br /><br /><video playsinline autoplay muted loop width="400">

                                                <source src="{{ asset("img/koi/video/" . $k->link_video) }}"
                                                    type="video/mp4" />

                                            </video>

                                        </div>

                                        <div class="tab-pane fade" id="product-comments" role="tabpanel"
                                            aria-labelledby="product-comments-tab">

                                            <P>

                                                @foreach ($koi as $k)
                                                    <b>Age : {{ $k->age }}</b><br>

                                                    <b>Bloodline : {{ $k->bloodline }}</b><br>

                                                    <b>Breeder : {{ $k->breeder }}</b><br>

                                                    <b>Date Of Ownership : {{ $k->date_ownp }}</b><br>

                                                    <b>Birthday Year & Month : {{ $k->birth }}</b><br>
                                                @endforeach

                                            </P>

                                        </div>

                                        <div class="tab-pane fade" id="trophy" role="tabpanel"
                                            aria-labelledby="trophy-tab">

                                            <div class="row" style="text-align: center">

                                                <div class="col-sm-4">

                                                    <img style="width: 100%" width="150" class="img-thumbnail"
                                                        src="{{ asset("img/koi/certificate/" . $k->link_certificate) }}"><br><br>

                                                    <p>{{ $k->name_trophy }}</p>

                                                </div>

                                                <div class="col-sm-4">

                                                    <img style="width: 100%" class="img-thumbnail"
                                                        src="{{ asset("img/koi/trophy/" . $k->link_trophy) }}"><br><br>

                                                    <p>{{ $k->name_certificate }}</p>

                                                </div>

                                                <div class="col-sm-4">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>

    <!-- Control Sidebar -->

    <aside class="control-sidebar control-sidebar-dark">

        <!-- Control sidebar content goes here -->

    </aside>

    <!-- /.control-sidebar -->

@endsection

@section("script")

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });

        var swiper1 = new Swiper(".mySwiper1", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

@endsection
