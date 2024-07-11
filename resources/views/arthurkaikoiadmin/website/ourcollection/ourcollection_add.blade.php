@extends('layouts.apparthuradm')
@section('title', 'Our Collection')
@section('css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
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

                <li class="nav-item" style="border-top: 0.6px solid white; background: black;">
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
                    <h1 class="m-0">Our Collection</h1>
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
                    <h1>Our Collection</h1>
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
        <form action="{{ route('cmsourcollectionStore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12">
                <a href="{{ route('cmsourcollection') }}" class="btn btn-sm"
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
                                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title"
                                                value="{{ old('title') }}" id="title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="form-group row">
                                        <label for="koi_id" class="col-sm-2 col-form-label">Select Koi</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Search Koi" id="koi_search">
                                        <input type="hidden" name="koi_id" id="koi_id">
                                                <ul id="results" class="list-group position-absolute w-100 search-dropdown" style="z-index: 1000; max-height:200px; overflow-y:auto;"></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: 10px">
                                    <div class="input-group row">
                                        <label for="image"
                                            class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="image"
                                                value="{{ old('image') }}" id="image"
                                                style="height: auto !important;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: 20px;">
                                    <label>Deskripsi Singkat</label>
                                    <textarea id="deskripsi_singkat" name="deskripsi_singkat" class="form-control" rows="7" placeholder="">{{ old('deskripsi_singkat') }}</textarea>
                                </div>
                                <div class="col-sm-12" style="margin-top: 20px;">
                                    <label>Deskripsi</label>
                                    <textarea id="deskripsi" name="deskripsi" rows="7">
                                      {{ old('deskripsi') }}
                                    </textarea>
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
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(document).ready(function(){

    $('#deskripsi').summernote({
            height: 400,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ]
    });
});
</script>
<script>
    $(document).ready(function() {
        // Fetch pre-populated search suggestions on focus/click
        $('#koi_search').on('focus click', function() {
            $.ajax({
                url: "{{ url('/api/koi') }}",
                type: "GET",
                success: function(data) {
                    if (data.suggestions.length > 0) {
                        $('#results').empty();
                        $.each(data.suggestions, function(index, item) {
                            $('#results').append('<li class="list-group-item list-group-item-action" data-id="' + item.id_koi + '">' + 'ID : ' + item.id_koi + ' | Code : ' + item.koi_code + '</li>');
                        });
                    }
                }
            });
        });

        // Handle live search
        $('#koi_search').on('keyup', function() {
            let query = $(this).val();
            if (query.length > 1) {
                $.ajax({
                    url: "{{ url('/api/koi/search') }}",
                    type: "GET",
                    data: { query: query },
                    success: function(data) {
                        $('#results').empty();
                        if (data.length > 0) {
                            $.each(data, function(index, item) {
                                $('#results').append('<li class="list-group-item list-group-item-action" data-id="' + item.id_koi + '">' + 'ID : '  + item.id_koi + ' | Code : ' + item.koi_code + '</li>');
                            });
                        } else {
                            $('#results').append('<li class="list-group-item">No results found</li>');
                        }
                    }
                });
            } else {
                $('#results').empty();
            }
        });

        // Hide results on clicking outside
        $(document).click(function(e) {
            if (!$(e.target).closest('.position-relative').length) {
                $('#results').empty();
            }
        });

        // Fill the input field when a suggestion is clicked
        $('#results').on('click', '.list-group-item', function() {
            let selectedKoiCode = $(this).text().split(' | Code : ')[1];
            let selectedKoiId = $(this).data('id');
            $('#koi_search').val(selectedKoiCode); // Set the text input with the Koi code
            $('#koi_id').val(selectedKoiId); // Set the hidden input with the Koi ID (integer)
            $('#results').empty();
            // Optionally, do something with the selected koi ID
            console.log('Selected Koi ID:', selectedKoiId);
        });
    });
</script>


@endsection
