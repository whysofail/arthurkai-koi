@extends("layouts.apparthuradm")

@section("title", "Edit")

@section("css")
    <!-- Select2 -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset("plugins/select2/css/select2.min.css") }}">
    <link rel="stylesheet" href="{{ asset("plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") }}">
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

@section("content")
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
                <form action="{{ route("cmskoiUpdate") }}" method="POST" enctype="multipart/form-data" id='koiForm'>
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $k->id }}">
                    <input type="hidden" name="status" value="{{ $k->status }}">
                    <div class="col-sm-12">
                        <a href="{{ url()->previous() }}" class="btn btn-sm"
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
                                                        value="{{ old("code") ? old("code") : $k->code }}" id="koi_code"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="nickname" class="col-sm-2 col-form-label">Nickname</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="nickname"
                                                        value="{{ old("nickname") ? old("nickname") : $k->nickname }}"
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
                                                        <option value="{{ $k->variety->id }}"
                                                            {{ $k->variety->name == $k->variety->name ? "selected" : "" }}>
                                                            {{ $k->variety->name }}</option>
                                                        @foreach ($variety as $v)
                                                            <option value="{{ $v->id }}">
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
                                                            {{ $k->breeder == null ? $k->breeder->name : "" }}>
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
                                                            {{ $k->gender == $k->gender ? "selected" : "" }}>
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
                                                    <input type="month" class="form-control" name="birth"
                                                        value="{{ old("birth") ? old("birth") : \Carbon\Carbon::parse($k->birthdate)->format("Y-m") }}"
                                                        id="birth">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="size" class="col-sm-2 col-form-label">Size</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="size"
                                                        value="{{ old("size") ? old("size") : $k->size }}"
                                                        id="size">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="purchase_date" class="col-sm-2 col-form-label">Purchase
                                                    Date</label>
                                                <div class="col-sm-10">
                                                    <input type="month" class="form-control" name="purchase_date"
                                                        value="{{ old("purchase_date") ? old("purchase_date") : \Carbon\Carbon::parse($k->purchase_date)->format("Y-m") }}"
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
                                                            {{ $k->seller == $k->seller ? "selected" : "" }}>
                                                            {{ $k->seller }}</option>
                                                        @foreach ($agent as $a)
                                                            <option value="{{ $a->id }}">
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
                                                        <option value="{{ $k->handler_id }}"
                                                            {{ $k->handler == $k->handler ? "selected" : "" }}>
                                                            {{ $k->handler }}</option>
                                                        @foreach ($agent as $a)
                                                            <option value="{{ $a->id }}">
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
                                                        value="{{ old("pricebuy_idr") ? old("pricebuy_idr") : $k->price_buy_idr }}">
                                                    <input type="text" id="pricebuy_idr_display" class="form-control"
                                                        name="pricebuy_idr_display"
                                                        value="{{ old("pricebuy_idr_display") ? old("price_buy_idr_display") : $k->price_buy_idr }}">
                                                </div>

                                                <label for="pricebuy_jpy" class="col-sm-2 col-form-label">Price Buy
                                                    (JPY)</label>
                                                <div class="col-sm-4">
                                                    <input type="hidden" id="pricebuy_jpy" class="form-control"
                                                        name="pricebuy_jpy"
                                                        value="{{ old("pricebuy_jpy") ? old("price_buy_jpy") : $k->price_buy_jpy }}">
                                                    <input type="text" id="pricebuy_jpy_display" class="form-control"
                                                        name="pricebuy_jpy_display"
                                                        value="{{ old("pricebuy_jpy_display") ? old("pricebuy_jpy_display") : $k->price_buy_idr }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="location" class="col-sm-2 col-form-label">Keeping
                                                    Location</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="location"
                                                        value="{{ old("location") ? old("location") : $k->location }}"
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
                                                        value="{{ old("pricesell_idr") ? old("pricesell_idr") : $k->price_sell_idr }}">
                                                    <input type="text" id="pricesell_idr_display" class="form-control"
                                                        name="pricesell_idr_display"
                                                        value="{{ old("pricesell_idr") ? old("pricesell_idr") : $k->price_sell_idr }}">
                                                </div>

                                                <label for="pricesell_jpy" class="col-sm-2 col-form-label">Sell Price
                                                    (JPY)</label>
                                                <div class="col-sm-4">
                                                    <input type="hidden" id="pricesell_jpy" class="form-control"
                                                        name="pricesell_jpy"
                                                        value="{{ old("pricesell_jpy") ? old("pricesell_jpy") : $k->price_sell_jpy }}">
                                                    <input type="text" id="pricesell_jpy_display" class="form-control"
                                                        name="pricesell_jpy_display"
                                                        value="{{ old("pricesell_jpy") ? old("pricesell_jpy") : $k->price_sell_jpy }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <h2>Koi Media</h2>
                                            <hr>
                                            <div class="col-sm-12" style="margin-top: 10px">
                                                <div class="form-group row" style="margin-top: 10px">
                                                    <label for="photos" class="col-sm-2 col-form-label">Photos</label>
                                                    <div class="col-sm-10">
                                                        @if (!empty($k->photo))
                                                            @php
                                                                $photos = explode("|", $k->photo);
                                                            @endphp
                                                            <div id="existing-photos">
                                                                @foreach ($photos as $photo)
                                                                    @if (!empty($photo))
                                                                        <div class="photo-item"
                                                                            style="margin-bottom: 10px;">
                                                                            <div
                                                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                                                <img width="125"
                                                                                    src="{{ asset("img/koi/photo/" . $photo) }}"
                                                                                    class="img-thumbnail">
                                                                                <div>
                                                                                    <input type="file"
                                                                                        class="form-control-file edit-photo"
                                                                                        name="edit_photo_{{ $photo }}"
                                                                                        style="display: none;">
                                                                                    <button type="button"
                                                                                        class="btn btn-primary btn-sm edit-photo-button"
                                                                                        data-target="input[name='edit_photo_{{ $photo }}']">Edit</button>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-sm remove-photo"
                                                                                        data-photo="{{ $photo }}">Remove</button>
                                                                                </div>
                                                                            </div>
                                                                            <span
                                                                                class="photo-filename">{{ $photo }}</span>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <p>No photos available</p>
                                                        @endif
                                                    </div>

                                                    <div class="input-group realprocodeLP control-group lst incrementLP">
                                                    </div>

                                                    <!-- Input for uploading new photos -->

                                                    @foreach ($k->history as $history)
                                                        @if ($loop->first)
                                                            @foreach (explode("|", $history->link_photo) as $image)
                                                                @if ($image == null)
                                                                    <input type="file" name="link_photo[]"
                                                                        class="myfrm form-control"
                                                                        onchange="Imagelinkphoto(event)">

                                                                    <input type="hidden" name="link_photos">
                                                                @else
                                                                    <input type="file" name="link_photo[]"
                                                                        class="myfrm form-control"
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
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success btn-clickLP" type="button"><i
                                                                class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                                    </div>
                                                </div>
                                                <div class="cloneLP hide" style="display: none;">
                                                    <div class="realprocodeLP control-group lst input-group"
                                                        style="margin: 1em 0 1em;">
                                                        <input type="file" name="link_photo[]"
                                                            class="myfrm form-control" onchange="Imagelinkphoto(event)">
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
                                            <label>Video</label><br>
                                            <div class="form-group">
                                                <img width="125" id="link_video" class="img-thumbnailv">
                                                @if ($loop->first)
                                                    @if (isset($k->video) && !empty($k->video))
                                                        @foreach (explode("|", $k->video) as $video)
                                                            @if (!is_null($video) && $video != "")
                                                                <video src="{{ asset("img/koi/video/" . $video) }}"
                                                                    type="video/mp4" width="130px" id="link_video"
                                                                    controls></video><br>

                                                                <span id="spanLinkVideo"
                                                                    style="font-size: 0.8rem; color: #62200a;">{{ $video }}</span>

                                                                <br />
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <p>No video provided</p>
                                                    @endif
                                                @else
                                                    <p>No video provided</p>
                                                @endif
                                                </span>
                                                <div class="input-group realprocodeLV control-group lst incrementLV">
                                                    <input type="file" name="link_video[]" class="myfrm form-control"
                                                        onchange="link_video(event)"
                                                        accept="video/mp4,video/x-m4v,video/*">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success btn-clickLV" type="button"><i
                                                                class="fldemo glyphicon glyphicon-plus"></i>Add</button>
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
                                            <label>Link Trophy</label><br>
                                            {{-- @foreach ($k->history as $history)
                                                @if ($loop->first)
                                                    @if (isset($history->link_trophy) && $history->link_trophy != null)
                                                        <img width="125" id="link_trophy" class="img-thumbnail"
                                                            src="{{ asset("img/koi/trophy/" . $history->link_trophy) }}">
                                                    @else
                                                        -
                                                    @endif

                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="link_trophy" accept="image/*"
                                                                class="custom-file-input" id="link_trophy"
                                                                onchange="Imagelinktrophy(event)">
                                                            <label class="custom-file-label" for="link_trophy"
                                                                id="labelLinkTrophy">{{ $history->link_trophy ?? "No file chosen" }}</label>
                                                            <input type="hidden" name="link_trophys"
                                                                value="{{ $history->link_trophy ?? "" }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach --}}

                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="name_trophy"
                                                        {{-- value="@foreach ($k->history as $history)@if ($loop->first){{ old("name_trophy") ? old("name_trophy") : $history->name_trophy }}@else @endif @endforeach" --}} id="name_trophy" placeholder="Nama Event">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 mt-3">
                                            <label>Link Certificate</label><br>
                                            {{-- @foreach ($k->history as $history)
                                                @if ($loop->first)
                                                    @if ($history->link_certificate == null)
                                                        -
                                                    @else
                                                        <img width="125" class="img-thumbnail"
                                                            src="{{ asset("img/koi/certificate/" . $history->link_certificate) }}"
                                                            id="link_certificate">
                                                    @endif

                                                    <div class="input-group">

                                                        <div class="custom-file">

                                                            <input type="file" name="link_certificate"
                                                                accept="image/*" class="custom-file-input"
                                                                id="link_certificate"
                                                                onchange="Imagelinkcertificate(event)">

                                                            <label class="custom-file-label"
                                                                for="link_certificate">{{ $history->link_certificate }}</label>

                                                            <input type="hidden" name="link_certificates"
                                                                value="{{ $history->link_certificate }}">

                                                        </div>

                                                    </div>
                                                @else
                                                @endif
                                            @endforeach --}}

                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="name_certificate"
                                                        {{-- value="@foreach ($k->history as $history)@if ($loop->first){{ old("name_certificate") ? old("name_certificate") : $history->name_certificate }}@else @endif @endforeach" --}} id="name_certificate"
                                                        placeholder="Nama Event">
                                                </div>
                                            </div>
                                        </div>
                                        <h2>Additional Information</h2>
                                        <hr>
                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="date_sell" class="col-sm-2 col-form-label">Date of
                                                    Sell</label>
                                                <div class="col-sm-10">
                                                    <input type="month" class="form-control" name="date_sell"
                                                        {{-- value="@foreach ($k->history as $history)@if ($loop->first){{ old("date_sell") ? old("date_sell") : $history->date_sell }}@else @endif @endforeach" --}} id="date_sell">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="buyer_name" class="col-sm-2 col-form-label">Buyer Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="buyer_name"
                                                        {{-- value="@foreach ($k->history as $history)@if ($loop->first){{ old("buyer_name") ? old("buyer_name") : $history->buyer_name }}@else @endif @endforeach" --}} id="buyer_name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="death_date" class="col-sm-2 col-form-label">Date of
                                                    Death</label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" name="death_date"
                                                        {{-- value="@foreach ($k->history as $history)@if ($loop->first){{ old("death_date") ? old("death_date") : $history->death_date }}@else @endif @endforeach" --}} id="death_date">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="death_note" class="col-sm-2 col-form-label">Death Note</label>
                                                <div class="col-sm-10">
                                                    <textarea name="death_note" class="form-control" id="death_note" rows="3">
                                                    {{ $k->death_node ?? "" }}
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

@section("script")
    <!-- Select2 -->
    <script src="{{ asset("plugins/select2/js/select2.full.min.js") }}"></script>
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Form Error',
                    body: '{{ $error }} \n Please check the form and try again.',
                    autohide: true,
                    delay: 5000,
                });
            @endforeach
        @endif
    </script>
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
            // Handle "Edit" button click to trigger file input
            document.querySelectorAll('.edit-photo-button').forEach(button => {
                button.addEventListener('click', function() {
                    // Find the associated file input
                    const targetSelector = this.getAttribute('data-target');
                    const fileInput = document.querySelector(targetSelector);
                    if (fileInput) {
                        fileInput.click(); // Trigger the file input click
                    }
                });
            });

            // Handle file input change to update photo preview
            document.querySelectorAll('.edit-photo').forEach(input => {
                input.addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const photoItem = input.closest('.photo-item');
                            const img = photoItem.querySelector('img');
                            const filenameSpan = photoItem.querySelector('.photo-filename');

                            img.src = e.target.result; // Update image preview
                            filenameSpan.textContent = file.name; // Update filename
                        }
                        reader.readAsDataURL(file);
                    }
                });
            });

            // Handle photo removal
            document.querySelectorAll('.remove-photo').forEach(button => {
                button.addEventListener('click', function() {
                    const photoItem = this.closest('.photo-item');
                    const photo = this.getAttribute('data-photo');

                    // Add hidden input to mark this photo for removal
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'remove_photos[]';
                    input.value = photo;
                    document.getElementById('koiForm').appendChild(input);

                    // Remove the photo item from the DOM
                    photoItem.remove();
                });
            });
        });
    </script>

    <script>
        function photohighlight(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = event.target.parentElement.parentElement.parentElement.querySelector('.img-thumbnailh');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function Imagelinkphoto(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = event.target.parentElement.parentElement.parentElement.querySelector('.img-thumbnailp');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function link_video(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = event.target.parentElement.parentElement.parentElement.querySelector('.img-thumbnailv');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        $(document).ready(function() {
            $(".btn-clickPH").click(function() {
                var lsthmtl = $(".clonePH").html();
                $(".incrementPH").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".realprocodePH").remove();
            });
        });

        $(document).ready(function() {
            $(".btn-clickLP").click(function() {
                var lsthmtl = $(".cloneLP").html();
                $(".incrementLP").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".realprocodeLP").remove();
            });
        });

        $(document).ready(function() {
            $("body").on("click", ".remove-photo", function() {
                console.log("clicked");
                $(this).parents(".photo-item").remove();
            });
        });


        $(document).ready(function() {
            $(".btn-clickLV").click(function() {
                var lsthmtl = $(".cloneLV").html();
                $(".incrementLV").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".realprocodeLV").remove();
            });
        });



        $('#link_video').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

        var promoImagelinkvideo = function(event) {
            var outputourBrands = document.getElementById('link_video');
            outputourBrands.src = URL.createObjectURL(event.target.files[0]);
            outputourBrands.onload = function() {
                URL.revokeObjectURL(outputourBrands.src) // free memory
            }
        };

        $('#photo_highlight').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });



        $('#link_photo').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

        var Imagelinkphoto = function(event) {
            var outputourBrands = document.getElementById('link_photo');
            outputourBrands.src = URL.createObjectURL(event.target.files[0]);
            outputourBrands.onload = function() {
                URL.revokeObjectURL(outputourBrands.src) // free memory
            }
        };

        $('#link_trophy').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

        var Imagelinktrophy = function(event) {
            var outputourBrands = document.getElementById('link_trophy');
            outputourBrands.src = URL.createObjectURL(event.target.files[0]);
            outputourBrands.onload = function() {
                URL.revokeObjectURL(outputourBrands.src) // free memory
            }
        };

        $('#link_certificate').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

        var Imagelinkcertificate = function(event) {
            var outputourBrands = document.getElementById('link_certificate');
            outputourBrands.src = URL.createObjectURL(event.target.files[0]);
            outputourBrands.onload = function() {
                URL.revokeObjectURL(outputourBrands.src) // free memory
            }
        };

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

        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })


        /* Fungsi */
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

        var rupiahpsidr = document.getElementById('pricesell_idr');
        rupiahpsidr.addEventListener('keyup', function(e) {
            rupiahpsidr.value = formatRupiah(this.value, 'Rp. ');
        });

        var rupiahpsjpy = document.getElementById('pricesell_jpy');
        rupiahpsjpy.addEventListener('keyup', function(e) {
            rupiahpsjpy.value = formatJPY(this.value, '¥ ');
        });

        var rupiahpbidr = document.getElementById('pricebuy_idr');
        rupiahpbidr.addEventListener('keyup', function(e) {
            rupiahpbidr.value = formatRupiah(this.value, 'Rp. ');
        });

        var rupiahpbjpy = document.getElementById('pricebuy_jpy');
        rupiahpbjpy.addEventListener('keyup', function(e) {
            rupiahpbjpy.value = formatJPY(this.value, '¥ ');
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#year').change(function() {
                let year = $(this).val();
                let id = $('#id').val();

                $.ajax({
                    url: "{{ route("cmsgetyear") }}",
                    method: 'GET', // Menggunakan metode GET
                    data: {
                        id: id,
                        year: year,

                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                        if (data.length > 0) {
                            $('#koi_sequence').val(data[0].koi_sequence)
                            data.forEach(function(item) {
                                $('#id_history').val(item.id_history);
                                $('#id').val(item.id);
                                $('#size').val(item.size);
                                $('#hagent').val(item.hagent);
                                $('#kep_loc').val(item.kep_loc);
                                $('#pricesell_idr').val(item.pricesell_idr);
                                $('#pricesell_jpy').val(item.pricesell_jpy);
                                $('#photo_highlight').val(item.photo_highlight);
                                $('#photo_highlight').attr("src",
                                    "img/koi/photo_highlight/".item.photo_highlight);
                                $('#photo').val(item.photo);
                                $('#link_photo').attr("src", "img/koi/link_photo/".item
                                    .link_photo);
                                $('#link_video').val(item.link_video);
                                $('#link_video').attr("src", "img/koi/link_video/".item
                                    .link_video);
                                $('#link_trophy').val(item.link_trophy);
                                $('#link_trophy').attr("src", "img/koi/link_trophy/"
                                    .item.link_trophy);
                                $('#name_trophy').val(item.name_trophy);
                                $('#link_certificate').val(item.link_certificate);
                                $('#link_certificate').attr("src",
                                    "img/koi/link_certificate/".item
                                    .link_certificate);
                                $('#name_certificate').val(item.name_certificate);
                                $('#buyer_name').val(item.buyer_name);
                                $('#death_date').val(item.death_date);
                                $('#death_note').val(item.death_note);
                                $('#koi_sequence').val(item.koi_sequence);
                            });
                        } else {
                            // Jika data kosong, kosongkan nilai dari semua elemen
                            $('#size, #hagent, #kep_loc, #pricesell_idr, #pricesell_jpy, #photo_highlight_input, #link_photo, #link_video, #link_trophy, #name_trophy, #link_certificate, #name_certificate, #buyer_name, #death_date, #death_note, #id_history, #koi_sequence')
                                .val('');
                            $('#photo_highlight, #link_photo, #link_video, #link_trophy, #link_certificate')
                                .attr('src', '');
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>

@endsection
