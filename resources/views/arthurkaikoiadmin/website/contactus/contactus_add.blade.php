@extends("layouts.apparthuradm")

@section("title", "About Us")

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
                        <h1 class="m-0">Contact Us</h1>
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
                        <h1>Contact Us</h1>
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
            <form action="{{ route("cmscontactusStore") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12">
                    <a href="{{ route("cmscontactus") }}" class="btn btn-sm"
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
                                            <label for="nama" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama"
                                                    value="{{ old("nama") }}" id="nama">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="email"
                                                    value="{{ old("email") }}" id="email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row">
                                            <label for="no_wa" class="col-sm-2 col-form-label">WhatsApp Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="no_wa"
                                                    value="{{ old("no_wa") }}" id="no_wa">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-top: 20px;">
                                        <label>Message</label>
                                        <textarea id="message" name="message" class="form-control" rows="7" placeholder=""> {{ old("message") ? old("message") : "" }}</textarea>
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

@endsection
