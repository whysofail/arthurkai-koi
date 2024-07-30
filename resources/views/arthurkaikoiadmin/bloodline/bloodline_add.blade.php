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

@section("content")
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

                        <h1>Bloodline</h1>

                    </div>

                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a style="color: black">Dashboard</a></li>

                            <li class="breadcrumb-item active" style="color: red">Add Bloodline</li>

                        </ol>

                    </div>

                </div>

            </div><!-- /.container-fluid -->

        </section>

        <!-- Main content -->

        <section class="content">
            <form action="{{ route("cmsbloodlineStore") }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="col-sm-12">

                    <a href="{{ route("cmsbloodline") }}" class="btn btn-sm"
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

                                            <label for="bloodline_name" class="col-sm-2 col-form-label">Bloodline

                                                Name</label>

                                            <div class="col-sm-10">

                                                <input type="text" class="form-control" name="bloodline_name"
                                                    value="{{ old("bloodline_name") }}" id="bloodline_name">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-sm-12" style="margin-top: 10px">

                                        <div class="form-group row">

                                            <label for="bloodline_code" class="col-sm-2 col-form-label">Bloodline

                                                Code</label>

                                            <div class="col-sm-10">

                                                <input type="text" class="form-control" name="bloodline_code"
                                                    value="{{ old("bloodline_code") }}" id="bloodline_code">

                                            </div>

                                        </div>

                                    </div>

                                    {{-- <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row">
                                            <label for="variety" class="col-sm-2 col-form-label">Variety</label>

                                            <div class="col-sm-10">

                                                <input type="text" class="form-control" name="variety"
                                                    value="{{ old("variety") }}" id="variety">
                                            </div>
                                        </div>
                                    </div> --}}

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

    <!-- Select2 -->

    <script src="{{ asset("plugins/select2/js/select2.full.min.js") }}"></script>
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Form Error',
                    body: '{{ $error }} \n Please check the form and try again.',
                    autohide: true,
                    delay: 5000,
                });
            @endforeach
        @endif
    </script>
    <script>
        $(document).ready(function() {
            $('#image').on('change', function() {
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });

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

        // Function to format Japanese Yen
        function formatJapaneseYen(number) {
            return new Intl.NumberFormat('ja-JP', {
                style: 'currency',
                currency: 'JPY'
            }).format(number);
        }

        // // Add an event listener to the input field
        // document.getElementById('pricesell_jpy').addEventListener('input', function (event) {
        //     // Get the input value as a number
        //     let inputValue = parseFloat(event.target.value.replace(/[^\d.-]/g, ''));

        //     // Check if the input is a valid number
        //     if (!isNaN(inputValue)) {
        //         // Format the number as Japanese Yen and update the input value
        //         event.target.value = formatJapaneseYen(inputValue);
        //     } else {
        //         // If the input is not a valid number, clear the input value
        //         event.target.value = '';
        //     }
        // });
    </script>

@endsection
