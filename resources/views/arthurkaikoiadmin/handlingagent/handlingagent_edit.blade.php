@extends("layouts.apparthuradm")

@section("title", "Add")

@section("css")

    <!-- Select2 -->

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
    </style>

@endsection

@section("content")

    <!-- Main Sidebar Container -->

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

                    <li class="nav-item" style="border-top: 0.6px solid white; background: black;">

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

                    <li class="nav-item" style="border-top: 0.6px solid white;">

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

                        <h1 class="m-0">Agent</h1>

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

                        <h1>Agent</h1>

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

            @foreach ($agent as $a)
                <form action="{{ route("cmsagentUpdate") }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="id" value="{{ $a->id_agent }}">

                    <div class="col-sm-12">

                        <a href="{{ route("cmsagent") }}" class="btn btn-sm"
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

                                                <label for="agent_name" class="col-sm-2 col-form-label">agent_name</label>

                                                <div class="col-sm-10">

                                                    <input type="text" class="form-control" name="agent_name"
                                                        value="{{ old("agent_name") ? old("agent_name") : $a->agent_name }}"
                                                        id="agent_name">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">

                                            <div class="form-group row">

                                                <label for="agent_location"
                                                    class="col-sm-2 col-form-label">agent_location</label>

                                                <div class="col-sm-10">

                                                    <input type="text" class="form-control" name="agent_location"
                                                        value="{{ old("agent_location") ? old("agent_location") : $a->agent_location }}"
                                                        id="agent_location">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">

                                            <div class="form-group row">

                                                <label for="agent_website"
                                                    class="col-sm-2 col-form-label">agent_website</label>

                                                <div class="col-sm-10">

                                                    <input type="text" class="form-control" name="agent_website"
                                                        value="{{ old("agent_website") ? old("agent_website") : $a->agent_website }}"
                                                        id="agent_website">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">

                                            <div class="form-group row">

                                                <label for="agent_owner"
                                                    class="col-sm-2 col-form-label">agent_owner</label>

                                                <div class="col-sm-10">

                                                    <input type="text" class="form-control" name="agent_owner"
                                                        value="{{ old("agent_owner") ? old("agent_owner") : $a->agent_owner }}"
                                                        id="agent_owner">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-sm-12" style="margin-top: 10px">

                                            <div class="form-group row">

                                                <label for="agent_code" class="col-sm-2 col-form-label">agent_code</label>

                                                <div class="col-sm-10">

                                                    <input type="text" class="form-control" name="agent_code"
                                                        value="{{ old("agent_code") ? old("agent_code") : $a->agent_code }}"
                                                        id="agent_code">

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
        $(document).ready(function() {
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

            var Imagephotohighlight = function(event) {
                var outputourBrands = document.getElementById('photo_highlight');
                outputourBrands.src = URL.createObjectURL(event.target.files[0]);
                outputourBrands.onload = function() {
                    URL.revokeObjectURL(outputourBrands.src) // free memory
                }
            };

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

        });


        var rupiah = document.getElementById('pricesell_idr');
        rupiah.addEventListener('keyup', function(e) {
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

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

        var yen = document.getElementById('pricesell_jpy');
        yen.addEventListener('keyup', function(e) {
            yen.value = formatYen(this.value, '¥ ');
        });

        /* Fungsi */
        function formatYen(angka, prefix) {
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
            return prefix == undefined ? rupiah : (rupiah ? '¥ ' + rupiah : '');
        }
    </script>

@endsection
