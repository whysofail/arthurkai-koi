@extends("layouts.apparthuradm")

@section("title", "Our Collection")

@section("css")

    <!-- summernote -->

    <link rel="stylesheet" href="{{ asset("plugins/summernote/summernote-bs4.min.css") }}">

@endsection

@section("content")
    <!-- Main Sidebar Container -->
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

            <div class="container-fluid">

                <div class="row">

                    <div class="col-12 col-sm-12 col-md-12">

                        <div id="chartUser"></div>

                    </div>

                </div>

                </a>

                <!-- /.row -->

            </div>

        </section>

        <!-- Main content -->

        <section class="content">

            @foreach ($ourcollection as $o)
                <form action="{{ route("cmsourcollectionUpdate") }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="id" value="{{ $o->id }}">

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
                                                        value="{{ old("title") ? old("title") : $o->title }}"
                                                        id="title">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">

                                            <div class="form-group row">

                                                <label for="koi_id" class="col-sm-2 col-form-label">Select Koi</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Search Koi"
                                                        id="koi_search" value="{{ old("koi_id") }}" autocomplete="off">
                                                    <input type="hidden" name="koi_id" id="koi_id"
                                                        value="{{ old("koi_id") ?? $o->koi_id }}">
                                                    <ul id="results"
                                                        class="list-group position-absolute w-100 search-dropdown"
                                                        style="z-index: 1000; max-height:200px; overflow-y:auto;"></ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 20px;">
                                            <label>Description</label>
                                            <textarea id="description" name="description" rows="7">
                                        {{ $o->description }}
                                    </textarea>
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

@section("script")

    <!-- Select2 -->

    <script src="{{ asset("plugins/select2/js/select2.full.min.js") }}"></script>
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
            // Handle live search
            $('#koi_search').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 1) {
                    $.ajax({
                        url: "{{ url("/api/koi/search") }}",
                        type: "GET",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#results').empty();
                            if (data.length > 0) {
                                $.each(data, function(index, item) {
                                    $('#results').append(
                                        '<li class="list-group-item list-group-item-action" data-id="' +
                                        item.id + '">' + item.code + ' | ' + item
                                        .variety.name + ' | ' + item.breeder.name +
                                        '</li>');
                                });
                            } else {
                                $('#results').append(
                                    '<li class="list-group-item">No results found</li>');
                            }
                        }
                    });
                } else {
                    $('#results').empty();
                }
            });

            // Fetch pre-populated search suggestions on focus/click
            $('#koi_search').on('focus click', function() {
                $.ajax({
                    url: "{{ url("/api/koi") }}",
                    type: "GET",
                    success: function(data) {
                        if (data.suggestions.length > 0) {
                            $('#results').empty();
                            $.each(data.suggestions, function(index, item) {
                                $('#results').append(
                                    '<li class="list-group-item list-group-item-action" data-id="' +
                                    item.id + '">' + item.code + ' | ' + item
                                    .variety
                                    .name + ' | ' + item.breeder
                                    .name +
                                    '</li>');
                            });
                        }
                    }
                });
            });

            // Hide results on clicking outside
            $(document).click(function(e) {
                if (!$(e.target).closest('.position-relative').length) {
                    $('#results').empty();
                }
            });

            // Fill the input field when a suggestion is clicked
            $('#results').on('click', '.list-group-item', function() {
                let selectedKoiCode = $(this).text()
                let selectedKoiId = $(this).data('id');
                $('#koi_search').val(selectedKoiCode); // Set the text input with the Koi code
                $('#koi_id').val(selectedKoiId); // Set the hidden input with the Koi ID (integer)
                $('#results').empty();
                // Optionally, do something with the selected koi ID
                console.log('Selected Koi ID:', selectedKoiId);
            });

            // Set initial value for koi_search based on prefilled koi_id
            let initialKoiId = @json($o->koi_id); // Embed initial Koi ID from PHP
            if (initialKoiId) {
                $.ajax({
                    url: "{{ url("/api/koi/") }}/" + initialKoiId, // Correctly construct URL
                    type: "GET",
                    success: function(data) {
                        if (data.koi) {
                            $('#koi_search').val(
                                `${data.koi.code} | ${data.koi.variety.name} | ${data.koi.breeder.name}`
                            );
                        }
                    }
                });
            }
        });
    </script>

@endsection
