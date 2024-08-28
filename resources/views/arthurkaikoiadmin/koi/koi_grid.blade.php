@extends("layouts.apparthuradm")

@section("title", "List Koi")

@section("css")

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .content_box {
            border: 1px black solid;
            padding: 15px;
            padding-bottom: 5em;
            text-align: center;
            min-height: 36em;
            max-height: 44em;
        }

        a:hover {
            color: black !important;
            background: #ffffff00 !important;
        }

        .swiper {
            width: 300px;
            height: 100%;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
        }

        .swiper-button-prev:after,
        .swiper-rtl .swiper-button-next:after {
            content: 'prev';
            font-weight: bold;
            position: relative;
            left: 85%;
        }

        .swiper-button-next:after,
        .swiper-rtl .swiper-button-prev:after {
            content: 'next';
            font-weight: bold;
            position: relative;
            right: 85%;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #000000 !important;
            border-color: black !important;
        }

        .page-link {
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #000000;
            background-color: #fff;
            border: 1px solid #000000 !important;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            cursor: auto;
            background-color: #fff;
            border-color: #000000 !important;
        }

        .grid-table {
            width: 100%;
            text-align: left;
            font-size: 14px;
            border-collapse: collapse;
            /* Ensures borders are collapsed */
        }

        .grid-table td {
            padding: 5px 5px;
            /* Adds padding inside cells */
            vertical-align: top;
            /* Aligns text to the top of each cell */
            border-bottom: 1px solid #ddd;
            /* Adds a border below each row */
            min-height: 100px;
            /* Sets a minimum height for rows */
            overflow: hidden;
            /* Hides any overflowing content */
            word-wrap: break-word;
            /* Ensures long words wrap onto the next line */
            box-sizing: border-box;
            /* Ensures padding and border are included in the height */
        }

        .grid-table td:nth-child(2) {
            width: 1%;
            /* Keeps the colon aligned and prevents wrapping */
            white-space: nowrap;
            /* Prevents wrapping of the colon */
        }

        .grid-table td:last-child {
            color: #333;
            /* Adjusts text color */
        }

        .photo-item {
            height: 320px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-content: center;
            flex-wrap: wrap;
        }

        .photo-item img {
            max-height: 300px;
        }

        @media only screen and (max-width: 900px) {
            .grid-table {
                min-height: 16em;
            }
        }

        @media only screen and (max-width: 600px) {
            .grid-table {
                min-height: 2em;
            }
        }
    </style>

@endsection

