@extends('layouts.apparthuradm')

@section('title', 'Edit')

@section('css')
    <!-- Select2 -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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

        .custom-file-input:lang(en)~.custom-file-label::after {
            content: "FIle" !important;
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
                        <h1 class="m-0">Edit Koi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a style="color: black"></a></li>
                            <li class="breadcrumb-item active" style="color: #a38b0c"> </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Koi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->

        <section class="content">
            @foreach ($koi as $k)
                <form action="{{ route('cmskoiUpdate') }}" method="POST" enctype="multipart/form-data" id='koiForm'>
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $k->id }}">
                    <input type="hidden" name="entryUrl" value="{{ $entryUrl }}">
                    <div class="col-sm-12">
                        <a href="{{ $entryUrl ?? route('cmskoi') }}" class="btn btn-sm"
                            style="margin-bottom: 5px; border-radius: 20px 1px 10px; border: black solid 1px; ">
                            <i class="fas fa-arrow-circle-left" style="position: relative; right: 3%; top: 1px;"></i>
                            Back
                        </a>
                        <div class="card">
                            <div class="card-body">
                                <div class="content tab" id="contentDataKOI">
                                    <section id="section-1" class="content-current">
                                        <h2>Base Koi Information</h2>
                                        <hr>
                                        <!-- Display all old input values -->
                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="koi_code" class="col-sm-2 col-form-label">Koi Code</label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" name="koi_code" value="{{ $k->code }}">
                                                    <input type="text" class="form-control" name="koi_code"
                                                        value="{{ old('code') ? old('code') : $k->code }}" id="koi_code"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="nickname" class="col-sm-2 col-form-label">Nickname</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="nickname"
                                                        value="{{ old('nickname') ? old('nickname') : $k->nickname }}"
                                                        id="nickname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="variety" class="col-sm-2 col-form-label">Variety</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="variety"
                                                        style="width: 100%;">
                                                        <option value="{{ $k->variety->id ?? 1 }}"
                                                            {{ isset($k->variety) && $k->variety->id == ($k->variety->id ?? 1) ? 'selected' : '' }}>
                                                            {{ $k->variety->name ?? 'Unknown' }}</option>
                                                        @foreach ($variety as $v)
                                                            <option value="{{ $v->id }}"
                                                                {{ isset($k->variety) && $k->variety->id == $v->id ? 'selected' : '' }}>
                                                                {{ $v->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="breeder" class="col-sm-2 col-form-label">Breeder</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="breeder"
                                                        style="width: 100%;">
                                                        <option value="{{ $k->breeder_id }}"
                                                            {{ $k->breeder == null ? $k->breeder->name : '' }}>
                                                            {{ $k->breeder->name }}</option>
                                                        @foreach ($breeder as $b)
                                                            <option value="{{ $b->id }}">
                                                                {{ $b->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="bloodline" class="col-sm-2 col-form-label">Bloodline</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="bloodline"
                                                        style="width: 100%;">
                                                        @isset($k->bloodline)
                                                            <option value="{{ $k->bloodline->id }}">
                                                                {{ $k->bloodline->name }}</option>
                                                        @endisset
                                                        @foreach ($bloodline as $b)
                                                            <option value="{{ $b->id }}">
                                                                {{ $b->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" name="gender" value="{{ $k->gender }}">
                                                    <select class="form-control select2" name="gender"
                                                        style="width: 100%;">
                                                        <option value="{{ $k->gender }}"
                                                            {{ $k->gender == $k->gender ? 'selected' : '' }}>
                                                            {{ $k->gender }}</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Unknown">Unknown</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="birth" class="col-sm-2 col-form-label">Birthdate</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="birth"
                                                        value="{{ $k->birthdate ? \Carbon\Carbon::parse($k->birthdate)->format('Y-m') : '' }}"
                                                        id="birth">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="size" class="col-sm-2 col-form-label">Size</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="size"
                                                        value="{{ old('size') ? old('size') : $k->size }}"
                                                        id="size">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="purchase_date" class="col-sm-2 col-form-label">Purchase
                                                    Date
                                                </label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" name="purchase_date"
                                                        value="{{ $k->purchase_date ? \Carbon\Carbon::parse($k->purchase_date)->format('Y-m') : '' }}"
                                                        id="purchase_date">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="seller" class="col-sm-2 col-form-label">Seller
                                                    Agent</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="seller"
                                                        style="width: 100%;">
                                                        <option value="{{ $k->seller }}"
                                                            {{ $k->seller == $k->seller ? 'selected' : '' }}>
                                                            {{ $k->seller }}</option>
                                                        @foreach ($agent as $a)
                                                            <option value="{{ $a->owner }}">
                                                                {{ $a->owner }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="handler" class="col-sm-2 col-form-label">Handling
                                                    Agent</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="handler"
                                                        style="width: 100%;">
                                                        <option value="{{ $k->handler }}"
                                                            {{ $k->handler == $k->handler ? 'selected' : '' }}>
                                                            {{ $k->handler }}</option>
                                                        @foreach ($agent as $a)
                                                            <option value="{{ $a->owner }}">
                                                                {{ $a->owner }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row" style="margin-top: 10px">
                                                <label for="pricebuy_idr" class="col-sm-2 col-form-label">Price Buy
                                                    (IDR)</label>
                                                <div class="col-sm-4">
                                                    <input type="hidden" id="pricebuy_idr" class="form-control"
                                                        name="pricebuy_idr"
                                                        value="{{ old('pricebuy_idr') ? old('pricebuy_idr') : $k->price_buy_idr }}">
                                                    <input type="text" id="pricebuy_idr_display" class="form-control"
                                                        name="pricebuy_idr_display"
                                                        value="{{ old('pricebuy_idr_display') ? old('price_buy_idr_display') : $k->price_buy_idr }}">
                                                </div>

                                                <label for="pricebuy_jpy" class="col-sm-2 col-form-label">Price Buy
                                                    (JPY)</label>
                                                <div class="col-sm-4">
                                                    <input type="hidden" id="pricebuy_jpy" class="form-control"
                                                        name="pricebuy_jpy"
                                                        value="{{ old('pricebuy_jpy') ? old('price_buy_jpy') : $k->price_buy_jpy }}">
                                                    <input type="text" id="pricebuy_jpy_display" class="form-control"
                                                        name="pricebuy_jpy_display"
                                                        value="{{ old('pricebuy_jpy_display') ? old('pricebuy_jpy_display') : $k->price_buy_jpy }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="location" class="col-sm-2 col-form-label">Keeping
                                                    Location</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="location"
                                                        value="{{ old('location') ? old('location') : $k->location }}"
                                                        id="location">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row" style="margin-top: 10px">
                                                <label for="pricesell_idr" class="col-sm-2 col-form-label">Sell Price
                                                    (IDR)</label>
                                                <div class="col-sm-4">
                                                    <input type="hidden" id="pricesell_idr" class="form-control"
                                                        name="pricesell_idr"
                                                        value="{{ old('pricesell_idr') ? old('pricesell_idr') : $k->price_sell_idr }}">
                                                    <input type="text" id="pricesell_idr_display" class="form-control"
                                                        name="pricesell_idr_display"
                                                        value="{{ old('pricesell_idr') ? old('pricesell_idr') : $k->price_sell_idr }}">
                                                </div>

                                                <label for="pricesell_jpy" class="col-sm-2 col-form-label">Sell Price
                                                    (JPY)</label>
                                                <div class="col-sm-4">
                                                    <input type="hidden" id="pricesell_jpy" class="form-control"
                                                        name="pricesell_jpy"
                                                        value="{{ old('pricesell_jpy') ? old('pricesell_jpy') : $k->price_sell_jpy }}">
                                                    <input type="text" id="pricesell_jpy_display" class="form-control"
                                                        name="pricesell_jpy_display"
                                                        value="{{ old('pricesell_jpy') ? old('pricesell_jpy') : $k->price_sell_jpy }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <h2>Koi Media</h2>
                                            <hr>
                                            <div class="col-sm-12" style="margin-top: 10px">

                                                <div class="input-group-btn" style="float:right">
                                                    <button class="btn btn-success btn-clickLP" type="button">
                                                        <i class="fldemo glyphicon glyphicon-plus"></i> Add More Photos
                                                    </button>
                                                </div>
                                                <div class="form-group row" style="margin-top: 10px">
                                                    <label for="photos" class="col-sm-2 col-form-label">Photos</label>
                                                    <div class="col-sm-10">
                                                        @if (!empty($k->photo))
                                                            @php
                                                                $photos = explode('|', $k->photo);
                                                            @endphp
                                                            <div id="existing-photos">
                                                                @foreach ($photos as $photo)
                                                                    @if (!empty($photo))
                                                                        <div class="photo-item"
                                                                            style="margin-bottom: 10px;">
                                                                            <div
                                                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                                                <img width="125"
                                                                                    src="{{ asset('img/koi/photo/' . $photo) }}"
                                                                                    class="img-thumbnail">
                                                                                <div>
                                                                                    <input type="file"
                                                                                        class="form-control-file edit-photo"
                                                                                        name="edit_photo_{{ $loop->index }}"
                                                                                        accept="image/*"
                                                                                        style="display: none;">
                                                                                    <button type="button"
                                                                                        class="btn btn-primary btn-sm edit-photo-button"
                                                                                        data-target="input[name='edit_photo_{{ $loop->index }}']">Edit</button>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-sm remove-photo"
                                                                                        data-photo="{{ $photo }}">Remove</button>
                                                                                </div>
                                                                            </div>
                                                                            <span
                                                                                class="photo-filename">{{ $photo }}</span>
                                                                            <input type="hidden" name="existing_photos[]"
                                                                                value="{{ $photo }}">
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <p>No photos available</p>
                                                        @endif
                                                    </div>

                                                    <!-- Input for uploading new photos -->

                                                    @foreach ($k->history as $history)
                                                        @if ($loop->first)
                                                            @foreach (explode('|', $history->link_photo) as $image)
                                                                @if ($image == null)
                                                                    <input type="file" name="link_photo[]"
                                                                        class="myfrm form-control" accept="image/*"
                                                                        onchange="Imagelinkphoto(event)">

                                                                    <input type="hidden" name="link_photos">
                                                                @else
                                                                    <input type="file" name="link_photo[]"
                                                                        class="myfrm form-control" accept="image/*"
                                                                        onchange="Imagelinkphoto(event)">

                                                                    <input type="hidden" name="link_photos"
                                                                        value="{{ $history->link_photo }}">
                                                                @endif
                                                            @endforeach
                                                        @else
                                                        @endif
                                                    @endforeach

                                                    @if ($k->history == null)
                                                        <input type="file" name="photo_highlight[]"
                                                            class="myfrm form-control" onchange="photohighlight(event)">

                                                        <input type="hidden" name="photo_highlights" value="">
                                                    @else
                                                    @endif

                                                </div>
                                                <div class="input-group realprocodeLP control-group lst incrementLP">
                                                    <!-- Existing inputs will be appended here -->
                                                </div>


                                                <!-- Template for cloning -->
                                                <div class="cloneLP" style="display: none;">
                                                    <div class="realprocodeLP control-group lst input-group"
                                                        style="margin: 1em 0 1em;">
                                                        <input type="file" name="link_photo[]"
                                                            class="myfrm form-control" onchange="Imagelinkphoto(event)"
                                                            accept="image/*">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-danger" type="button">
                                                                <i class="fldemo glyphicon glyphicon-remove"></i> Remove
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                            <label>Video</label><br>
                                            <div class="form-group">
                                                <img width="125" id="link_video" class="img-thumbnailv">
                                                @if ($loop->first)
                                                    @if (isset($k->video) && !empty($k->video))
                                                        @foreach (explode('|', $k->video) as $video)
                                                            @if (!is_null($video) && $video != '')
                                                                <div class="my-2 video-item">
                                                                    <video src="{{ asset('img/koi/video/' . $video) }}"
                                                                        type="video/mp4" width="130px" id="link_video"
                                                                        controls></video>
                                                                    <div>
                                                                        <input type="file"
                                                                            class="form-control-file edit-video"
                                                                            name="edit_video_{{ $loop->index }}"
                                                                            accept="video/mp4,video/x-m4v,video/*"
                                                                            style="display: none;">
                                                                        <button type="button"
                                                                            class="btn btn-primary btn-sm edit-video-button"
                                                                            data-target="input[name='edit_video_{{ $loop->index }}']">
                                                                            Edit
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm remove-video"
                                                                            data-video="{{ $video }}">
                                                                            Remove
                                                                        </button>
                                                                        <span id="spanLinkVideo"
                                                                            style="font-size: 0.8rem; color: #62200a;">{{ $video }}</span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <p>No video provided</p>
                                                    @endif
                                                @else
                                                    <p>No video provided</p>
                                                @endif
                                                </span>
                                                <div class="input-group realprocodeLV control-group lst incrementLV"
                                                    style="justify-content: flex-end">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success btn-clickLV" type="button"><i
                                                                class="fldemo glyphicon glyphicon-plus"></i>Add More
                                                            Videos</button>
                                                    </div>
                                                </div>
                                                <div class="cloneLV hide" style="display: none;">
                                                    <div class="realprocodeLV control-group lst input-group"
                                                        style="margin-top:10px">
                                                        <input type="file" name="link_video[]"
                                                            class="myfrm form-control" onchange="link_video(event)"
                                                            accept="video/mp4,video/x-m4v,video/*">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-danger" type="button"><i
                                                                    class="fldemo glyphicon glyphicon-remove"></i>
                                                                Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                            <label>Trophy</label><br>
                                            <div class="form-group">
                                                {{-- Existing Trophies --}}
                                                @if (!empty($k->trophy))
                                                    @php $trophies = explode('|', $k->trophy); @endphp
                                                    @foreach ($trophies as $trophy)
                                                        @if (!empty($trophy))
                                                            <div class="my-2 trophy-item">
                                                                <img src="{{ asset('img/koi/trophy/' . $trophy) }}"
                                                                    width="125" class="img-thumbnail img-thumbnailt">
                                                                <div class="mt-1">
                                                                    <input type="file"
                                                                        class="form-control-file edit-trophy"
                                                                        name="edit_trophy_{{ $loop->index }}"
                                                                        accept="image/*" style="display: none;">
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-sm edit-trophy-button"
                                                                        data-target="input[name='edit_trophy_{{ $loop->index }}']">Edit</button>
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm remove-trophy"
                                                                        data-trophy="{{ $trophy }}">Remove</button>
                                                                    <span class="trophy-filename d-block mt-1 text-muted"
                                                                        style="font-size: 0.8rem;">{{ $trophy }}</span>
                                                                    <input type="hidden" name="existing_trophies[]"
                                                                        value="{{ $trophy }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p>No trophy document provided</p>
                                                @endif

                                                {{-- Button to Add New Trophy --}}
                                                <div
                                                    class="input-group realprocodeLT control-group lst incrementLT justify-content-end mt-2">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success btn-clickLT" type="button">
                                                            <i class="glyphicon glyphicon-plus"></i> Add Trophy
                                                        </button>
                                                    </div>
                                                </div>

                                                {{-- Hidden Clone Template for New Trophy Input --}}
                                                <div class="cloneLT d-none">
                                                    <div
                                                        class="realprocodeLT control-group lst input-group mt-2 align-items-center">
                                                        <input type="file" name="link_trophy[]" class="form-control"
                                                            accept="image/*" onchange="link_trophy(event)">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-danger" type="button">
                                                                <i class="glyphicon glyphicon-remove"></i> Remove
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                            <label>Certificate</label><br>
                                            <div class="form-group">
                                                @if (!empty($k->certificate))
                                                    @php $certificates = explode('|', $k->certificate); @endphp
                                                    @foreach ($certificates as $certificate)
                                                        @if (!empty($certificate))
                                                            <div class="my-2 certificate-item">
                                                                <img src="{{ asset('img/koi/certificate/' . $certificate) }}"
                                                                    width="125" class="img-thumbnail img-thumbnailc">
                                                                <div class="mt-1">
                                                                    <input type="file"
                                                                        class="form-control-file edit-certificate"
                                                                        name="edit_certificate_{{ $loop->index }}"
                                                                        accept="image/*" style="display: none;">
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-sm edit-certificate-button"
                                                                        data-target="input[name='edit_certificate_{{ $loop->index }}']">Edit</button>
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm remove-certificate"
                                                                        data-certificate="{{ $certificate }}">Remove</button>
                                                                    <span
                                                                        class="certificate-filename d-block mt-1 text-muted"
                                                                        style="font-size: 0.8rem;">{{ $certificate }}</span>
                                                                    <input type="hidden" name="existing_certificates[]"
                                                                        value="{{ $certificate }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p>No certificate images provided</p>
                                                @endif

                                                {{-- Button to Add New Certificate --}}
                                                <div
                                                    class="input-group realprocodeLC control-group lst incrementLC justify-content-end mt-2">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success btn-clickLC" type="button">
                                                            <i class="glyphicon glyphicon-plus"></i> Add Certificate
                                                        </button>
                                                    </div>
                                                </div>

                                                {{-- Hidden Clone Template for New Certificate Input --}}
                                                <div class="cloneLC d-none">
                                                    <div
                                                        class="realprocodeLC control-group lst input-group mt-2 align-items-center">
                                                        <input type="file" name="link_certificate[]"
                                                            class="form-control" accept="image/*"
                                                            onchange="previewImage(event, '.img-thumbnailc')">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-danger" type="button">
                                                                <i class="glyphicon glyphicon-remove"></i> Remove
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <h2>Additional Information</h2>
                                        <hr>
                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="status"
                                                        style="width: 100%;">
                                                        <option value="{{ $k->status }}" selected>
                                                            {{ ucfirst($k->status) }}</option>
                                                        @foreach (['available' => 'Available', 'sold' => 'Sold', 'death' => 'Death', 'auction' => 'Auction'] as $value => $label)
                                                            @if ($value !== $k->status)
                                                                {{-- Avoid duplicate current status --}}
                                                                <option value="{{ $value }}">{{ $label }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="date_sell" class="col-sm-2 col-form-label">Date of
                                                    Sell</label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" name="date_sell"
                                                        id="date_sell" value="{{ $k->sell_date }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="buyer_name" class="col-sm-2 col-form-label">Buyer
                                                    Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="buyer_name"
                                                        id="buyer_name" value="{{ $k->buyer_name ?? '' }}">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="death_date" class="col-sm-2 col-form-label">Date of
                                                    Death</label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" name="death_date"
                                                        id="death_date" value="{{ $k->death_date }}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="death_note" class="col-sm-2 col-form-label">Death Note</label>
                                                <div class="col-sm-10">
                                                    <textarea name="death_note" class="form-control" id="death_note" rows="3">
                                                    {{ $k->death_note ?? '' }}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-3" style="margin-top: 50px">
                                            <div class="float-right">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </section>
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

@endsection

@section('script')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        // Function to format Rupiah
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        // Function to format JPY
        function formatJPY(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                jpy = split[0].substr(0, sisa),
                yen = split[0].substr(sisa).match(/\d{3}/gi);

            if (yen) {
                separator = sisa ? '' : '';
                jpy += separator + yen.join('');
            }
            jpy = split[1] != undefined ? jpy + ',' + split[1] : jpy;
            return prefix == undefined ? jpy : (jpy ? '¥ ' + jpy : '');
        }

        // Function to format and set initial values
        function initializeFormatting() {
            let sellIdrDisplay = document.getElementById('pricesell_idr_display');
            let sellJpyDisplay = document.getElementById('pricesell_jpy_display');
            let buyIdrDisplay = document.getElementById('pricebuy_idr_display');
            let buyJpyDisplay = document.getElementById('pricebuy_jpy_display');

            sellIdrDisplay.value = formatRupiah(sellIdrDisplay.value, 'Rp. ');
            sellJpyDisplay.value = formatJPY(sellJpyDisplay.value, '¥ ');
            buyIdrDisplay.value = formatRupiah(buyIdrDisplay.value, 'Rp. ');
            buyJpyDisplay.value = formatJPY(buyJpyDisplay.value, '¥ ');
        }

        // Event listeners for sell IDR
        let sellIdr = document.getElementById('pricesell_idr');
        let sellIdrDisplay = document.getElementById('pricesell_idr_display');
        sellIdrDisplay.addEventListener('input', function(e) {
            let rawValue = this.value.replace(/\D/g, ''); // Remove non-numeric characters
            sellIdr.value = rawValue;
            sellIdrDisplay.value = formatRupiah(this.value, 'Rp. ');
        });

        // Event listeners for sell JPY
        let sellJpy = document.getElementById('pricesell_jpy');
        let sellJpyDisplay = document.getElementById('pricesell_jpy_display');
        sellJpyDisplay.addEventListener('input', function(e) {
            let rawValue = this.value.replace(/\D/g, ''); // Remove non-numeric characters
            sellJpy.value = rawValue;
            sellJpyDisplay.value = formatJPY(this.value, '¥ ');
        });

        // Event listeners for buy IDR
        let buyIdr = document.getElementById('pricebuy_idr');
        let buyIdrDisplay = document.getElementById('pricebuy_idr_display');
        buyIdrDisplay.addEventListener('input', function(e) {
            let rawValue = this.value.replace(/\D/g, ''); // Remove non-numeric characters
            buyIdr.value = rawValue;
            buyIdrDisplay.value = formatRupiah(this.value, 'Rp. ');
        });

        // Event listeners for buy JPY
        let buyJpy = document.getElementById('pricebuy_jpy');
        let buyJpyDisplay = document.getElementById('pricebuy_jpy_display');
        buyJpyDisplay.addEventListener('input', function(e) {
            let rawValue = this.value.replace(/\D/g, ''); // Remove non-numeric characters
            buyJpy.value = rawValue;
            buyJpyDisplay.value = formatJPY(this.value, '¥ ');
        });

        // Initialize formatting on page load
        document.addEventListener('DOMContentLoaded', initializeFormatting);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const koiForm = document.getElementById('koiForm');

            // === 🖼️ Unified Edit Preview Handler ===
            function bindEditHandlers({
                buttonClass,
                inputClass,
                itemClass,
                previewSelector,
                filenameSelector,
                isVideo = false
            }) {
                document.querySelectorAll(buttonClass).forEach(button => {
                    button.addEventListener('click', function() {
                        const targetSelector = this.getAttribute('data-target');
                        const fileInput = document.querySelector(targetSelector);
                        if (fileInput) fileInput.click();
                    });
                });

                document.querySelectorAll(inputClass).forEach(input => {
                    input.addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const container = input.closest(itemClass);
                                const preview = container.querySelector(previewSelector);
                                const filenameSpan = container.querySelector(filenameSelector);
                                if (isVideo) {
                                    preview.src = e.target.result;
                                    preview.load();
                                } else {
                                    preview.src = e.target.result;
                                }
                                if (filenameSpan) filenameSpan.textContent = file.name;
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                });
            }

            // === ❌ Remove Handlers ===
            function bindRemoveHandlers({
                buttonClass,
                itemClass,
                dataAttr,
                hiddenName
            }) {
                document.querySelectorAll(buttonClass).forEach(button => {
                    button.addEventListener('click', function() {
                        const item = this.closest(itemClass);
                        const value = this.getAttribute(dataAttr);
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = hiddenName + '[]';
                        input.value = value;
                        koiForm.appendChild(input);
                        item.remove();
                    });
                });
            }

            // === 📂 Clone + Remove Handlers ===
            function setupCloneHandlers() {
                const mappings = [{
                        button: '.btn-clickLP',
                        clone: '.cloneLP',
                        target: '.incrementLP'
                    },
                    {
                        button: '.btn-clickLV',
                        clone: '.cloneLV',
                        target: '.incrementLV'
                    },
                    {
                        button: '.btn-clickPH',
                        clone: '.clonePH',
                        target: '.incrementPH'
                    },
                    {
                        button: '.btn-clickLT',
                        clone: '.cloneLT',
                        target: '.incrementLT'
                    },
                    {
                        button: '.btn-clickLC',
                        clone: '.cloneLC',
                        target: '.incrementLC'
                    },
                ];

                mappings.forEach(({
                    button,
                    clone,
                    target
                }) => {
                    $(button).on('click', function() {
                        const newInput = $(clone).children().first().clone();
                        newInput.find('input[type="file"]').val('');
                        $(target).append(newInput);
                    });
                });

                // Remove buttons
                $("body").on("click", ".realprocodeLP .btn-danger", function() {
                    $(this).closest(".realprocodeLP").remove();
                });
                $("body").on("click", ".realprocodeLV .btn-danger", function() {
                    $(this).closest(".realprocodeLV").remove();
                });
                $("body").on("click", ".realprocodePH .btn-danger", function() {
                    $(this).closest(".realprocodePH").remove();
                });
                $("body").on("click", ".realprocodeLT .btn-danger", function() {
                    $(this).closest(".realprocodeLT").remove();
                });
                $("body").on("click", ".realprocodeLC .btn-danger", function() {
                    $(this).closest(".realprocodeLC").remove();
                });
            }

            // === 🖼️ Custom Preview Functions (for new uploads) ===
            function previewImage(event, targetClass) {
                const reader = new FileReader();
                reader.onload = () => {
                    const output = event.target.closest('.form-group, .input-group').querySelector(targetClass);
                    if (output) output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }

            window.photohighlight = (e) => previewImage(e, '.img-thumbnailh');
            window.Imagelinkphoto = (e) => previewImage(e, '.img-thumbnailp');
            window.link_video = (e) => previewImage(e, '.img-thumbnailv');
            window.link_trophy = (e) => previewImage(e, '.img-thumbnailt');

            // === 🔗 Bind All Edit Sections ===
            bindEditHandlers({
                buttonClass: '.edit-photo-button',
                inputClass: '.edit-photo',
                itemClass: '.photo-item',
                previewSelector: 'img',
                filenameSelector: '.photo-filename',
            });

            bindEditHandlers({
                buttonClass: '.edit-video-button',
                inputClass: '.edit-video',
                itemClass: '.video-item',
                previewSelector: 'video',
                filenameSelector: '#spanLinkVideo',
                isVideo: true,
            });

            bindEditHandlers({
                buttonClass: '.edit-trophy-button',
                inputClass: '.edit-trophy',
                itemClass: '.trophy-item',
                previewSelector: 'img',
                filenameSelector: '.trophy-filename',
            });

            bindEditHandlers({
                buttonClass: '.edit-certificate-button',
                inputClass: '.edit-certificate',
                itemClass: '.certificate-item',
                previewSelector: 'img',
                filenameSelector: '.certificate-filename',
            });

            // === 🔗 Bind All Remove Sections ===
            bindRemoveHandlers({
                buttonClass: '.remove-photo',
                itemClass: '.photo-item',
                dataAttr: 'data-photo',
                hiddenName: 'remove_photos',
            });

            bindRemoveHandlers({
                buttonClass: '.remove-video',
                itemClass: '.video-item',
                dataAttr: 'data-video',
                hiddenName: 'remove_videos',
            });

            bindRemoveHandlers({
                buttonClass: '.remove-trophy',
                itemClass: '.trophy-item',
                dataAttr: 'data-trophy',
                hiddenName: 'remove_trophies',
            });

            bindRemoveHandlers({
                buttonClass: '.remove-certificate',
                itemClass: '.certificate-item',
                dataAttr: 'data-certificate',
                hiddenName: 'remove_certificates',
            });

            // 🔁 Set up clone buttons
            setupCloneHandlers();
        });
    </script>


    <script>
        // --- 💰 Currency Formatting ---
        function formatRupiah(angka, prefix) {
            const number_string = angka.replace(/[^,\d]/g, '').toString();
            const split = number_string.split(',');
            const sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            const ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                const separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix ? prefix + rupiah : rupiah;
        }

        function formatJPY(angka, prefix) {
            const number_string = angka.replace(/[^,\d]/g, '').toString();
            const split = number_string.split(',');
            const sisa = split[0].length % 3;
            let jpy = split[0].substr(0, sisa);
            const yen = split[0].substr(sisa).match(/\d{3}/gi);

            if (yen) jpy += yen.join('');
            jpy = split[1] !== undefined ? jpy + ',' + split[1] : jpy;
            return prefix ? prefix + jpy : jpy;
        }

        function setupCurrencyInputs() {
            $('#pricesell_idr').on('keyup', function() {
                this.value = formatRupiah(this.value, 'Rp. ');
            });
            $('#pricesell_jpy').on('keyup', function() {
                this.value = formatJPY(this.value, '¥ ');
            });
            $('#pricebuy_idr').on('keyup', function() {
                this.value = formatRupiah(this.value, 'Rp. ');
            });
            $('#pricebuy_jpy').on('keyup', function() {
                this.value = formatJPY(this.value, '¥ ');
            });
        }

        // --- ✍️ WYSIWYG + Selects ---
        function initUIEditors() {
            $('#description').summernote({
                height: 635,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['font', ['fontsize', 'color']],
                    ['font', ['fontname']],
                    ['para', ['ul', 'ol', 'listStyles', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['history', ['undo', 'redo']],
                    ['view', ['codeview', 'fullscreen', 'findnreplace']],
                    ['help', ['help']]
                ],
            });

            $('.select2').select2();
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        }

        // --- 🚀 Initialize Everything ---
        $(document).ready(() => {
            setupCloneHandlers();
            setupCurrencyInputs();
            initUIEditors();
        });
    </script>
    <script>
        flatpickr("#purchase_date", {
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, // abbreviates month names
                    dateFormat: "Y-m", // format to match <input type="month">
                    altFormat: "F Y", // what user sees (optional)
                    theme: "light"
                })
            ]
        });

        flatpickr("#birth", {
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, // abbreviates month names
                    dateFormat: "Y-m", // format to match <input type="month">
                    altFormat: "F Y", // what user sees (optional)
                    theme: "light"
                })
            ]
        });

        flatpickr("#date_sell", {
            dateFormat: "Y-m-d" // or your preferred format
        });

        flatpickr("#death_date", {
            dateFormat: "Y-m-d" // or your preferred format
        });
    </script>


@endsection
