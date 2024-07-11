@extends("layouts.apparthuradm")

@section("title", "News")

@section("css")

    <!-- summernote -->

    <link rel="stylesheet" href="{{ asset("plugins/summernote/summernote-bs4.min.css") }}">

@endsection

@section("content")

    <!-- Main Sidebar Container -->

    <aside class="main-sidebar sidebar-dark-primary elevation-4"
        style="background: #2c7abe; overflow-y: scroll; overflow-x: hidden;">

        <!-- Brand Logo -->

        <a href="{{ route("dashboard") }}" class="brand-link"
            style="text-align: center; padding-top: 22px; padding-bottom: 22px;">

            <img width="55" src="{{ asset("images/logo/koilogo.png") }}">

        </a>

        <!-- Sidebar -->

        <div class="sidebar" style="background: #2c7abe">

            <!-- Sidebar Menu -->

            <nav class="mt-2">

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item" style="border-bottom: 3px solid #0186fc; display:flex;">

                        <a href="{{ route("cmskoi") }}" class="nav-link" style="height: 50px;">

                            <i class="whitefont nav-icon far fa-image" style="font-size: 18px !important;"></i>

                            <p class="whitefont" style="font-size: 18px !important;">

                                Koi

                            </p>

                        </a>

                        <a href="{{ route("cmskoigrid") }}" class="nav-link" style="text-align: right; height: 50px;">

                            <i class="fa-solid fa-table-cells" style="font-size: 18px !important; color: white"></i>

                            <p class="whitefont" style="font-size: 18px !important;">

                                Koi<span> Grid</span>

                            </p>

                        </a>

                    </li>

                </ul>

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false" style="margin-top: 20px;">

                    <li class="nav-header whitefontlist"><i class="fas fa-cog"></i> <span style="margin-left: 10px">Setting

                            Koi</span></li>

                    <li class="nav-item" style="border-top: 0.6px solid white;">

                        <a href="{{ route("cmsvariety") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                Variety

                            </p>

                        </a>

                    </li>

                    <li class="nav-item" style="border-top: 0.6px solid white;">

                        <a href="{{ route("cmsbloodline") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                Bloodline

                            </p>

                        </a>

                    </li>

                    <li class="nav-item" style="border-top: 0.6px solid white;">

                        <a href="{{ route("cmsbreeder") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                Breeder

                            </p>

                        </a>

                    </li>

                    <li class="nav-item" style="border-top: 0.6px solid white; border-bottom: 0.6px solid white;">

                        <a href="{{ route("cmsagent") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                Agent

                            </p>

                        </a>

                    </li>

                </ul>

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false" style="margin-top: 20px;">

                    <li class="nav-header whitefontlist"><i class="fas fa-cog"></i> <span style="margin-left: 10px">Live

                            Website Koi</span></li>

                    <li class="nav-item" style="border-top: 0.6px solid white;">

                        <a href="{{ route("cmsourcollection") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                Our Collection

                            </p>

                        </a>

                    </li>

                    <li class="nav-item" style="border-top: 0.6px solid white; background: black;">

                        <a href="{{ route("cmsnews") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                News

                            </p>

                        </a>

                    </li>

                    <li class="nav-item" style="border-top: 0.6px solid white;">

                        <a href="{{ route("cmsaboutus") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                About Us

                            </p>

                        </a>

                    </li>

                    <li class="nav-item" style="border-top: 0.6px solid white; border-bottom: 0.6px solid white;">

                        <a href="{{ route("cmscontactus") }}" class="nav-link">

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

                        <h1 class="m-0">News</h1>

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

                        <h1>News</h1>

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

            @foreach ($news as $n)
                <form action="{{ route("cmsnewsUpdate") }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="id" value="{{ $n->id_news }}">

                    <div class="col-sm-12">

                        <a href="{{ route("cmsnews") }}" class="btn btn-sm"
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

                                                <label for="title" class="col-sm-2 col-form-label">title</label>

                                                <div class="col-sm-10">

                                                    <input type="text" class="form-control" name="title"
                                                        value="{{ old("title") ? old("title") : $n->title }}"
                                                        id="title">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-12">

                                            <label>Image</label><br>

                                            <div class="input-group">

                                                <img src="{{ asset("img/koi/website/news/" . $n->image) }}"
                                                    id="imageAbout" class="img-thumbnail" style="width: 200px;">

                                                <div class="custom-file">

                                                    <input type="file" name="image" accept="image/*"
                                                        class="custom-file-input" id="imageInput"
                                                        onchange="promoImage(event)">

                                                    <label class="custom-file-label" for="imageInput"
                                                        id="imageLabel">{{ old("image") ? old("image") : $n->image }}</label>

                                                    <input type="hidden" name="images" value="{{ $n->image }}">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-12" style="margin-top: 20px;">

                                            <label>Deskripsi Singkat</label>

                                            <textarea id="deskripsi_singkat" name="deskripsi_singkat" class="form-control" rows="7" placeholder=""> {{ old("deskripsi_singkat") ? old("deskripsi_singkat") : $n->deskripsi_singkat }}</textarea>

                                        </div>

                                        <div class="col-sm-12" style="margin-top: 20px;">

                                            <label>Deskripsi</label>

                                            <textarea id="deskripsi" name="deskripsi" rows="7">
                                        {{ old("deskripsi") ? old("deskripsi") : $n->deskripsi }}
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
