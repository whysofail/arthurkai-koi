@extends('layouts.apparthuradm')
@section('title', 'Add')
@section('css')
<!-- Select2 -->
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
@endsection
@section('content')
<!-- Main Sidebar Container -->
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
                    <a href="{{ route('cmskoi') }}" class="nav-link" style="height: 50px;">
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

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Koi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a style="color: black">Dashboard</a></li>
                        <li class="breadcrumb-item active" style="color: red">Add Koi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ route('cmskoigstore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="n_status" value="Available">
            <div class="col-sm-12">
                <a href="{{ route('cmskoigrid') }}" class="btn btn-sm"
                    style="margin-bottom: 5px; border-radius: 20px 1px 10px; border: black solid 1px; ">
                    <i class="fas fa-arrow-circle-left" style="position: relative; right: 3%; top: 1px;"></i>
                    back
                </a>
                <div class="card">
                    <div class="card-body">
                        <div class="content tab">
                            <section id="section-1" class="content-current">

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="koi_code" class="col-sm-2 col-form-label">KOI code</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="koi_code"
                                                value="{{ old('koi_code') }}" id="koi_code">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="nickname" class="col-sm-2 col-form-label">Nickname</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nickname"
                                                value="{{ old('nickname') }}" id="nickname">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="variety" class="col-sm-2 col-form-label">Variety</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="variety" style="width: 100%;">
                                                <option selected="selected">Selected Variety</option>
                                                @foreach($variety as $v)
                                                <option value="{{ $v->variety_name }}">{{ $v->variety_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="gender" style="width: 100%;">
                                                <option value="" selected="selected">Selected Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Famele</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="birth" class="col-sm-2 col-form-label">Birth</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="birth"
                                                value="{{ old('birth') }}" id="birth">
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="age" class="col-sm-2 col-form-label">Age</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="age"
                                                value="{{ old('age') }}" id="age">
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="bloodline" class="col-sm-2 col-form-label">Bloodline</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="bloodline" style="width: 100%;">
                                                <option selected="selected">Selected Bloodline</option>
                                                @foreach($bloodline as $b)
                                                <option value="{{ $b->bloodline_name }}">{{ $b->bloodline_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="breeder" class="col-sm-2 col-form-label">Breeder</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="breeder" style="width: 100%;">
                                                <option selected="selected">Selected Breeder</option>
                                                @foreach($breeder as $b)
                                                <option value="{{ $b->breeder_name }}">{{ $b->breeder_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="date_purchese" class="col-sm-2 col-form-label">Purchase Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="date_purchese"
                                                value="{{ old('date_purchese') }}" id="date_purchese">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="salleragent" class="col-sm-2 col-form-label">Seller Agent</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="salleragent" style="width: 100%;">
                                                <option selected="selected">Selected Seller Agent</option>
                                                @foreach($agent as $a)
                                                <option value="{{ $a->agent_name }}">{{ $a->agent_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="pricebuy_idr" class="col-sm-2 col-form-label">Price Buy (IDR)</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="pricebuy_idr" class="form-control" name="pricebuy_idr"
                                                value="{{ old('pricebuy_idr') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="pricebuy_jpy" class="col-sm-2 col-form-label">Price Buy (JPY)</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="pricebuy_jpy" class="form-control" name="pricebuy_jpy"
                                                value="{{ old('pricebuy_jpy') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="year" class="col-sm-2 col-form-label">Year</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="year" style="width: 100%;">
                                                <option value=""></option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="size" class="col-sm-2 col-form-label">Size</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="size"
                                                value="{{ old('size') }}" id="size">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="hagent" class="col-sm-2 col-form-label">Handling Agent</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="hagent"
                                                value="{{ old('hagent') }}" id="hagent">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="kep_loc" class="col-sm-2 col-form-label">Keeping Location</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="kep_loc"
                                                value="{{ old('kep_loc') }}" id="kep_loc">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="pricesell_idr" class="col-sm-2 col-form-label">Sell Price (IDR)</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="pricesell_idr" class="form-control" name="pricesell_idr"
                                                value="{{ old('pricesell_idr') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="pricesell_jpy" class="col-sm-2 col-form-label">Sell Price (JPY)</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="pricesell_jpy" class="form-control" name="pricesell_jpy"
                                                value="{{ old('pricesell_jpy') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="date_sell" class="col-sm-2 col-form-label">Date Of Sell</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="date_sell"
                                                value="{{ old('date_sell') }}" id="date_sell">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="input-group row">
                                        <label for="photo_highlight" class="col-sm-2 col-form-label">Photo Highlight</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <img width="125" id="photo_highlight" class="img-thumbnailh">
                                                <div class="input-group realprocodePH control-group lst incrementPH">
                                                    <input type="file" name="photo_highlight[]" class="myfrm form-control" onchange="photohighlight(event)">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success btn-clickPH" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                                    </div>
                                                </div>
                                                <div class="clonePH hide" style="display: none;">
                                                    <div class="realprocodePH control-group lst input-group" style="margin-top:10px">
                                                        <input type="file" name="photo_highlight[]" class="myfrm form-control" onchange="photohighlight(event)">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="input-group row">
                                        <label for="link_photo" class="col-sm-2 col-form-label">Link Photo</label>
                                        <div class="col-sm-10" id="satu">
                                            <div class="form-group">
                                                <img width="125" id="link_photo" class="img-thumbnailp">
                                                <div class="input-group realprocodeLP control-group lst incrementLP">
                                                    <input type="file" name="link_photo[]" class="myfrm form-control" onchange="Imagelinkphoto(event)">
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
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="input-group row">
                                        <label for="link_video" class="col-sm-2 col-form-label">Link Video</label>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <img width="125" id="link_video" class="img-thumbnailv">
                                                <div class="input-group realprocodeLV control-group lst incrementLV">
                                                    <input type="file" name="link_video[]" class="myfrm form-control" onchange="link_video(event)" accept="video/mp4,video/x-m4v,video/*">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-success btn-clickLV" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                                    </div>
                                                </div>
                                                <div class="clonev hide" style="display: none;">
                                                    <div class="realprocodeLV control-group lst input-group" style="margin-top:10px">
                                                        <input type="file" name="link_video[]" class="myfrm form-control" onchange="link_video(event)" accept="video/mp4,video/x-m4v,video/*">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="input-group row">
                                        <label for="link_trophy" class="col-sm-2 col-form-label">Link Trophy</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="link_trophy"
                                                value="{{ old('link_trophy') }}" id="link_trophy"
                                                style="height: auto !important;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="name_trophy" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name_trophy"
                                                value="{{ old('name_trophy') }}" id="name_trophy" placeholder="Nama Event">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="input-group row">
                                        <label for="link_certificate"
                                            class="col-sm-2 col-form-label">Link Certificate</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="link_certificate"
                                                value="{{ old('link_certificate') }}" id="link_certificate"
                                                style="height: auto !important;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="name_certificate" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name_certificate"
                                                value="{{ old('name_certificate') }}" id="name_certificate" placeholder="Nama Event">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="buyer_name" class="col-sm-2 col-form-label">Buyer Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="buyer_name"
                                                value="{{ old('buyer_name') }}" id="buyer_name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="death_date" class="col-sm-2 col-form-label">Date of Death</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="death_date"
                                                value="{{ old('death_date') }}" id="death_date">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="death_note" class="col-sm-2 col-form-label">Death Note</label>
                                        <div class="col-sm-10">
                                            <textarea name="death_note" class="form-control" rows="3">{{ old('death_note') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 50px">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>

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
    $(document).ready(function(){
    $('#image').on('change',function(){
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

});


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

     // Function to format Japanese Yen
     function formatJapaneseYen(number) {
        return new Intl.NumberFormat('ja-JP', { style: 'currency', currency: 'JPY' }).format(number);
    }

</script>
<script>

// $(document).ready(function(){
//     var i = 0;
//     $('#addfile').click(function(){
//         ++i;
//         $('.increment').append(
//             `

//             <label for="link_photo_${i}" class="col-sm-2 col-form-label"></label>
//             <div id="file_${i}" class="col-sm-10" style="display: flex;">
//                 <input type="file" name="link_photo_${i}" class="form-control" style="margin-top: 10px;">
//                 <button class="btn btn-danger removefile" data-index="${i}" type="button" style="margin-top: 10px;">-</button>
//             </div>

//             `
//         )

//     })

//     $(document).on('click', '.removefile', function(){
//         var index = $(this).data('index');
//         $('#file_' + index).remove();
//         $('label[for="link_photo_' + index + '"]').remove();
//     })
// })
</script>

<script type="text/javascript">
</script>

<script type="text/javascript">
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
    </script>


@endsection
