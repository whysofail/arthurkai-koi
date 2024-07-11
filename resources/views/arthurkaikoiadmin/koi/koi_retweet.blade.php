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
                    <a href="{{ route('cmskoigrid') }}" class="nav-link" style="text-align: right; background: black; height: 50px;">
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
        <form action="{{ route('cmskoiUpdate') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $k->id_koi }}">
            <div class="col-sm-12">
                <a href="{{ route('cmskoi') }}" class="btn btn-sm"
                    style="margin-bottom: 5px; border-radius: 20px 1px 10px; border: black solid 1px; ">
                    <i class="fas fa-arrow-circle-left" style="position: relative; right: 3%; top: 1px;"></i>
                    Back
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
                                                value="{{ old('koi_code') ? old('koi_code') : $k->koi_code }}"
                                                id="koi_code">
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
                                            <input type="text" class="form-control" name="variety"
                                                value="{{ old('variety') ? old('variety') : $k->variety }}" id="variety">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="gender" style="width: 100%;">
                                                <option value="Male" {{ ($k->gender=="Male")? "selected" : "" }}>Male</option>
                                                <option value="Female" {{ ($k->gender=="Female")? "selected" : "" }}>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="birth" class="col-sm-2 col-form-label">Birth</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="birth"
                                                value="{{ old('birth') ? old('birth') : $k->birth }}" id="birth">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="age" class="col-sm-2 col-form-label">Age</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="age"
                                                value="{{ old('age') ? old('age') : $k->age }}" id="age">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="bloodline" class="col-sm-2 col-form-label">Bloodline</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="bloodline"
                                                value="{{ old('bloodline') ? old('bloodline') : $k->bloodline }}" id="bloodline">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="breeder" class="col-sm-2 col-form-label">Breeder</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="breeder"
                                                value="{{ old('breeder') ? old('breeder') : $k->breeder }}" id="breeder">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="date_purchese" class="col-sm-2 col-form-label">Date Ownership / Purchase</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="date_purchese"
                                                value="{{ old('date_purchese') ? old('date_purchese') : $k->date_purchese }}" id="date_purchese">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="size" class="col-sm-2 col-form-label">Size</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="size"
                                                value="{{ old('size') ? old('size') : $k->size }}" id="size">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="hagent" class="col-sm-2 col-form-label">Handling Agent</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="hagent"
                                                value="{{ old('hagent') ? old('hagent') : $k->hagent }}" id="hagent">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="salleragent" class="col-sm-2 col-form-label">Seller Agent</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="salleragent"
                                                value="{{ old('salleragent') ? old('salleragent') : $k->salleragent }}" id="salleragent">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="pricebuy_idr" class="col-sm-2 col-form-label">Price Buy (IDR)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pricebuy_idr"
                                                value="{{ old('pricebuy_idr') ? old('pricebuy_idr') : $k->pricebuy_idr }}" id="pricebuy_idr">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="pricebuy_jpy" class="col-sm-2 col-form-label">Price Buy (JPY)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pricebuy_jpy"
                                                value="{{ old('pricebuy_jpy') ? old('pricebuy_jpy') : $k->pricebuy_jpy }}" id="pricebuy_jpy">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="kep_loc" class="col-sm-2 col-form-label">Keeping Location</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="kep_loc"
                                                value="{{ old('kep_loc') ? old('kep_loc') : $k->kep_loc }}" id="kep_loc">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="pricesell_idr" class="col-sm-2 col-form-label">Sell Price (IDR)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pricesell_idr"
                                                value="{{ old('pricesell_idr') ? old('pricesell_idr') : $k->pricesell_idr }}" id="pricesell_idr">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="pricesell_jpy" class="col-sm-2 col-form-label">Sell Price (JPY)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pricesell_jpy"
                                                value="{{ old('pricesell_jpy') ? old('pricesell_jpy') : $k->pricesell_jpy }}" id="pricesell_jpy">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="date_sell" class="col-sm-2 col-form-label">Date Of Sell</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="date_sell"
                                                value="{{ old('date_sell') ? old('date_sell') : $k->date_sell }}" id="date_sell">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <label>Photo Highlight</label><br>
                                    <div class="input-group">

                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="photo_highlight[]" accept="image/*" class="custom-file-input" id="photo_highlight" onchange="Imagephotohighlight(event)"  multiple>
                                                <label class="custom-file-label" for="exampleInputFile"></label>
                                                <input type="hidden" name="photo_highlights" value="{{ $k->photo_highlight }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-12">
                                    <label>Link Photo</label><br>
                                    <div class="input-group">

                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="link_photo[]" accept="image/*" class="custom-file-input" id="link_photo"  onchange="Imagelinkphoto(event)" multiple>
                                                <label class="custom-file-label" for="exampleInputFile"></label>
                                                <input type="hidden" name="link_photos" value="{{ $k->link_photo }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12 mt-3">
                                    <label>Link_Video</label><br>

                                        <br>
                                    <div class="input-group">

                                        <div class="custom-file">
                                            <input type="file" name="link_video[]" accept=" video/*" class="custom-file-input"
                                                id="link_video" onchange="promoImagelinkvideo(event)" multiple>
                                            <label class="custom-file-label" for="link_video"></label>
                                            <input type="hidden" name="link_videos" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 mt-3">
                                    <label>Link Trophy</label><br>

                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="link_trophy" accept="image/*" class="custom-file-input" id="link_trophy" onchange="Imagelinktrophy(event)">
                                            <label class="custom-file-label" for="link_trophy"></label>
                                            <input type="hidden" name="link_trophys" value="{{ $k->link_trophy }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="name_trophy"
                                                value="{{ old('name_trophy') ? old('name_trophy') : $k->name_trophy }}" id="name_trophy" placeholder="Nama Event">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 mt-3">
                                    <label>Link Certificate</label><br>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"  name="link_certificate" accept="image/*" class="custom-file-input" id="link_certificate" onchange="Imagelinkcertificate(event)">
                                            <label class="custom-file-label" for="link_certificate"></label>
                                            <input type="hidden" name="link_certificates" value="{{ $k->link_certificate }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="name_certificate"
                                                value="{{ old('name_certificate') ? old('name_certificate') : $k->name_certificate }}" id="name_certificate" placeholder="Nama Event">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="buyer_name" class="col-sm-2 col-form-label">Buyer Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="buyer_name"
                                                value="{{ old('buyer_name') ? old('buyer_name') : $k->buyer_name }}" id="buyer_name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="death_date" class="col-sm-2 col-form-label">Date of Death</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="death_date"
                                                value="{{ old('death_date') ? old('death_date') : $k->death_date }}" id="death_date">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="death_note" class="col-sm-2 col-form-label">Death Note</label>
                                        <div class="col-sm-10">
                                            <textarea name="death_note" class="form-control" rows="3">{{ old('death_note') ? old('death_note') : $k->death_note }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="year" class="col-sm-2 col-form-label">Year</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" name="year" style="width: 100%;">
                                                <option value=""></option>
                                                <option value="2018" {{ ($k->year=="2018")? "selected" : "" }}>2018</option>
                                                <option value="2019" {{ ($k->year=="2019")? "selected" : "" }}>2019</option>
                                                <option value="2020" {{ ($k->year=="2020")? "selected" : "" }}>2020</option>
                                                <option value="2021" {{ ($k->year=="2021")? "selected" : "" }}>2021</option>
                                                <option value="2022" {{ ($k->year=="2022")? "selected" : "" }}>2022</option>
                                                <option value="2023" {{ ($k->year=="2023")? "selected" : "" }}>2023</option>
                                                <option value="2024" {{ ($k->year=="2024")? "selected" : "" }}>2024</option>
                                            </select>
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
    $(document).ready(function(){
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

    var Imagephotohighlight = function(event) {
      var outputourBrands = document.getElementById('photo_highlight');
      outputourBrands.src = URL.createObjectURL(event.target.files[0]);
      outputourBrands.onload = function() {
      URL.revokeObjectURL(outputourBrands.src) // free memory
    }};

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

});


var rupiah = document.getElementById('pricesell_idr');
		rupiah.addEventListener('keyup', function(e){
		rupiah.value = formatRupiah(this.value, 'Rp. ');
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

    var yen = document.getElementById('pricesell_jpy');
		yen.addEventListener('keyup', function(e){
		yen.value = formatYen(this.value, '¥ ');
	});

    /* Fungsi */
    function formatYen(angka, prefix)
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
        return prefix == undefined ? rupiah : (rupiah ? '¥ ' + rupiah : '');
    }



</script>
@endsection
