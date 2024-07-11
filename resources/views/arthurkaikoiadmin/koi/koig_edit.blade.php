@extends('layouts.apparthuradm')
@section('title', 'Add')
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

    .custom-file-input:lang(en)~.custom-file-label::after{
        content: "FIle" !important;
    }
</style>
@endsection
@section('content')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #2c7abe; overflow-y: scroll; overflow-x: hidden;">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link" style="text-align: center; padding-top: 22px; padding-bottom: 22px;">
        <img width="55" src="{{ asset('images/logo/koilogo.png') }}">
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background: #2c7abe">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item" style="border-bottom: 3px solid #0186fc; display:flex;">
                    <a href="{{ route('cmskoi') }}" class="nav-link" style="height: 50px; background:black;">
                        <i class="whitefont nav-icon far fa-image" style="font-size: 18px !important;"></i>
                        <p class="whitefont" style="font-size: 18px !important;">
                            Koi
                        </p>
                    </a>
                    <a href="{{ route('cmskoigrid') }}" class="nav-link" style="text-align: right; height: 50px;">
                        <i class="fa-solid fa-table-cells" style="font-size: 18px !important; color: white"></i>
                        <p class="whitefont" style="font-size: 18px !important;">
                            Koi<span> Grid</span>
                        </p>
                    </a>
                </li>
            </ul>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="margin-top: 20px;">
                <li class="nav-header whitefontlist"><i class="fas fa-cog"></i> <span style="margin-left: 10px">Setting Koi</span></li>

                <li class="nav-item" style="border-top: 0.6px solid white;">
                    <a href="{{ route('cmsvariety') }}" class="nav-link">
                        <i class="whitefont nav-icon fas fa-minus"></i>
                        <p class="whitefont">
                            Variety
                        </p>
                    </a>
                </li>
                <li class="nav-item" style="border-top: 0.6px solid white;">
                    <a href="{{ route('cmsbloodline') }}" class="nav-link">
                        <i class="whitefont nav-icon fas fa-minus"></i>
                        <p class="whitefont">
                            Bloodline
                        </p>
                    </a>
                </li>
                <li class="nav-item" style="border-top: 0.6px solid white;">
                    <a href="{{ route('cmsbreeder') }}" class="nav-link">
                        <i class="whitefont nav-icon fas fa-minus"></i>
                        <p class="whitefont">
                            Breeder
                        </p>
                    </a>
                </li>
                <li class="nav-item" style="border-top: 0.6px solid white; border-bottom: 0.6px solid white;">
                    <a href="{{ route('cmsagent') }}" class="nav-link">
                        <i class="whitefont nav-icon fas fa-minus"></i>
                        <p class="whitefont">
                            Agent
                        </p>
                    </a>
                </li>

            </ul>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="margin-top: 20px;">
                <li class="nav-header whitefontlist"><i class="fas fa-cog"></i> <span style="margin-left: 10px">Live Website Koi</span></li>

                <li class="nav-item" style="border-top: 0.6px solid white;">
                    <a href="{{ route('cmsourcollection') }}" class="nav-link">
                        <i class="whitefont nav-icon fas fa-minus"></i>
                        <p class="whitefont">
                            Our Collection
                        </p>
                    </a>
                </li>
                <li class="nav-item" style="border-top: 0.6px solid white;">
                    <a href="{{ route('cmsnews') }}" class="nav-link">
                        <i class="whitefont nav-icon fas fa-minus"></i>
                        <p class="whitefont">
                            News
                        </p>
                    </a>
                </li>
                <li class="nav-item" style="border-top: 0.6px solid white;">
                    <a href="{{ route('cmsaboutus') }}" class="nav-link">
                        <i class="whitefont nav-icon fas fa-minus"></i>
                        <p class="whitefont">
                            About Us
                        </p>
                    </a>
                </li>
                <li class="nav-item" style="border-top: 0.6px solid white; border-bottom: 0.6px solid white;">
                    <a href="{{ route('cmscontactus') }}" class="nav-link">
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
                    <h1 class="m-0">Koi</h1>
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
                    <h1>Koi</h1>
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
        @foreach($koi as $k)
        <form action="{{ route('cmskoigUpdate') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="id" value="{{ $k->id_koi }}">
            @foreach($k->history as $history)@if($loop->first)
            <input type="hidden" name="id_history" id="id_history" value="{{ $history->id_history }}">
            @else @endif @endforeach
            <input type="hidden" name="koi_id" id="koi_id" value="{{ $k->id_koi }}">
            <input type="hidden" name="n_status" value="{{ $k->n_status }}">
            <div class="col-sm-12">
                <a href="{{ route('cmskoigrid') }}" class="btn btn-sm"
                    style="margin-bottom: 5px; border-radius: 20px 1px 10px; border: black solid 1px; ">
                    <i class="fas fa-arrow-circle-left" style="position: relative; right: 3%; top: 1px;"></i>
                    Back
                </a>
                <div class="card">
                    <div class="card-body">
                        <div class="content tab" id="contentDataKOI">
                            <section id="section-1" class="content-current">

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="koi_code" class="col-sm-2 col-form-label">KOI code</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="koi_code" value="{{ $k->koi_code }}">
                                            <input type="text" class="form-control" name="koi_code"
                                                value="{{ old('koi_code') ? old('koi_code') : $k->koi_code }}"
                                                id="koi_code" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="nickname" class="col-sm-2 col-form-label">Nickname</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="nickname" value="{{ $k->nickname }}">
                                            <input type="text" class="form-control" name="nickname"
                                                value="{{ old('nickname') ? old('nickname') : $k->nickname }}"
                                                id="nickname" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="variety" class="col-sm-2 col-form-label">Variety</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="variety" style="width: 100%;" disabled>
                                                <option value="{{ $k->variety }}" {{ ($k->variety==$k->variety)? "selected" : "" }}>{{ $k->variety }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="variety" value="{{ $k->variety }}">

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="gender" value="{{ $k->gender }}">
                                            <select class="form-control select2" name="gender" style="width: 100%;" disabled>
                                                <option value="{{ $k->gender }}" {{ ($k->gender==$k->gender)? "selected" : "" }}>{{ $k->gender }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="gender" value="{{ $k->gender }}">

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="birth" class="col-sm-2 col-form-label">Birth</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="birth" value="{{ $k->birth }}" disabled>
                                            <input type="month" class="form-control" name="birth"
                                                value="{{ old('birth') ? old('birth') : $k->birth }}" id="birth">
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="age" value="@if($k->birth) @php $umur = \Carbon\Carbon::parse($k->birth)->diff(\Carbon\Carbon::now()); $umurTahun = $umur->y;$umurBulan = $umur->m; echo $umurTahun . ' tahun ' . $umurBulan . ' bulan';@endphp @else @endif">

                                {{-- <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="age" class="col-sm-2 col-form-label">Age</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="age" value="{{ $k->age }}">
                                            <input type="text" class="form-control" name="age"
                                                value="{{ old('age') ? old('age') : $k->age }}" id="age" >
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="bloodline" class="col-sm-2 col-form-label">Bloodline</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="bloodline" style="width: 100%;" disabled>
                                                <option value="{{ $k->bloodline }}" {{ ($k->bloodline==$k->bloodline)? "selected" : "" }}>{{ $k->bloodline }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="bloodline" value="{{ $k->bloodline }}">

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="breeder" class="col-sm-2 col-form-label">Breeder</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="breeder" style="width: 100%;" disabled>
                                                <option value="{{ $k->breeder }}" {{ ($k->breeder==$k->breeder)? "selected" : "" }}>{{ $k->breeder }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="breeder" value="{{ $k->breeder }}">

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="date_purchese" class="col-sm-2 col-form-label">Purchase Date</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="date_purchese" value="{{ $k->date_purchese }}">
                                            <input type="month" class="form-control" name="date_purchese"
                                                value="{{ old('date_purchese') ? old('date_purchese') : $k->date_purchese }}" id="date_purchese" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="salleragent" class="col-sm-2 col-form-label">Seller Agent</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="salleragent" style="width: 100%;" disabled>
                                                <option value="{{ $k->salleragent }}" {{ ($k->salleragent==$k->salleragent)? "selected" : "" }}>{{ $k->salleragent }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="salleragent" value="{{ $k->salleragent }}">

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="pricebuy_idr" class="col-sm-2 col-form-label">Price Buy (IDR)</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="pricebuy_idr" value="{{ $k->pricebuy_idr }}">
                                            <input type="text" class="form-control" name="pricebuy_idr"
                                                value="{{ old('pricebuy_idr') ? old('pricebuy_idr') : $k->pricebuy_idr }}" id="pricebuy_idr" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="pricebuy_jpy" class="col-sm-2 col-form-label">Price Buy (JPY)</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="pricebuy_jpy" value="{{ $k->pricebuy_jpy }}">
                                            <input type="text" class="form-control" name="pricebuy_jpy"
                                                value="{{ old('pricebuy_jpy') ? old('pricebuy_jpy') : $k->pricebuy_jpy }}" id="pricebuy_jpy" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="year" class="col-sm-2 col-form-label">Year</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="year" id="year" style="width: 100%;">
                                                <option value=""></option>
                                                <option value="2018" {{ ($k->year=="2018")? "selected" : "" }}>2018</option>
                                                <option value="2019" {{ ($k->year=="2019")? "selected" : "" }}>2019</option>
                                                <option value="2020" {{ ($k->year=="2020")? "selected" : "" }}>2020</option>
                                                <option value="2021" {{ ($k->year=="2021")? "selected" : "" }}>2021</option>
                                                <option value="2022" {{ ($k->year=="2022")? "selected" : "" }}>2022</option>
                                                <option value="2023" {{ ($k->year=="2023")? "selected" : "" }}>2023</option>
                                                <option value="2024" {{ ($k->year=="2024")? "selected" : "" }}>2024</option>
                                                <option value="2025" {{ ($k->year=="2025")? "selected" : "" }}>2025</option>
                                                <option value="2026" {{ ($k->year=="2026")? "selected" : "" }}>2026</option>
                                                <option value="2027" {{ ($k->year=="2027")? "selected" : "" }}>2027</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="size" class="col-sm-2 col-form-label">Size</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="size"
                                                value="@foreach($k->history as $history)@if($loop->first){{  old('size') ? old('size') : $history->size}}@else @endif @endforeach" id="size">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="hagent" class="col-sm-2 col-form-label">Handling Agent</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="hagent"
                                                value="@foreach($k->history as $history)@if($loop->first){{ old('hagent') ? old('hagent') : $history->hagent }}@else @endif @endforeach" id="hagent">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="kep_loc" class="col-sm-2 col-form-label">Keeping Location</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="kep_loc"
                                                value="@foreach($k->history as $history)@if($loop->first){{ old('kep_loc') ? old('kep_loc') : $history->kep_loc }}@else @endif @endforeach" id="kep_loc">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="pricesell_idr" class="col-sm-2 col-form-label">Sell Price (IDR)</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="pricesell_idr" class="form-control" name="pricesell_idr"
                                                value="@foreach($k->history as $history)@if($loop->first){{ old('pricesell_idr') ? old('pricesell_idr') : $history->pricesell_idr }}@else @endif @endforeach">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="pricesell_jpy" class="col-sm-2 col-form-label">Sell Price (JPY)</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="pricesell_jpy" class="form-control" name="pricesell_jpy"
                                                value="@foreach($k->history as $history)@if($loop->first){{ old('pricesell_jpy') ? old('pricesell_jpy') : $history->pricesell_jpy }}@else @endif @endforeach">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="date_sell" class="col-sm-2 col-form-label">Date Of Sell</label>
                                        <div class="col-sm-10">
                                            <input type="month" class="form-control" name="date_sell"
                                                value="@foreach($k->history as $history)@if($loop->first){{ old('date_sell') ? old('date_sell') : $history->date_sell }}@else @endif @endforeach" id="date_sell">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="photo_highlight" class="col-sm-2 col-form-label">Photo Highlight</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="photo_highlight" id="photo_highlight" style="width: 100%;">
                                                <option value=""></option>
                                                @foreach($k->history as $history)

                                                                        @foreach (explode('|', $history->link_photo) as
                                                                        $image)
                                                                        @if($image != null)
                                                <option value="{{ $image }}" {{ ($image==$history->photo_highlight)? "selected" : "" }}>{{ $image }}</option>
                                                @else
                                                @endif
                                                @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-12">
                                    <label>Link Photo</label><br>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            @foreach($k->history as $history)
                                                @if($loop->first)
                                                @foreach (explode('|', $history->link_photo) as $image)
                                                @if($image == null)
                                                @else
                                            <img width="125" id="link_photo" src="{{ asset('img/koi/photo/'. $image) }}" class="img-thumbnailh">

                                            <span>{{ $image }}</span>
                                            @endif
                                        @endforeach
                                        @else
                                        @endif
                                        @endforeach
                                        <div class="input-group realprocodeLP control-group lst incrementLP">
                                            @foreach($k->history as $history)
                                            @if($loop->first)
                                            @foreach (explode('|', $history->link_photo) as $image)
                                            @if($image == null)
                                            <input type="file" name="link_photo[]" class="myfrm form-control" onchange="Imagelinkphoto(event)">
                                            <input type="hidden" name="link_photos" >
                                            @else
                                            <input type="file" name="link_photo[]" class="myfrm form-control" onchange="Imagelinkphoto(event)">
                                            <input type="hidden" name="link_photos" value="{{ $history->link_photo }}">
                                            @endif
                                            @endforeach
                                            @else
                                            @endif
                                            @endforeach
                                            @if($k->history == null)
                                            <input type="file" name="photo_highlight[]" class="myfrm form-control" onchange="photohighlight(event)">
                                            <input type="hidden" name="photo_highlights" value="">
                                            @else
                                            @endif
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success btn-clickLP" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                                </div>
                                            </div>
                                            <div class="cloneLP hide" style="display: none;">
                                                <div class="realprocodeLP control-group lst input-group" style="margin-top:10px">
                                                    <input type="file" name="link_photo[]" class="myfrm form-control" onchange="Imagelinkphoto(event)">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12 mt-3">
                                    <label>Link_Video</label><br>
                                    <div class="form-group">
                                        <img width="125" id="link_video" class="img-thumbnailv">
                                        @foreach($k->history as $history)
                                        @if($loop->first)
                                            @foreach (explode('|', $history->link_video) as $image)
                                            @if($image == null)
                                            @else
                                            <video src="{{ asset('img/koi/video/'. $image) }}" type="video/mp4" width="130px" id="link_video" controls></video><br>
                                            <span id="spanLinkVideo" style="font-size: 0.8rem; color: #62200a;">{{ $image }}</span>
                                            <br/>
                                            @endif
                                        @endforeach
                                        @else

                                        @endif
                                        @endforeach
                                        </span>
                                        <div class="input-group realprocodeLV control-group lst incrementLV">
                                            <input type="file" name="link_video[]" class="myfrm form-control" onchange="link_video(event)" accept="video/mp4,video/x-m4v,video/*">
                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn-clickLV" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                            </div>
                                        </div>
                                        <div class="cloneLV hide" style="display: none;">
                                            <div class="realprocodeLV control-group lst input-group" style="margin-top:10px">
                                                <input type="file" name="link_video[]" class="myfrm form-control" onchange="link_video(event)" accept="video/mp4,video/x-m4v,video/*">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 mt-3">
                                    <label>Link Trophy</label><br>
                                    @foreach($k->history as $history)
                                    @if($loop->first)
                                    @if($history->link_trophy == null)
                                    -
                                    @else
                                    <img width="125" id="link_trophy" class="img-thumbnail" src="{{ asset('img/koi/trophy/'. $history->link_trophy) }}">
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"  name="link_trophy" accept="image/*" class="custom-file-input" id="link_trophy" onchange="Imagelinktrophy(event)">
                                            <label class="custom-file-label" for="link_trophy" id="labelLinkTrophy">{{ $history->link_trophy }}</label>
                                            <input type="hidden" name="link_trophys" value="{{ $history->link_trophy }}">
                                        </div>
                                    </div>
                                    @else

                                    @endif
                                    @endforeach
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="name_trophy"
                                                value="@foreach($k->history as $history)@if($loop->first){{ old('name_trophy') ? old('name_trophy') : $history->name_trophy }}@else @endif @endforeach" id="name_trophy" placeholder="Nama Event">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 mt-3">
                                    <label>Link Certificate</label><br>
                                    @foreach($k->history as $history)
                                    @if($loop->first)
                                    @if($history->link_certificate == null)
                                    -
                                    @else
                                    <img width="125" class="img-thumbnail" src="{{ asset('img/koi/certificate/'. $history->link_certificate) }}" id="link_certificate">
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"  name="link_certificate" accept="image/*" class="custom-file-input" id="link_certificate" onchange="Imagelinkcertificate(event)">
                                            <label class="custom-file-label" for="link_certificate">{{ $history->link_certificate }}</label>
                                            <input type="hidden" name="link_certificates" value="{{ $history->link_certificate }}">
                                        </div>
                                    </div>
                                    @else

                                    @endif
                                    @endforeach
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="name_certificate"
                                                value="@foreach($k->history as $history)@if($loop->first){{ old('name_certificate') ? old('name_certificate') : $history->name_certificate }}@else @endif @endforeach" id="name_certificate" placeholder="Nama Event">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="buyer_name" class="col-sm-2 col-form-label">Buyer Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="buyer_name"
                                                value="@foreach($k->history as $history)@if($loop->first){{ old('buyer_name') ? old('buyer_name') : $history->buyer_name }}@else @endif @endforeach" id="buyer_name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="death_date" class="col-sm-2 col-form-label">Date of Death</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="death_date"
                                                value="@foreach($k->history as $history)@if($loop->first){{ old('death_date') ? old('death_date') : $history->death_date }}@else @endif @endforeach" id="death_date">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="death_note" class="col-sm-2 col-form-label">Death Note</label>
                                        <div class="col-sm-10">
                                            <textarea name="death_note" class="form-control" id="death_note" rows="3">@foreach($k->history as $history)@if($loop->first){{ old('death_note') ? old('death_note') : $history->death_note }}@else @endif @endforeach</textarea>
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

        <!-- ./row -->
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
    function photohighlight(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = event.target.parentElement.parentElement.parentElement.querySelector('.img-thumbnailh');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function Imagelinkphoto(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = event.target.parentElement.parentElement.parentElement.querySelector('.img-thumbnailp');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function link_video(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = event.target.parentElement.parentElement.parentElement.querySelector('.img-thumbnailv');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    $(document).ready(function() {
        $(".btn-clickPH").click(function(){
            var lsthmtl = $(".clonePH").html();
            $(".incrementPH").after(lsthmtl);
        });
        $("body").on("click",".btn-danger",function(){
            $(this).parents(".realprocodePH").remove();
        });
    });

    $(document).ready(function() {
        $(".btn-clickLP").click(function(){
            var lsthmtl = $(".cloneLP").html();
            $(".incrementLP").after(lsthmtl);
        });
        $("body").on("click",".btn-danger",function(){
            $(this).parents(".realprocodeLP").remove();
        });
    });

    $(document).ready(function() {
        $(".btn-clickLV").click(function(){
            var lsthmtl = $(".cloneLV").html();
            $(".incrementLV").after(lsthmtl);
        });
        $("body").on("click",".btn-danger",function(){
            $(this).parents(".realprocodeLV").remove();
        });
    });



    $('#link_video').on('change',function(){
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
    }};

    $('#photo_highlight').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });



    $('#link_photo').on('change',function(){
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
    }};

    $('#link_trophy').on('change',function(){
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
    }};

    $('#link_certificate').on('change',function(){
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
    }};

    $('#description').summernote({
        height: 635,
		toolbar: [
	        ['style', ['style']],
			['font', ['bold', 'italic', 'underline', 'clear']],
			['font', ['strikethrough', 'superscript', 'subscript']],
			['font', ['fontsize', 'color']],
			['font', ['fontname']],
			['para',['ul','ol', 'listStyles','paragraph']],
			['height',['height']],
			['table', ['table']],
			['insert', ['link', 'picture', 'video']],
			['history', ['undo', 'redo']],
			['view', ['codeview', 'fullscreen', 'findnreplace']],
			['help',['help']]
		],
    });

    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })


/* Fungsi */
function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function formatJPY(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            jpy     = split[0].substr(0, sisa),
            yen     = split[0].substr(sisa).match(/\d{3}/gi);

        if (yen) {
            separator = sisa ? '' : '';
            jpy += separator + yen.join('');
        }

        jpy = split[1] != undefined ? jpy + ',' + split[1] : jpy;
        return prefix == undefined ? jpy : (jpy ? '¥ ' + jpy : '');
    }

    var rupiahpsidr = document.getElementById('pricesell_idr');
		rupiahpsidr.addEventListener('keyup', function(e){
		rupiahpsidr.value = formatRupiah(this.value, 'Rp. ');
	});

    var rupiahpsjpy = document.getElementById('pricesell_jpy');
		rupiahpsjpy.addEventListener('keyup', function(e){
		rupiahpsjpy.value = formatJPY(this.value, '¥ ');
	});

    var rupiahpbidr = document.getElementById('pricebuy_idr');
		rupiahpbidr.addEventListener('keyup', function(e){
		rupiahpbidr.value = formatRupiah(this.value, 'Rp. ');
	});

    var rupiahpbjpy = document.getElementById('pricebuy_jpy');
		rupiahpbjpy.addEventListener('keyup', function(e){
		rupiahpbjpy.value = formatJPY(this.value, '¥ ');
	});
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){
    $('#year').change(function(){
        let year = $(this).val();
        let koi_id = $('#id').val();

        $.ajax({
            url: "{{ route('cmsgetyear') }}",
            method: 'GET', // Menggunakan metode GET
            data: {
                koi_id: koi_id,
                year: year,
            },
            dataType: 'json',
            success: function(data) {
                if (data.length > 0) {
                data.forEach(function(item) {
                    $('#id_history').val(item.id_history);
                    $('#koi_id').val(item.koi_id);
                    $('#size').val(item.size);
                    $('#hagent').val(item.hagent);
                    $('#kep_loc').val(item.kep_loc);
                    $('#pricesell_idr').val(item.pricesell_idr);
                    $('#pricesell_jpy').val(item.pricesell_jpy);
                    $('#photo_highlight').val(item.photo_highlight);
                    $('#photo_highlight').attr("src" , "img/koi/photo_highlight/" . item.photo_highlight);
                    $('#link_photo').val(item.link_photo);
                    $('#link_photo').attr("src" , "img/koi/link_photo/" . item.link_photo);
                    $('#link_video').val(item.link_video);
                    $('#link_video').attr("src" , "img/koi/link_video/" . item.link_video);
                    $('#link_trophy').val(item.link_trophy);
                    $('#link_trophy').attr("src" , "img/koi/link_trophy/" . item.link_trophy);
                    $('#name_trophy').val(item.name_trophy);
                    $('#link_certificate').val(item.link_certificate);
                    $('#link_certificate').attr("src" , "img/koi/link_certificate/" . item.link_certificate);
                    $('#name_certificate').val(item.name_certificate);
                    $('#buyer_name').val(item.buyer_name);
                    $('#death_date').val(item.death_date);
                    $('#death_note').val(item.death_note);
                    });
                } else {
                    // Jika data kosong, kosongkan nilai dari semua elemen
                    $('#size, #hagent, #kep_loc, #pricesell_idr, #pricesell_jpy, #photo_highlight_input, #link_photo, #link_video, #link_trophy, #name_trophy, #link_certificate, #name_certificate, #buyer_name, #death_date, #death_note, #id_history').val('');
                    $('#photo_highlight, #link_photo, #link_video, #link_trophy, #link_certificate').attr('src', '');
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
