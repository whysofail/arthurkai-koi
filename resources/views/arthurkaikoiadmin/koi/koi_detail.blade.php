@extends('layouts.apparthuradm')
@section('title', 'Detail')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link href="https://fonts.cdnfonts.com/css/open-sauce-one" rel="stylesheet">
    <style>
        #zoomModal .modal-dialog {
            max-width: 80%;
            /* You can adjust this value if the modal is too small or large */
        }

        #zoomModal .modal-body {
            text-align: center;
        }

        #zoomedImage {
            width: 100%;
            /* Make the image scale to fit the modal */
            height: auto;
            /* Maintain aspect ratio */
            max-height: 80vh;
            /* Limit the height to 80% of the viewport height to avoid overflow */
        }

        .note-editor.note-airframe .note-editing-area .note-editable,
        .note-editor.note-frame .note-editing-area .note-editable {
            padding-bottom: 60px;
        }

        .modal {
            z-index: 1050 !important;
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

        ul.tl li .item-title {
            padding: 0 0 0 1.5em;
        }

        ul.tl li .item-detail {
            color: rgba(0, 0, 0, 0.5);
            font-size: 12px;
        }

        ul.tl li .timestamp {
            color: black;
            font-weight: bold;
            text-align: left;
            font-size: 1.5em;
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

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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
            height: auto;
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

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background: white;">
        <!-- /.content-header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Koi Detail</h1>
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

                    <div class="row">
                        <div class="col-sm-6">
                            <a href={{ $entryUrl ?? route('cmskoi') }} class="btn btn-sm"
                                style="margin-bottom: 5px; border-radius: 20px 1px 10px; border: black solid 1px; ">
                                <i class="fas fa-arrow-circle-left" style="position: relative; right: 3%; top: 1px;"></i>
                                Back
                            </a>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-4 col-md-4 col-sm-4">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                class="swiper mySwiper1">
                                <div class="swiper-wrapper">
                                    @if (!empty($koi->photo))
                                        @foreach (explode('|', $koi->photo) as $image)
                                            <div class="swiper-slide">
                                                @if (file_exists(public_path('img/koi/photo/' . $image)))
                                                    <img class="img-thumbnail" src="{{ asset('img/koi/photo/' . $image) }}"
                                                        alt="Koi Photo">
                                                @else
                                                    <img class="img-thumbnail" src="{{ asset('img/assets/broken.png') }}"
                                                        alt="Image Not Found">
                                                @endif
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>

                            </div>
                        </div>

                        <div class="col-12 col-lg-8 col-md-8 col-sm-8">
                            <div class="px-3" style="background: ">
                                <h2 class="mb-0"
                                    style="font-size: 2.2857142857142858rem; font-weight: 800; font-family: 'Open Sauce One', sans-serif;">
                                    {{ $koi->nickname ?? '-' }}
                                </h2>
                                <br>
                                <h2 class="mb-0"
                                    style="font-size: 1.2857142857142858rem; font-weight: 800; font-family: 'Open Sauce One', sans-serif;">
                                    Koi Code :
                                    {{ $koi->code ?? '-' }}
                                    <br />
                                    <div>
                                        <a href="{{ route('cmskoidetail', ['id', $koi->id]) }}" class="btn btn-xs"
                                            style="background: darkred; color:white; border: 1px solid #62200a"
                                            data-toggle="modal" data-target="#modalShowVideo{{ $koi->id }}"><i
                                                class="fas fa-video"></i></a>
                                        <div class="modal fade bannerformmodal{{ $koi->id }}"
                                            id="modalShowVideo{{ $koi->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="display: block; text-align: center;">
                                                        <h5 class="modal-title">
                                                            {{ $koi->code }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="swiper mySwiper" style="text-align: center">
                                                            <div class="swiper-wrapper">
                                                                @if (!empty($koi->video))
                                                                    @php
                                                                        $videos = explode('|', $koi->video);
                                                                    @endphp
                                                                    @foreach ($videos as $video)
                                                                        <div class="swiper-slide">
                                                                            <video controls="controls" style="width: 100%"
                                                                                name="{{ $video }}">
                                                                                <source
                                                                                    src="{{ asset('img/koi/video/' . $video) }}"
                                                                                    type="video/mp4">
                                                                            </video><br>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <p>-</p>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                                        class="fas fa-long-arrow-alt-left"></i></button>
                                                {{-- <a href="{{ route('cmskoiDelete', $koi->id) }}"
                                                                    type="button" class="btn btn-danger">Delete</a> --}}
                                            </div>
                                        </div>
                                        <div>
                                            <div style="padding: 1em 0 0 0;">
                                                <div class="btn-group">
                                                    <button class="btn-light" disabled style="font-size: 14px;">-</button>
                                                    @if ($koi->status == 'Available')
                                                        <button type="button"
                                                            class="btn btn-sm btn-success">Available</button>
                                                    @elseif($koi->status == 'Sold')
                                                        <button type="button" class="btn btn-sm btn-danger">Sold</button>
                                                    @elseif($koi->status == 'Death')
                                                        <button type="button" class="btn btn-sm btn-default"
                                                            style="background: purple; color: white">Death</button>
                                                    @elseif($koi->status == 'Auction')
                                                        <button type="button" class="btn btn-sm btn-default"
                                                            style="background: rgb(87, 58, 218); color: white;">Auction</button>
                                                    @endif

                                                    <button type="button"
                                                        class="btn btn-default btn-xs dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <form action="{{ route('cmsstatusupdate') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $koi->id }}">
                                                            <input type="hidden" name="status" value="Available">
                                                            <button class="dropdown-item">Available</button>
                                                        </form>
                                                        <form action="{{ route('cmsstatusupdate') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $koi->id }}">

                                                            <input type="hidden" name="status" value="Sold">

                                                            <button class="dropdown-item">Sold</button>
                                                        </form>
                                                        <form action="{{ route('cmsstatusupdate') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $koi->id }}">
                                                            <input type="hidden" name="status" value="Death">
                                                            <button class="dropdown-item">Death</button>
                                                        </form>
                                                        <form action="{{ route('cmsstatusupdate') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $koi->id }}">
                                                            <input type="hidden" name="status" value="Auction">
                                                            <button class="dropdown-item">Auction</button>
                                                        </form>

                                                    </div>

                                                    <span style="padding: 0 0 0 1em;">
                                                        <a href="{{ route('cmskoiEdit', $koi->id) }}"
                                                            class="btn btn-warning btn-xs" style=""><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="#bannerformmodal{{ $koi->id }}"
                                                            class="btn btn-danger btn-xs" data-toggle="modal"
                                                            data-target="#modalDelete{{ $koi->id }}"
                                                            style=""><i class="far fa-trash-alt"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                aria-selected="false">Certification
                                                and
                                                Trophy</a>
                                        </div>
                                    </nav>

                                    <div class="tab-content p-3" id="nav-tabContent">
                                        <div class="tab-pane fade active show" id="progress-koi" role="tabpanel"
                                            aria-labelledby="progress-koi-tab">
                                            <div class="history-tl-container">
                                                <div class="history-modal">
                                                    <button class="btn btn-success" type="button" data-toggle="modal"
                                                        data-target="#historyModal">Add or Edit History</button>

                                                    <div class="modal fade" id="historyModal" tabindex="-1"
                                                        role="dialog" aria-labelledby="historyModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="historyModalLabel">
                                                                        {{ $koi->code }} History</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form id="historyForm" method="POST"
                                                                        name="historyForm" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="_token"
                                                                            id="_token" value="{{ csrf_token() }}">
                                                                        <input type="hidden" name="koi_id"
                                                                            id="koi_id" value="{{ $koi->id }}">

                                                                        <!-- Date Input -->
                                                                        <div class="form-group row">
                                                                            <label for="date"
                                                                                class="col-sm-2 col-form-label">Date</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="date" class="form-control"
                                                                                    name="date" id="date"
                                                                                    required>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Size Input -->
                                                                        <div class="form-group">
                                                                            <label for="size">Size</label>
                                                                            <input type="text" class="form-control"
                                                                                name="size" id="size"
                                                                                type="number"
                                                                                placeholder="Enter Koi Size" required>
                                                                        </div>

                                                                        <!-- New Photos Input -->
                                                                        <div class="form-group">
                                                                            <label for="photos">New Photos</label>
                                                                            <input type="file" class="form-control"
                                                                                name="photos[]" id="photos" multiple
                                                                                accept="image/*">

                                                                        </div>
                                                                        <!-- New Photos Preview -->
                                                                        <div id="new-photos-preview" class="mb-3">
                                                                            <!-- Preview of newly selected photos will be added here -->
                                                                        </div>

                                                                        <!-- Existing Photos Preview -->
                                                                        <div id="existing-photos-preview" class="mb-3">
                                                                            existing
                                                                            <!-- Existing photos will be added here dynamically -->
                                                                        </div>

                                                                        <!-- Hidden input for editing existing photos -->
                                                                        <input type="file" id="edit-photos"
                                                                            name="edit_photos[]" multiple accept="image/*"
                                                                            style="display: none;">

                                                                        <!-- Modal Footer -->
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button class="btn btn-danger"
                                                                                id="deleteHistoryBtn">Delete
                                                                                History</button>
                                                                            <button type="submit" id="saveHistoryBtn"
                                                                                class="btn btn-primary">Save
                                                                                Changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <ul class="tl" id="historyList">
                                                    @php
                                                        // Sort and group history by year
                                                        $sortedHistory = $koi->history->sortBy('date')->groupBy('date');
                                                    @endphp
                                                    @foreach ($sortedHistory as $date => $historyRecords)
                                                        @foreach ($historyRecords as $record)
                                                            <li class="tl-item">
                                                                <div class="timestamp"
                                                                    style="display: flex; gap: 0.25em;">
                                                                    {{ \Carbon\Carbon::parse($record->date)->format('F j, Y') }}
                                                                </div>

                                                                <!-- Check if photos exist and display them -->
                                                                @if (!empty($record->photo))
                                                                    @foreach (explode('|', $record->photo) as $image)
                                                                        <img style="width: 10%" class="img-thumbnail"
                                                                            src="{{ asset('img/koi/photo/' . $image) }}"
                                                                            alt="Photo" data-toggle="modal"
                                                                            data-target="#zoomModal"
                                                                            data-src="{{ asset('img/koi/photo/' . $image) }}">
                                                                    @endforeach
                                                                @else
                                                                    <span>No photos provided.</span>
                                                                @endif

                                                                <br>
                                                                <div style="font-weight: bold; font-size: 16px;">
                                                                    Size: {{ $record->size }} CM
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="zoomModal" tabindex="-1" role="dialog"
                                            aria-labelledby="zoomModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="zoomModalLabel">Zoomed Image</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img id="zoomedImage" src="" class="img-fluid"
                                                            style="object-fit: contain;" alt="Zoomed Image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="product-comments" role="tabpanel"
                                            aria-labelledby="product-comments-tab">
                                            <table border="0">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Variety</strong></td>
                                                        <td>:</td>
                                                        <td style="padding: 10px">
                                                            {{ $koi->variety_id ? $koi->variety->name : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Breeder</strong></td>
                                                        <td>:</td>
                                                        <td style="padding: 10px">
                                                            {{ $koi->breeder ? $koi->breeder->name : '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Bloodline</strong></td>
                                                        <td>:</td>
                                                        <td style="padding: 10px">
                                                            {{ $koi->bloodline ? $koi->bloodline->name : '-' }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Size</strong></td>
                                                        <td>:</td>
                                                        <td style="padding: 10px">
                                                            {{ $koi->size ? $koi->size . ' cm' : '-' }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Birthdate</strong></td>
                                                        <td>:</td>
                                                        <td style="padding: 10px">
                                                            {{ $koi->birthdate ? $koi->birthdate : '-' }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Age</strong></td>
                                                        <td>:</td>
                                                        <td style="padding: 10px">
                                                            @if ($koi->birthdate)
                                                                @php
                                                                    $umur = \Carbon\Carbon::parse(
                                                                        $koi->birthdate,
                                                                    )->diff(\Carbon\Carbon::now());
                                                                    $umurTahun = $umur->y;
                                                                    $umurBulan = $umur->m;
                                                                    echo $umurTahun . 'yr ' . $umurBulan . 'm';
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
                                                            {{ $koi->purchase_date ? $koi->purchase_date : '-' }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Price Buy (IDR)</strong></td>
                                                        <td>:</td>
                                                        <td style="padding: 10px">
                                                            {{ isset($koi->price_buy_idr) ? 'IDR ' . number_format($koi->price_buy_idr, 0, ',', '.') : '-' }}
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td><strong>Price Buy (JPY)</strong></td>
                                                        <td>:</td>
                                                        <td style="padding: 10px">

                                                            {{ isset($koi->price_buy_jpy) ? '¥ ' . number_format($koi->price_buy_jpy, 0, ',', '.') : '-' }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Sell Price (IDR)</strong></td>
                                                        <td>:</td>
                                                        <td style="padding: 10px">
                                                            {{ isset($koi->price_sell_idr) ? 'IDR ' . number_format($koi->price_sell_idr, 0, ',', '.') : '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Sell Price (JPY)</strong></td>
                                                        <td>:</td>
                                                        <td style="padding: 10px">
                                                            {{ isset($koi->price_sell_jpy) ? '¥ ' . number_format($koi->price_sell_jpy, 0, ',', '.') : '-' }}
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td><strong>Handling Agent</strong></td>
                                                        <td>:</td>
                                                        <td style="padding: 10px">
                                                            {{ $koi->handler ?? '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Seller Agent</strong></td>
                                                        <td>:</td>
                                                        <td style="padding: 10px">
                                                            {{ $koi->seller ?? '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Keeping Location</strong></td>
                                                        <td>:</td>
                                                        <td style="padding: 10px">
                                                            {{ $koi->location ?? '-' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Buyer Name</strong></td>
                                                        <td>:</td>
                                                        <td style="padding: 10px">
                                                            {{ $koi->buyer_name ?? '-' }}
                                                        </td>
                                                    </tr>

                                                </tbody>

                                            </table>

                                        </div>

                                        <div class="tab-pane fade" id="trophy" role="tabpanel"
                                            aria-labelledby="trophy-tab">

                                            <div class="row" style="text-align: center">

                                                <div class="col-sm-4">
                                                    @php
                                                        // Split the trophy string by '|' to get an array of trophy filenames
                                                        $trophies = explode('|', $koi->trophy);
                                                    @endphp
                                                    <h5 style="font-weight: bold">Trophy</h5>
                                                    @if ($koi->trophy)
                                                        @foreach ($trophies as $trophy)
                                                            <img style="width: 100%" class="img-thumbnail"
                                                                src="{{ asset('img/koi/trophy/' . $trophy) }}"><br><br>
                                                        @endforeach
                                                    @endif
                                                </div>

                                                <div class="col-sm-4">
                                                    @php
                                                        // Split the trophy string by '|' to get an array of trophy filenames
                                                        $trophies = explode('|', $koi->certificate);
                                                    @endphp
                                                    <h5 style="font-weight: bold">Certificate</h5>
                                                    @if ($koi->certificate)
                                                        @foreach ($trophies as $trophy)
                                                            <img style="width: 100%" class="img-thumbnail"
                                                                src="{{ asset('img/koi/certificate/' . $trophy) }}"><br><br>
                                                        @endforeach
                                                    @endif
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

            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="..." class="rounded me-2" alt="...">
                        <strong class="me-auto">Notification</strong>
                        <small>Just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        <!-- Toast message will be dynamically inserted here -->
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

@section('script')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
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
    <script>
        $(document).ready(function() {
            // When an image thumbnail is clicked, open the zoom modal
            $('img[data-toggle="modal"]').on('click', function() {
                var imageSrc = $(this).data('src'); // Get the full image source from data-src attribute
                var zoomedImage = $('#zoomedImage'); // Target the image element inside the modal

                // Set the src of the zoomed image
                zoomedImage.attr('src', imageSrc);

                // Optionally, you can add a class or an inline style to resize the modal or image
                zoomedImage.on('load', function() {
                    // Once the image is loaded, show the modal
                    $('#zoomModal').modal('show');
                });

                // In case the image fails to load, show an error or placeholder
                zoomedImage.on('error', function() {
                    zoomedImage.attr('src',
                        'default-placeholder.jpg'); // Show placeholder if image fails
                    $('#zoomModal').modal('show');
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            let deletedPhotos = []; // Array to track deleted photos
            let editedPhotos = []; // Array to track edited photos (old photo -> new photo)
            let newPhotos = []; // Array to track new photos (added via file input)

            // Prevent form submission on Enter key press
            $('#historyForm').on('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault(); // Prevent default form submission
                }
            });

            // Set current date when modal open
            $('#historyModal').on('show.bs.modal', function() {
                let currentDate = new Date().toISOString().split('T')[
                    0]; // Get current date in YYYY-MM-DD format
                $('#date').val(currentDate); // Set the current date as default value
                const koi_id = $('#koi_id').val(); // Get koi_id from hidden input
                fetchHistoryData(koi_id, currentDate); // Fetch history data for the current date
            });

            // Handle the "Save changes" button click event
            $('#historyForm').on('submit', function(e) {
                e.preventDefault();

                let date = $('#date').val(); // Get the value of the date input
                let size = $('#size').val(); // Get the size input (optional validation)

                // Check if the date is empty
                if (!date) {
                    alert('Date cannot be empty!');
                    return; // Stop the submission if date is empty
                }

                let formData = new FormData($('#historyForm')[0]); // Create FormData object from the form

                // Add the new, deleted, and edited photos arrays to formData
                formData.append('photos[]',
                    newPhotos); // Using 'new_photos[]' to handle multiple files

                formData.append('deleted_photos', JSON.stringify(deletedPhotos));
                formData.append('edited_photos', JSON.stringify(editedPhotos));
                editedPhotos.forEach((edit, index) => {
                    if (edit.newPhoto instanceof File) {
                        formData.append('edited_photos[' + index + ']', edit
                            .newPhoto); // Directly append the file object
                    }
                });

                $.ajax({
                    url: "{{ route('history.store') }}", // Your route for saving data
                    method: 'POST',
                    data: formData,
                    contentType: false, // Don't set content type
                    processData: false, // Don't process data, let jQuery handle file uploads
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Add CSRF token header
                    },
                    success: function(response) {
                        $('#historyModal').modal('hide'); // Close modal on success
                        setTimeout(function() {
                            location.reload(); // Reload after a short delay
                        }, 1000); // 1-second delay (adjust as needed)
                    },
                    error: function(xhr, status, error) {
                        console.error('Save Error:', xhr.responseText, status, error);
                        location.reload(); // Reload after a short delay
                    }
                });
            });

            // Handle the "Delete History" button click event
            $('#deleteHistoryBtn').on('click', function(e) {
                e.preventDefault(); // Prevent default form submission

                const koi_id = $('#koi_id').val(); // Get koi ID
                const date = $('#date').val(); // Get selected date

                if (!koi_id || !date) {
                    alert('Koi ID and date are required for deletion.');
                    return;
                }

                if (confirm('Are you sure you want to delete this history entry?')) {
                    const csrfToken = $('#_token').val(); // Get CSRF token

                    $.ajax({
                        url: `/api/koi/history/${koi_id}/${date}`, // Backend endpoint for deletion
                        method: 'DELETE', // HTTP DELETE method
                        headers: {
                            'X-CSRF-TOKEN': csrfToken // Add CSRF token
                        },
                        success: function(response) {
                            if (response.success) {
                                alert(response.message); // Show success message
                                location
                                    .reload(); // Reload the page to refresh the data
                            } else {
                                alert('Error: ' + response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Delete Error:', xhr.responseText, status,
                                error);
                            alert('An error occurred: ' + (xhr.responseJSON
                                ?.error || error));
                        }
                    });
                }
            });

            // Handle file input change (photo selection)
            $('#photos').on('change', function(e) {
                let files = e.target.files;

                // Clear existing previews
                $('#new-photos-preview').html('');

                // Track new photos (reset array if necessary)
                newPhotos = []; // Reset array if using a tracking array

                // Show previews for selected images
                for (let i = 0; i < files.length; i++) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        // Append image preview with delete option for new photos
                        $('#new-photos-preview').append(`
                            <div class="photo-preview" style="display: inline-block; margin-right: 10px; position: relative;">
                                <img src="${event.target.result}" class="img-thumbnail" style="width: 100px;">
                                <button type="button" class="btn btn-danger btn-sm delete-photo" data-index="${i}">Delete</button>
                            </div>
                        `);
                        // Track new photos in the array
                        newPhotos.push(files[i]);
                    };
                    reader.readAsDataURL(files[i]);
                }
            });


            // Handle photo deletion (new photo delete)
            $('#new-photos-preview').on('click', '.delete-photo', function() {
                let index = $(this).data('index'); // Get index of the photo to delete

                // Remove the corresponding file from the file input
                let files = $('#photos')[0].files;
                let fileList = Array.from(files);
                fileList.splice(index, 1); // Remove file from the list
                $('#photos')[0].files = createFileList(
                    fileList); // Update file input with new file list

                // Remove the preview and delete button
                $(this).closest('.photo-preview').remove();

                // Remove from new photos array
                newPhotos.splice(index, 1);
            });

            // Function to simulate FileList (for browser compatibility)
            function createFileList(files) {
                let dataTransfer = new DataTransfer();
                files.forEach(file => dataTransfer.items.add(file));
                return dataTransfer.files;
            }

            // Fetch and populate history data
            function fetchHistoryData(koi_id, selectedDate) {
                $.ajax({
                    url: "{{ url('/api/koi/history') }}/" + koi_id,
                    method: 'GET',
                    success: function(response) {
                        let foundData = false;
                        if (response.history) {
                            $.each(response.history, function(date, items) {
                                let formattedDate = formatDate(new Date(date));

                                if (formattedDate === selectedDate) {
                                    foundData = true;
                                    items.forEach(function(item) {
                                        $('#size').val(item.size);

                                        // If photos exist, split and display them as existing photos
                                        if (item.photo) {
                                            let photoArray = item.photo
                                                .split('|');
                                            $('#existing-photos-preview')
                                                .empty(); // Clear existing photos before adding new ones
                                            photoArray.forEach(function(
                                                photo) {
                                                $('#existing-photos-preview')
                                                    .append(`
                                                <div class="photo-preview" style="display: inline-block; margin-right: 10px;">
                                                    <img src="{{ asset('img/koi/photo') }}/${photo}" class="img-thumbnail" style="width: 100px;">
                                                    <button type="button" class="btn btn-danger btn-sm delete-existing-photo" data-photo="${photo}">Delete</button>
                                                    <button type="button" class="btn btn-warning btn-sm edit-existing-photo" data-photo="${photo}">Edit</button>
                                                </div>
                                            `);
                                            });
                                        }
                                    });
                                }
                            });

                            // If no data was found for the selected date, clear the inputs
                            if (!foundData) {
                                $('#size').val('');
                                $('#existing-photos-preview')
                                    .empty(); // Clear photo previews
                            }
                        } else {
                            // If no history found, clear the inputs
                            $('#size').val('');
                            $('#existing-photos-preview').empty(); // Clear photo previews
                        }
                    },
                    error: function() {
                        alert('Error fetching history data.'); // Handle error
                    }
                });
            }

            // Handle date-based history data fetching when date is selected
            $('#date').on('change', function() {
                const date = $(this).val(); // Get selected date
                const koi_id = $('#koi_id').val(); // Get koi_id from hidden input

                // Clear the existing photo previews before fetching new data
                $('#existing-photos-preview').empty();

                if (date && koi_id) {
                    fetchHistoryData(koi_id,
                        date); // Fetch and update the history data for the selected date
                } else {
                    alert('Please select a valid date and koi ID.');
                }
            });

            // Handle photo deletion for existing photos
            $('#existing-photos-preview').on('click', '.delete-existing-photo', function() {
                const photo = $(this).data('photo'); // Get the photo to delete

                if (confirm('Are you sure you want to delete this photo?')) {
                    // Track the deleted photo
                    deletedPhotos.push(photo);
                    $(this).closest('.photo-preview').remove();
                }
            });

            let clickedEditButton = null;

            // Handle the click on the "Edit" button
            $('#existing-photos-preview').on('click', '.edit-existing-photo', function() {
                console.log('Edit button clicked');
                const oldPhoto = $(this).data('photo'); // Get the photo to edit (replace)
                console.log('Old photo:', oldPhoto);

                // Save the reference to the clicked button
                clickedEditButton = $(this);

                // Trigger the hidden file input for editing
                $('#edit-photos').trigger('click'); // Open file input
            });

            // Handle the file input change for editing
            $('#edit-photos').on('change', function(e) {
                let files = e.target.files;
                if (files.length > 0 && clickedEditButton) {
                    let newPhoto = files[0]; // Get the newly selected file
                    const oldPhoto = clickedEditButton.data('photo'); // Get the photo being replaced

                    // Check if the oldPhoto already exists in editedPhotos
                    const existingIndex = editedPhotos.findIndex(
                        (item) => item.oldPhoto === oldPhoto
                    );

                    if (existingIndex > -1) {
                        // Update the existing entry
                        editedPhotos[existingIndex].newPhoto = newPhoto;
                    } else {
                        // Add a new entry to the array
                        editedPhotos.push({
                            oldPhoto: oldPhoto,
                            newPhoto: newPhoto,
                        });
                    }

                    // Replace the old photo preview with the new one
                    clickedEditButton
                        .closest('.photo-preview')
                        .find('img')
                        .attr('src', URL.createObjectURL(newPhoto));

                    console.log('Preview updated with:', newPhoto.name);

                    // Reset file input value to allow selecting the same file again
                    $(this).val('');
                }
            });

        });

        // Function to format dates in YYYY-MM-DD format
        function formatDate(date) {
            let year = date.getFullYear();
            let month = String(date.getMonth() + 1).padStart(2, '0');
            let day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }
    </script>

@endsection