@section("content")
    <!-- Main Sidebar Container -->
    <div class="content-wrapper" style="background: white;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1 class="m-0">Chart</h1> --}}
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"></a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->
        {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Chart</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section> --}}

        <!-- Main content -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-1 col-md-1">
                        <a href="" style="color:black;">
                            <div class="info-box mb-3">
                                <div class="info-box-content">
                                    <span class="info-box-text">Koi</span>
                                    <span class="info-box-number">
                                        {{ $koitotal }}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-12 col-sm-1 col-md-1">
                        <a href="{{ route("dashboard") }}" style="color:black;">
                            <div class="mb-3 mt-4">
                                <div class="info-box-content" style="text-align: center">
                                    <i class="fa-solid fa-table" style="font-size: 40px;"></i>
                                    {{-- <span class="info-box-number"
                                    {{ $koitotal }}
                                </span> --}}
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12">
                        <div id="chartUser"></div>
                    </div>
                </div>
                </a>
                <!-- /.row -->
            </div>
        </section>

        <section class="content">
            <div class="women_main">
                <!-- start content -->
                <div class="w_content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-sm-4">
                                        <a href="{{ route("cmskoiAdd") }}">
                                            <button type="button" class="btn btn-success"
                                                style=" background: green; color: white; "><b>+ Add KOI</b></button>
                                        </a>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="btn-group">
                                            <a href="#" type="button" class="btn btn-default btn-flat disabled"><i
                                                    class="fas fa-filter"></i></a>
                                            <a href="{{ route("cmskoigfilteraz") }}" type="button"
                                                class="btn btn-default btn-flat"><i class="fas fa-sort-alpha-down"></i></a>
                                            <a href="{{ route("cmskoigfilterza") }}" type="button"
                                                class="btn btn-default btn-flat"><i
                                                    class="fas fa-sort-alpha-up-alt"></i></a>
                                            <a href="{{ route("cmskoigfilter19") }}" type="button"
                                                class="btn btn-default btn-flat"><i
                                                    class="fas fa-sort-numeric-down"></i></a>
                                            <a href="{{ route("cmskoigfilter91") }}" type="button"
                                                class="btn btn-default btn-flat"><i
                                                    class="fas fa-sort-numeric-up-alt"></i></a>
                                            <a href="{{ route("cmskoigfilterpricebuyhigh") }}" type="button"
                                                class="btn btn-default btn-flat"><i class="fas fa-money-bill"></i></a>
                                            <a href="{{ route("cmskoigfilterpricebuylow") }}" type="button"
                                                class="btn btn-default btn-flat"><i class="fas fa-money-bill-alt"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="card-tools">
                                            <form action="{{ route("cmskoigridsearch") }}" method="POST">
                                                @csrf
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" name="search"
                                                        placeholder="Search Koi">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body pb-0">
                                    <div class="row">
                                        @foreach ($koi as $k)
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4"
                                                style="padding-left: 10px; padding-right: 10px; padding-top: 10px;">
                                                <div class="content_box"><a href="{{ route("cmskoidetail", $k->id) }}">
                                                        @if (!empty($k->photo))
                                                            @php
                                                                $photos = array_filter(explode("|", $k->photo));
                                                                $firstPhoto = !empty($photos) ? $photos[0] : null;
                                                            @endphp
                                                            <div id="existing-photos">
                                                                @if ($firstPhoto)
                                                                    @php
                                                                        $photoPath = public_path(
                                                                            "img/koi/photo/" . $firstPhoto,
                                                                        );
                                                                    @endphp
                                                                    @if (file_exists($photoPath))
                                                                        <div class="photo-item">
                                                                            <img class="img-fluid card-img-top"
                                                                                src="{{ asset("img/koi/photo/" . $firstPhoto) }}"
                                                                                alt="Photo"
                                                                                style="object-fit: contain;">
                                                                        </div>
                                                                        <br>
                                                                    @else
                                                                        <div class="photo-item">
                                                                            <img src="{{ asset("img/assets/broken.png") }}"
                                                                                class="img-fluid card-img-top"
                                                                                style="object-fit: cover; width: 100%; height: auto;"
                                                                                alt="Placeholder">
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        @else
                                                            <div class="photo-item">
                                                                <img src="{{ asset("img/assets/broken.png") }}"
                                                                    class="img-fluid card-img-top"
                                                                    style="object-fit: cover; width: 100%; height: auto;"
                                                                    alt="Placeholder">
                                                            </div>
                                                        @endif
                                                    </a>
                                                    <h6>
                                                        <a style="text-decoration: underline; color:black; font-size: 1.25em;"
                                                            href="{{ route("cmskoidetail", $k->id) }}">
                                                            {{ $k->code ?? "-" }}</a>
                                                    </h6>
                                                    <table class="grid-table"
                                                        style="width: 100%;  text-align: left; font-size: 14px;">
                                                        <tr>
                                                            <td style=""><strong>Variety</strong></td>
                                                            <td style="">:</td>
                                                            <td style="">{{ $k->variety->name ?? "-" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=""><strong>Breeder Name</strong>
                                                            </td>
                                                            <td style="">:</td>
                                                            <td style="">{{ $k->breeder->name ?? "-" }}</td>

                                                        </tr>

                                                        <tr>
                                                            <td style=""><strong>Gender</strong></td>
                                                            <td style="">:</td>
                                                            <td style="">{{ $k->gender ?? "-" }}</td>
                                                        </tr>

                                                        <tr>

                                                            <td style=""><strong>Age</strong></td>

                                                            <td style="">:</td>

                                                            <td style="">

                                                                @if ($k->birth)
                                                                    @php
                                                                        $umur = \Carbon\Carbon::parse($k->birth)->diff(
                                                                            \Carbon\Carbon::now(),
                                                                        );
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

                                                            <td style=""><strong>Status</strong></td>

                                                            <td style="">:</td>

                                                            <td style="">

                                                                <div class="btn-group">

                                                                    <button class="btn-light" disabled
                                                                        style="font-size: 14px;">-</button>

                                                                    @if ($k->status == "Available")
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-success"
                                                                            style="font-size: 12px;">Available</button>
                                                                    @elseif($k->status == "Sold")
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-danger"
                                                                            style="font-size: 12px;">Sold</button>
                                                                    @elseif($k->status == "Death")
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-default"
                                                                            style="background: purple; color: white; font-size: 12px;">Death</button>
                                                                    @else
                                                                    @endif

                                                                    <button type="button"
                                                                        class="btn btn-default btn-xs dropdown-toggle dropdown-icon"
                                                                        data-toggle="dropdown">

                                                                        <span class="sr-only">Toggle Dropdown</span>

                                                                    </button>

                                                                    <div class="dropdown-menu" role="menu">

                                                                        <form action="{{ route("cmsstatusupdate") }}"
                                                                            method="POST">

                                                                            @csrf

                                                                            <input type="hidden" name="id"
                                                                                value="{{ $k->id }}">

                                                                            <input type="hidden" name="n_status"
                                                                                value="Available">

                                                                            <button
                                                                                class="dropdown-item btn-sm">Available</button>

                                                                        </form>

                                                                        <form action="{{ route("cmsstatusupdate") }}"
                                                                            method="POST">

                                                                            @csrf

                                                                            <input type="hidden" name="id"
                                                                                value="{{ $k->id }}">
                                                                            <input type="hidden" name="n_status"
                                                                                value="Sold">
                                                                            <button
                                                                                class="dropdown-item btn-sm">Sold</button>
                                                                        </form>

                                                                        <form action="{{ route("cmsstatusupdate") }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $k->id }}">
                                                                            <input type="hidden" name="n_status"
                                                                                value="Death">

                                                                            <button
                                                                                class="dropdown-item btn-sm">Death</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                    <div class="grid_1 simpleCart_shelfItem"
                                                        style="margin-top: 32px; padding-bottom: 16px;">
                                                        <div class="item_add" style="display: inline-flex;">
                                                            <span style="display: flex !important; gap: 2px;">
                                                                <a href="{{ route("cmskoiEdit", $k->id) }}"
                                                                    class="btn btn-warning btn-xs" style="width: 30px"><i
                                                                        class="fas fa-edit"></i></a>

                                                                <a href="#bannerformmodal{{ $k->id }}"
                                                                    class="btn btn-danger btn-xs" data-toggle="modal"
                                                                    data-target="#modal-danger{{ $k->id }}"
                                                                    style="color: black; width: 30px"><i
                                                                        class="far fa-trash-alt"></i></a>

                                                                <a href="{{ route("cmskoidetail", $k->id) }}"
                                                                    class="btn btn-info btn-xs"
                                                                    style="background: black;">Details</a>

                                                            </span>
                                                        </div>

                                                        <div class="item_add" style="display: inline-flex;">

                                                            <span style="display: flex !important;">

                                                                <a href="{{ route("cmskoidetailgrid", $k->id) }}"
                                                                    class="btn btn-xs"
                                                                    style="background: darkred; color:white; border: 1px solid #62200a; width 30px;"
                                                                    data-toggle="modal"
                                                                    data-target="#modalShowVideo{{ $k->id }}"><i
                                                                        class="fas fa-video"></i></a>

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

                                                                                <div class="swiper mySwiper">

                                                                                    <div class="swiper-wrapper">

                                                                                        @foreach ($k->history as $h)
                                                                                            @if ($loop->first)
                                                                                                @foreach (explode("|", $h->link_video) as $image)
                                                                                                    @if ($image != null)
                                                                                                        <div
                                                                                                            class="swiper-slide">

                                                                                                            <video
                                                                                                                controls="controls"
                                                                                                                style="width: 80%"
                                                                                                                name="{{ $image }}">

                                                                                                                <source
                                                                                                                    src="{{ asset("img/koi/video/" . $image) }}">

                                                                                                            </video><br>

                                                                                                        </div>
                                                                                                    @else
                                                                                                        -
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            @else
                                                                                            @endif
                                                                                        @endforeach

                                                                                    </div>
                                                                                    <div class="swiper-pagination">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="swiper-button-next"></div>
                                                                                <div class="swiper-button-prev"></div>
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

                                                                <a href="{{ route("cmskoidetail", $k->id) }}"
                                                                    class="btn btn-xs"
                                                                    style="background: darkblue; color:white; border: 1px solid #62200a; margin-left: 5px; width 30px;"
                                                                    data-toggle="modal"
                                                                    data-target="#modalShowPhoto{{ $k->id }}"><i
                                                                        class="far fa-image"></i></a>

                                                                <!-- modalShowPhoto -->

                                                                <div class="modal fade bannerformmodal{{ $k->id }}"
                                                                    id="modalShowPhoto{{ $k->id }}">

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

                                                                                <div class="swiper mySwiper">

                                                                                    <div class="swiper-wrapper">

                                                                                        @foreach ($k->history as $h)
                                                                                            @if ($loop->first)
                                                                                                @foreach (explode("|", $h->link_photo) as $image)
                                                                                                    @if ($image != null)
                                                                                                        <div
                                                                                                            class="swiper-slide">

                                                                                                            <img width="125"
                                                                                                                class="img-thumbnail"
                                                                                                                src="{{ asset("img/koi/photo/" . $image) }}">

                                                                                                        </div>
                                                                                                    @else
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            @else
                                                                                            @endif
                                                                                        @endforeach

                                                                                    </div>

                                                                                    <div class="swiper-pagination">

                                                                                    </div>

                                                                                </div>

                                                                                <div class="swiper-button-next"></div>

                                                                                <div class="swiper-button-prev"></div>

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

                                                                <!-- /.modalShowPhoto -->

                                                                <a href="{{ route("cmskoidetail", $k->id) }}"
                                                                    class="btn btn-primary btn-xs" data-toggle="modal"
                                                                    data-target="#modalShowDocument{{ $k->id }}"
                                                                    style="margin-left: 5px; width 30px;"><i
                                                                        class="fas fa-photo-video"></i></a>

                                                                <!-- modalShowDocument -->

                                                                <div class="modal fade bannerformmodal{{ $k->id }}"
                                                                    id="modalShowDocument{{ $k->id }}">

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

                                                                                <div class="swiper mySwiper">

                                                                                    <div class="swiper-wrapper">

                                                                                        @foreach ($k->history as $h)
                                                                                            @if ($h->link_trophy != null)
                                                                                                <div class="swiper-slide">

                                                                                                    <img width="125"
                                                                                                        class="img-thumbnail"
                                                                                                        src="{{ asset("img/koi/trophy/" . $h->link_trophy) }}">

                                                                                                </div>
                                                                                            @else
                                                                                                -
                                                                                            @endif
                                                                                            <br /><br /><br /><br />
                                                                                            @if ($h->link_certificate != null)
                                                                                                <div class="swiper-slide">
                                                                                                    <img width="125"
                                                                                                        class="img-thumbnail"
                                                                                                        src="{{ asset("img/koi/certificate/" . $h->link_certificate) }}">

                                                                                                </div>
                                                                                            @else
                                                                                                -
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </div>
                                                                                    <div class="swiper-pagination">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="swiper-button-next"></div>
                                                                                <div class="swiper-button-prev"></div>
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
                                                            </span>
                                                        </div>
                                                        <div class="modal fade bannerformmodal{{ $k->id }}"
                                                            id="modal-danger{{ $k->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Delete Koi</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Apakah kamu yakin ingin hapus?&hellip;</p>
                                                                    </div>

                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Close</button>
                                                                        <a href="{{ route("cmskoigridDelete", $k->id) }}"
                                                                            type="button"
                                                                            class="btn btn-danger">Delete</a>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                        {{-- <div class="item_add"><span class="item_price"><a href="#">See Price</a></span></div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end content -->

        <div class="card-footer">

            <nav aria-label="Contacts Page Navigation">
                @php
                    // Extract current query parameters
                    $queryParams = request()->query();
                @endphp
                <ul class="pagination justify-content-center m-0">
                    @if ($koi->lastPage() > 1)
                        <!-- Halaman pertama -->
                        @if ($koi->currentPage() > 3)
                            <li class="page-item"><a class="page-link"
                                    href="{{ $koi->appends($queryParams)->url(1) }}">1</a></li>
                            @if ($koi->currentPage() > 4)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif
                        @endif
                        <!-- Halaman-halaman di sekitar halaman saat ini -->
                        @for ($i = max($koi->currentPage() - 2, 1); $i <= min($koi->currentPage() + 2, $koi->lastPage()); $i++)
                            <li class="page-item {{ $koi->currentPage() == $i ? "active" : "" }}">
                                <a class="page-link"
                                    href="{{ $koi->appends($queryParams)->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <!-- Halaman terakhir -->
                        @if ($koi->currentPage() < $koi->lastPage() - 2)
                            @if ($koi->currentPage() < $koi->lastPage() - 3)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif
                            <li class="page-item"><a class="page-link"
                                    href="{{ $koi->appends($queryParams)->url($koi->lastPage()) }}">{{ $koi->lastPage() }}</a>
                            </li>
                        @endif
                    @endif
                </ul>
            </nav>
        </div>
    @endsection

    @section("script")

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <script>
            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 30,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    type: "fraction",
                    clickable: true,
                },
            });
        </script>

    @endsection
