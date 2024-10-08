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
        }

        .history-tl-container {
            font-family: "Roboto", sans-serif;
            margin: auto;
            display: block;
            position: relative;
        }

        .history-tl-container ul.tl {
            margin: 20px 0;
            padding: 0;
            display: inline-block;
        }

        .history-tl-container ul.tl li {
            list-style: none;
            margin: auto;
            margin-left: 200px;
            min-height: 50px;
            /*background: rgba(255,255,0,0.1);*/
            border-left: 1px dashed #86D6FF;
            padding: 0 0 50px 30px;
            position: relative;
        }

        .history-tl-container ul.tl li:last-child {
            border-left: 0;
        }

        .history-tl-container ul.tl li::before {
            position: absolute;
            left: -18px;
            top: -5px;
            content: " ";
            border: 8px solid rgba(255, 255, 255, 0.74);
            border-radius: 500%;
            background: #258CC7;
            height: 20px;
            width: 20px;
            transition: all 500ms ease-in-out;
        }

        .history-tl-container ul.tl li:hover::before {
            border-color: #258CC7;
            transition: all 1000ms ease-in-out;
        }

        ul.tl li .item-title {}

        ul.tl li .item-detail {
            color: rgba(0, 0, 0, 0.5);
            font-size: 12px;
        }

        ul.tl li .timestamp {
            color: #8D8D8D;
            position: absolute;
            width: 100px;
            left: -40%;
            text-align: right;
            font-size: 12px;
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
        .swiper5 {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .swiper-slide5 {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 300px;
        }

        .swiper-slide5 img {
            display: block;
            width: 100%;
        }

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

        .swiper-slide1 img {
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

                    <li class="nav-item" style="border-bottom: 3px solid #0186fc; display:flex;">

                        <a href="{{ route("cmskoi") }}" class="nav-link" style="height: 50px; background:black;">

                            <i class="whitefont nav-icon far fa-image" style="font-size: 16px !important;"></i>

                            <p class="whitefont" style="font-size: 16px !important;">

                                Koi

                            </p>

                        </a>

                        <a href="{{ route("cmskoigrid") }}" class="nav-link" style="text-align: right; height: 50px;">

                            <i class="fa-solid fa-table-cells" style="font-size: 16px !important; color: white"></i>

                            <p class="whitefont" style="font-size: 16px !important;">

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

                            <a href="{{ route("cmskoigrid") }}" class="btn btn-sm"
                                style="margin-bottom: 5px; border-radius: 20px 1px 10px; border: black solid 1px; ">

                                <i class="fas fa-arrow-circle-left" style="position: relative; right: 3%; top: 1px;"></i>

                                back

                            </a>

                        </div>

                        {{-- <div class="col-sm-6" style="text-align: right">
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                            data-toggle="dropdown" style="background: black; color: white;">
                            @foreach ($koi as $k) {{ $k->year }} @endforeach <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{ route('cmskoiyear', '2018') }}">2018</a>
                            <a class="dropdown-item" href="{{ route('cmskoiyear', '2019') }}">2019</a>
                            <a class="dropdown-item" href="{{ route('cmskoiyear', '2024') }}">2024</a>
                        </div>
                    </div> --}}

                    </div>

                    <div class="row">

                        {{-- <div class="col-12 col-lg-1 col-md-1 col-sm-1">

                    </div> --}}

                        <div class="col-12 col-lg-4 col-md-4 col-sm-4">

                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                class="swiper mySwiper2">

                                <div class="swiper-wrapper">

                                    @foreach ($koi as $k)
                                        @foreach ($k->history as $h)
                                            @if ($loop->first)
                                                @foreach (explode("|", $h->link_photo) as $image)
                                                    <div class="swiper-slide">

                                                        <img class="img-thumbnail"
                                                            src="{{ asset("img/koi/photo/" . $image) }}">

                                                    </div>
                                                @endforeach
                                            @else
                                            @endif
                                        @endforeach
                                    @endforeach

                                </div>

                                {{-- <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div> --}}

                            </div>

                            <div thumbsSlider="" class="swiper mySwiper">

                                <div class="swiper-wrapper">

                                    @foreach ($koi as $k)
                                        @foreach ($k->history as $h)
                                            @if ($loop->first)
                                                @foreach (explode("|", $h->link_photo) as $image)
                                                    <div class="swiper-slide">

                                                        <img class="img-thumbnail"
                                                            src="{{ asset("img/koi/photo/" . $image) }}">

                                                    </div>
                                                @endforeach
                                            @else
                                            @endif
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

                                    Koi Code : @foreach ($koi as $k)
                                        {{ $k->koi_code }}
                                    @endforeach

                                    <br />

                                    <a href="{{ route("cmskoidetail", $k->id) }}" class="btn btn-xs mt-3"
                                        style="background: darkred; color:white; border: 1px solid #62200a; font-size: 12px"
                                        data-toggle="modal" data-target="#modalShowVideo{{ $k->id }}"><i
                                            class="fas fa-video"></i></a>

                                </h2>

                                <br /><br />

                                <div class="row mt-4">

                                    <nav class="w-100">

                                        <div class="nav nav-tabs" id="product-tab" role="tablist">

                                            <a class="nav-item nav-link active" id="progress-koi-tab" data-toggle="tab"
                                                href="#progress-koi" role="tab" aria-controls="progress-koi"
                                                aria-selected="false">Progress Koi</a>

                                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                                href="#product-comments" role="tab" aria-controls="product-comments"
                                                aria-selected="false">Detail Information</a>

                                            <a class="nav-item nav-link" id="trophy-tab" data-toggle="tab"
                                                href="#trophy" role="tab" aria-controls="trophy"
                                                aria-selected="false">Certification and

                                                Trophy</a>

                                        </div>

                                    </nav>

                                    <div class="tab-content p-3" id="nav-tabContent">

                                        <div class="tab-pane fade active show" id="progress-koi" role="tabpanel"
                                            aria-labelledby="progress-koi-tab">

                                            <div class="history-tl-container">

                                                <ul class="tl">

                                                    @foreach ($koi as $k)
                                                        @foreach ($k->history as $h)
                                                            <li class="tl-item" ng-repeat="item in retailer_history">

                                                                <div class="timestamp"
                                                                    style="font-weight: bold; font-size: 16px;">

                                                                    {{ $h->year }}<br>

                                                                </div>

                                                                <div class="item-title"
                                                                    style="font-weight: bold; font-size: 16px;">

                                                                    {{ $k->koi_code }}</div>

                                                                @foreach (explode("|", $h->link_photo) as $image)
                                                                    <img style="width: 10%" class="img-thumbnail"
                                                                        src="{{ asset("img/koi/photo/" . $image) }}">
                                                                @endforeach

                                                                <br>

                                                                <div style="font-weight: bold; font-size: 16px;">Size :

                                                                    {{ $h->size }} CM</div>

                                                                <!-- modalShowVideo -->

                                                                <div class="modal fade bannerformmodal{{ $k->id }}"
                                                                    id="modalShowVideo{{ $k->id }}">

                                                                    <div class="modal-dialog">

                                                                        <div class="modal-content">

                                                                            <div class="modal-header"
                                                                                style="display: block; text-align: center;">

                                                                                <h5 class="modal-title">

                                                                                    {{ $k->koi_code }}</h5>

                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">

                                                                                    <span aria-hidden="true">&times;</span>

                                                                                </button>

                                                                            </div>

                                                                            <div class="modal-body"
                                                                                style="text-align: center">

                                                                                <span>

                                                                                    @foreach ($k->history as $h)
                                                                                        @if ($loop->first)
                                                                                            @foreach (explode("|", $h->link_video) as $image)
                                                                                                <video
                                                                                                    src="{{ asset("img/koi/video/" . $image) }}"
                                                                                                    type="video/mp4"
                                                                                                    style="width: 80%"
                                                                                                    controls></video><br>

                                                                                                <span
                                                                                                    style="font-size: 0.8rem; color: #62200a">{{ $image }}</span>
                                                                                            @endforeach
                                                                                        @else
                                                                                            -
                                                                                        @endif
                                                                                    @endforeach

                                                                                    <br />

                                                                                </span>

                                                                            </div>

                                                                            <div
                                                                                class="modal-footer justify-content-between">

                                                                                <button type="button"
                                                                                    class="btn btn-default"
                                                                                    data-dismiss="modal"><i
                                                                                        class="fas fa-long-arrow-alt-left"></i></button>

                                                                                {{-- <a href="{{ route('cmskoiDelete', $k->id) }}"
                                                                        type="button" class="btn btn-danger">Delete</a> --}}

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <!-- /.modalShowVideo -->

                                                            </li>
                                                        @endforeach
                                                    @endforeach

                                                </ul>

                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="product-comments" role="tabpanel"
                                            aria-labelledby="product-comments-tab">

                                            <table border="0">

                                                <tbody>

                                                    @foreach ($koi as $k)
                                                        <tr>

                                                            <td><strong>Variety</strong></td>

                                                            <td>:</td>

                                                            <td style="padding: 10px">

                                                                {{ $k->variety ? $k->variety : "-" }}

                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td><strong>Bloodline</strong></td>

                                                            <td>:</td>

                                                            <td style="padding: 10px">

                                                                {{ $k->bloodline ? $k->bloodline : "-" }}</td>

                                                        </tr>

                                                        <tr>

                                                            <td><strong>Breeder</strong></td>

                                                            <td>:</td>

                                                            <td style="padding: 10px">

                                                                {{ $k->breeder ? $k->breeder : "-" }}</td>

                                                        </tr>

                                                        <tr>

                                                            <td><strong>Size</strong></td>

                                                            <td>:</td>

                                                            <td style="padding: 10px">{{ $k->size ? $k->size : "-" }}

                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td><strong>Birthday Year & Month</strong></td>

                                                            <td>:</td>

                                                            <td style="padding: 10px">{{ $k->birth ? $k->birth : "-" }}

                                                            </td>

                                                        </tr>

                                                        @foreach ($koi as $k)
                                                            <tr>

                                                                <td><strong>Age</strong></td>

                                                                <td>:</td>

                                                                <td style="padding: 10px">

                                                                    @if ($k->birth)
                                                                        @php
                                                                            $umur = \Carbon\Carbon::parse(
                                                                                $k->birth,
                                                                            )->diff(\Carbon\Carbon::now());
                                                                            $umurTahun = $umur->y;
                                                                            $umurBulan = $umur->m;
                                                                            echo $umurTahun . "yr " . $umurBulan . "m";
                                                                        @endphp
                                                                    @else
                                                                        -
                                                                    @endif

                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td><strong>Date Of Ownership</strong></td>

                                                                <td>:</td>

                                                                <td style="padding: 10px">

                                                                    {{ $k->date_purchese ? $k->date_purchese : "-" }}</td>

                                                            </tr>
                                                        @endforeach

                                                        <tr>

                                                            <td><strong>Price Buy (IDR)</strong></td>

                                                            <td>:</td>

                                                            <td style="padding: 10px">

                                                                {{ $k->pricebuy_idr ? $k->pricebuy_idr : "-" }}</td>

                                                        </tr>

                                                        <tr>

                                                            <td><strong>Price Buy (JPY)</strong></td>

                                                            <td>:</td>

                                                            <td style="padding: 10px">

                                                                {{ $k->pricebuy_jpy ? $k->pricebuy_jpy : "-" }}</td>

                                                        </tr>

                                                        <tr>

                                                            <td><strong>Sell Price (IDR)</strong></td>

                                                            <td>:</td>

                                                            <td style="padding: 10px">

                                                                @foreach ($k->history as $h)
                                                                    @if ($loop->first)
                                                                        {{ $h->pricesell_idr ? $h->pricesell_idr : "-" }}
                                                                    @else
                                                                    @endif
                                                                @endforeach

                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td><strong>Sell Price (JPY)</strong></td>

                                                            <td>:</td>

                                                            <td style="padding: 10px">

                                                                @foreach ($k->history as $h)
                                                                    @if ($loop->first)
                                                                        {{ $h->pricesell_jpy ? $h->pricesell_jpy : "-" }}
                                                                    @else
                                                                    @endif
                                                                @endforeach

                                                            </td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>

                                            </table>

                                        </div>

                                        <div class="tab-pane fade" id="trophy" role="tabpanel"
                                            aria-labelledby="trophy-tab">

                                            <div class="row" style="text-align: center">

                                                <div class="col-sm-4">

                                                    @if ($k->name_trophy == null)
                                                        -
                                                    @else
                                                        <img style="width: 100%" width="150" class="img-thumbnail"
                                                            src="{{ asset("img/koi/certificate/" . $k->link_certificate) }}"><br><br>

                                                        <p>{{ $k->name_trophy }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-sm-4">

                                                    @if ($k->name_certificate == null)
                                                        -
                                                    @else
                                                        <img style="width: 100%" class="img-thumbnail"
                                                            src="{{ asset("img/koi/trophy/" . $k->link_trophy) }}"><br><br>

                                                        <p>{{ $k->name_certificate }}</p>
                                                    @endif

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
