@extends("layouts.apparthuradm")

@section("title", "Contact Us")

@section("css")

    <!-- summernote -->

    <link rel="stylesheet" href="{{ asset("plugins/summernote/summernote-bs4.min.css") }}">

    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
    </style>

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

            @foreach ($contactus as $c)
                <form action="{{ route("cmscontactusUpdate") }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="id" value="{{ $c->id }}">

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

                                                <label for="name" class="col-sm-2 col-form-label">Name</label>

                                                <div class="col-sm-10">

                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ old("name") ? old("name") : $c->name }}"
                                                        id="nama">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ old("email") ? old("email") : $c->email }}"
                                                        id="email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">

                                            <div class="form-group row">
                                                <label for="whatsapp" class="col-sm-2 col-form-label">WhatsApp</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="whatsapp"
                                                        value="{{ old("whatsapp") ? old("whatsapp") : $c->whatsapp }}"
                                                        id="no_wa">
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">
                                            <div class="form-group row">
                                                <label for="message" class="col-sm-2 col-form-label">Message</label>

                                                <div class="col-sm-10">

                                                    <input type="text" class="form-control" name="message"
                                                        value="{{ old("message") ? old("message") : $c->message }}"
                                                        id="message">

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

@section("script")

    <!-- Select2 -->

    <script src="{{ asset("plugins/select2/js/select2.full.min.js") }}"></script>

    <script>
        var promoImage = function(event) {
            var outputImage = document.getElementById('imageAbout');
            var label = document.getElementById('imageLabel');
            var file = event.target.files[0];

            if (file) {
                outputImage.src = URL.createObjectURL(file);
                outputImage.onload = function() {
                    URL.revokeObjectURL(outputImage.src); // Free memory
                };
                label.textContent = file.name; // Update the label text
            }
        };
    </script>

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
