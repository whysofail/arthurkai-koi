@extends("layouts.apparthuradm")

@section("title", "Our Collection Add")

@section("css")

    <!-- summernote -->

    <link rel="stylesheet" href="{{ asset("plugins/summernote/summernote-bs4.min.css") }}">

@endsection
@section("content")
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
            </div>
        </section>

        <!-- Main content -->

        <section class="content">
            <form action="{{ route("cmsourcollectionStore") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12">
                    <a href="{{ route("cmsourcollection") }}" class="btn btn-sm"
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
                                                    value="{{ old("title") }}" id="title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row">
                                            <label for="koi_id" class="col-sm-2 col-form-label">Koi</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="Search Koi"
                                                    id="koi_search" autocomplete="off">
                                                <input type="hidden" name="koi_id" id="koi_id">
                                                <ul id="results"
                                                    class="list-group position-absolute w-100 search-dropdown"
                                                    style="z-index: 1000; max-height:200px; overflow-y:auto;"></ul>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="input-group row">
                                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="image"
                                                    value="{{ old("image") }}" id="image"
                                                    style="height: auto !important;">
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-sm-12" style="margin-top: 20px;">
                                        <label>Deskripsi Singkat</label>
                                        <textarea id="deskripsi_singkat" name="deskripsi_singkat" class="form-control" rows="7" placeholder="">{{ old("deskripsi_singkat") }}</textarea>
                                    </div> --}}

                                    <div class="col-sm-12" style="margin-top: 20px;">
                                        <label>Description</label>
                                        <textarea id="description" name="description" rows="7">
                                      {{ old("description") }}
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

@section("script")

    <!-- Summernote -->

    <script src="{{ asset("plugins/summernote/summernote-bs4.min.js") }}"></script>
    <script>
        $(document).ready(function() {

            $('#description').summernote({
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
        $('#results').empty();  // Clear previous results
        $.ajax({
            url: "{{ url('/api/koi') }}",
            type: "GET",
            success: function(data) {
                if (data.data.length > 0) {
                    console.log(data)
                    $.each(data.data, function(index, item) {
                        $('#results').append(
                            '<li class="list-group-item list-group-item-action" data-id="' +
                            item.id + '">' + item.code + ' | ' + item.variety.name ?? '' + ' | ' + item.breeder.name + '</li>'
                        );
                    });
                }
            }
        });
    });

    // Handle live search
    $('#koi_search').on('keyup', function() {
        let query = $(this).val();
        if (query.length >= 2) {  // Ensure at least 2 characters
            $.ajax({
                url: "{{ url('/api/koi/search') }}",
                type: "GET",
                data: {
                    query: query
                },
                success: function(data) {
                    console.log(data)
                    $('#results').empty();
                    if (data.data.length > 0) {
                        $.each(data.data, function(index, item) {
                            $('#results').append(
                                '<li class="list-group-item list-group-item-action" data-id="' +
                                item.id + '">' + item.code + ' | ' + item.variety_name + ' | ' + item.breeder_name + '</li>'
                            );
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

    // Hide results when clicking outside
    $(document).click(function(e) {
        if (!$(e.target).closest('.col-sm-10').length) {  // Ensure this selector matches your input container
            $('#results').empty();
        }
    });

    // Fill the input field when a suggestion is clicked
    $('#results').on('click', '.list-group-item', function() {
        let selectedText = $(this).text(); // Get the full text of the selected item
        let selectedKoiId = $(this).data('id');
        $('#koi_search').val(selectedText); // Set the text input with the full text
        $('#koi_id').val(selectedKoiId); // Set the hidden input with the Koi ID
        $('#results').empty(); // Clear the results dropdown
    });
    });

    </script>

@endsection
