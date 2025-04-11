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
                        <h1>Add Koi</h1>
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
            <form action="{{ route('cmskoistore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="status" value="Available">
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
                                    <h2>Base Koi Information</h2>
                                    <hr>
                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row">
                                            <label for="koicode" class="col-sm-2 col-form-label">Koi Code</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="koicode" id="koicode">
                                                <input class="form-control" name="koicode_display" id="koicode_display"
                                                    style="width: 100%;" disabled>
                                                </input>
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
                                                <select class="form-control select2 required" id="variety-select"
                                                    name="variety" style="width: 100%;" required>
                                                    <option selected="selected" value="" disabled>Selected Variety
                                                    </option>
                                                    @foreach ($variety as $v)
                                                        <option value="{{ $v->id }}" data-code='{{ $v->code }}'>
                                                            {{ $v->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row">
                                            <label for="breeder" class="col-sm-2 col-form-label">Breeder</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" id="breeder-select" name="breeder"
                                                    style="width: 100%;" required>
                                                    <option selected="selected" value="" disabled>Selected Breeder
                                                    </option>
                                                    @foreach ($breeder as $b)
                                                        <option value="{{ $b->id }}" data-code="{{ $b->code }}">
                                                            {{ $b->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row">
                                            <label for="bloodline" class="col-sm-2 col-form-label">Bloodline</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" name="bloodline"
                                                    style="width: 100%;" required>
                                                    <option selected="selected" value="" disabled>Selected Bloodline
                                                    </option>
                                                    @foreach ($bloodline as $b)
                                                        <option value="{{ $b->id }}">{{ $b->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row">
                                            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" name="gender" style="width: 100%;"
                                                    required>
                                                    <option value="" selected="selected" disabled>Selected Gender
                                                    </option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Unknown">Unknown</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row">
                                            <label for="birthdate" class="col-sm-2 col-form-label">Birthdate</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="birthdate"
                                                    value="{{ old('birthdate') }}" id="birthdate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row">
                                            <label for="size" class="col-sm-2 col-form-label">Size</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="size"
                                                    value="{{ old('size') }}" id="size">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row">
                                            <label for="purchase_date" class="col-sm-2 col-form-label">Purchase
                                                Date</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="purchase_date"required
                                                    value="{{ old('purchase_date') }}" id="purchase_date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row">
                                            <label for="seller" class="col-sm-2 col-form-label">Seller Agent</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" name="seller" style="width: 100%;"
                                                    required>
                                                    <option selected="selected" value="">Selected Seller Agent
                                                    </option>
                                                    @foreach ($agent as $a)
                                                        <option value="{{ $a->owner }}">
                                                            {{ $a->owner }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row">
                                            <label for="handler" class="col-sm-2 col-form-label">Handling Agent</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" name="handler" style="width: 100%;"
                                                    required>
                                                    <option selected="selected" value="" disabled>Selected Handling
                                                        Agent
                                                        @foreach ($agent as $a)
                                                    <option value="{{ $a->owner }}">
                                                        {{ $a->owner }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row" style="margin-top: 10px">
                                            <label for="pricebuy_idr" class="col-sm-2 col-form-label">Price Buy
                                                (IDR)</label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="pricebuy_idr" class="form-control"
                                                    name="pricebuy_idr" value="{{ old('pricebuy_idr') }}">
                                                <input type="text" id="pricebuy_idr_display" class="form-control"
                                                    name="pricebuy_idr_display"
                                                    value="{{ old('pricebuy_idr_display') }}">
                                            </div>

                                            <label for="pricebuy_jpy" class="col-sm-2 col-form-label">Price Buy
                                                (JPY)</label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="pricebuy_jpy" class="form-control"
                                                    name="pricebuy_jpy" value="{{ old('pricebuy_jpy') }}">
                                                <input type="text" id="pricebuy_jpy_display" class="form-control"
                                                    name="pricebuy_jpy_display"
                                                    value="{{ old('pricebuy_jpy_display') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row">
                                            <label for="location" class="col-sm-2 col-form-label">Keeping Location</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="location"
                                                    value="{{ old('location') }}" id="location">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="form-group row" style="margin-top: 10px">
                                            <label for="pricesell_idr" class="col-sm-2 col-form-label">Sell Price
                                                (IDR)</label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="pricesell_idr" class="form-control"
                                                    name="pricesell_idr" value="{{ old('pricesell_idr') }}">
                                                <input type="text" id="pricesell_idr_display" class="form-control"
                                                    name="pricesell_idr_display"
                                                    value="{{ old('pricesell_idr_display') }}">
                                            </div>
                                            <label for="pricesell_jpy" class="col-sm-2 col-form-label">Sell Price
                                                (JPY)</label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="pricesell_jpy" class="form-control"
                                                    name="pricesell_jpy" value="{{ old('pricesell_jpy') }}">
                                                <input type="text" id="pricesell_jpy_display" class="form-control"
                                                    name="pricesell_jpy_display"
                                                    value="{{ old('pricesell_jpy_display') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <h2>Koi Media</h2>
                                        <hr>
                                        <div class="input-group row">
                                            <label for="link_photo" class="col-sm-2 col-form-label pt-4">Link
                                                Photo</label>
                                            <div class="col-sm-10" id="satu">
                                                <div class="form-group">
                                                    <img width="125" id="link_photo" class="img-thumbnailp">
                                                    <div class="input-group realprocodeLP control-group lst incrementLP">
                                                        <input type="file" name="link_photo[]"
                                                            class="myfrm form-control" onchange="Imagelinkphoto(event)"
                                                            accept="image/*">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success btn-clickLP" type="button"><i
                                                                    class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                                        </div>
                                                    </div>
                                                    <div class="cloneLP hide" style="display: none;">
                                                        <div class="realprocodeLP control-group lst input-group"
                                                            style="margin-top:10px">
                                                            <input type="file" name="link_photo[]"
                                                                class="myfrm form-control"
                                                                onchange="Imagelinkphoto(event)">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-danger" type="button"><i
                                                                        class="fldemo glyphicon glyphicon-remove"></i>
                                                                    Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="input-group row">
                                            <label for="link_video" class="col-sm-2 col-form-label pt-4">Link
                                                Video</label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <img width="125" id="link_video" class="img-thumbnailv">
                                                    <div class="input-group realprocodeLV control-group lst incrementLV">
                                                        <input type="file" name="link_video[]"
                                                            class="myfrm form-control" onchange="link_video(event)"
                                                            accept="video/mp4,video/x-m4v,video/*">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-success btn-clickLV" type="button"><i
                                                                    class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                                        </div>
                                                    </div>
                                                    <div class="cloneLV hide" style="display: none;">
                                                        <div class="realprocodeLV control-group lst input-group"
                                                            style="margin-top:10px">
                                                            <input type="file" name="link_video[]"
                                                                class="myfrm form-control" onchange="link_video(event)"
                                                                accept="video/mp4,video/x-m4v,video/*">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-danger" type="button"><i
                                                                        class="fldemo glyphicon glyphicon-remove"></i>
                                                                    Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="input-group row">
                                            <label for="link_trophy" class="col-sm-2 col-form-label">Trophy File</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="link_trophy"
                                                    value="{{ old('link_trophy') }}" id="link_trophy"
                                                    style="height: auto !important;" accept="image/*">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" style="margin-top: 10px">
                                        <div class="input-group row">
                                            <label for="link_certificate" class="col-sm-2 col-form-label">
                                                Certificate File</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="link_certificate"
                                                    value="{{ old('link_certificate') }}" id="link_certificate"
                                                    style="height: auto !important;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 15px">
                                        <h2>Additional Information</h2>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="date_sell" class="col-sm-2 col-form-label">Date Of Sell</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="date_sell"
                                                    value="{{ old('date_sell') }}" id="date_sell">
                                            </div>
                                        </div>
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
                                                <input class="form-control" name="death_date"
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
        $('#variety-select').select2();
        $('#variety-select').attr("required", "required");
    </script>

    <script>
        $(document).ready(function() {
            $('#image').on('change', function() {
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });

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

            function convertDateFormat(date) {
                if (date) {
                    let parts = date.split('-');
                    if (parts.length === 2) {
                        let year = parts[0].slice(-2);
                        let month = parts[1];
                        return `${month}${year}`;
                    }
                }
                return '';
            }

            function updateKoiCode() {
                let selectedBreeder = $('#breeder-select').find('option:selected');
                let selectedVariety = $('#variety-select').find('option:selected');
                let date = $('#purchase_date').val()
                let convertedDate = convertDateFormat(date);
                let breederCode = selectedBreeder.data('code') || '';
                let varietyCode = selectedVariety.data('code') || '';
                let combine = varietyCode + breederCode + convertedDate
                $('#koicode').val(combine)
                $('#koicode_display').val(combine)
            }
            $('#variety-select, #breeder-select, #purchase_date').change(function() {
                updateKoiCode();
            });

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

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

        function formatJPY(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                jpy = split[0].substr(0, sisa),
                yen = split[0].substr(sisa).match(/\d{3}/gi);

            if (yen) {
                separator = sisa ? '' : '';
                jpy += separator + yen.join('');
            }
            jpy = split[1] != undefined ? jpy + ',' + split[1] : jpy;
            return prefix == undefined ? jpy : (jpy ? '¥ ' + jpy : '');
        }

        let sellIdr = document.getElementById('pricesell_idr');
        let sellIdrDisplay = document.getElementById('pricesell_idr_display');
        sellIdrDisplay.addEventListener('input', function(e) {
            let rawValue = this.value.replace(/\D/g, ''); // Remove non-numeric characters
            sellIdr.value = rawValue
            sellIdrDisplay.value = formatRupiah(this.value, 'Rp. ');
        });

        let sellJpy = document.getElementById('pricesell_jpy');
        let sellJpyDisplay = document.getElementById('pricesell_jpy_display');
        sellJpyDisplay.addEventListener('input', function(e) {
            let rawValue = this.value.replace(/\D/g, ''); // Remove non-numeric characters
            sellJpy.value = rawValue;
            sellJpyDisplay.value = formatJPY(this.value, '¥ ');
        });

        let buyIdr = document.getElementById('pricebuy_idr');
        let buyIdrDisplay = document.getElementById('pricebuy_idr_display');
        buyIdrDisplay.addEventListener('input', function(e) {
            let rawValue = this.value.replace(/\D/g, ''); // Remove non-numeric characters
            buyIdr.value = rawValue;
            // Format the value for display using formatRupiah function
            let formattedValue = formatRupiah(rawValue, 'Rp. ');
            buyIdrDisplay.value = formattedValue;
        });
        let buyJpy = document.getElementById('pricebuy_jpy');
        let buyJpyDisplay = document.getElementById('pricebuy_jpy_display');
        buyJpyDisplay.addEventListener('input', function(e) {
            let rawValue = this.value.replace(/\D/g, ''); // Remove non-numeric characters
            buyJpy.value = rawValue;
            buyJpyDisplay.value = formatJPY(this.value, '¥ ');
        });

        // Function to format Japanese Yen
        function formatJapaneseYen(number) {
            return new Intl.NumberFormat('ja-JP', {
                style: 'currency',
                currency: 'JPY'
            }).format(number);
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
        function photohighlight(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = event.target.parentElement.parentElement.parentElement.querySelector('.img-thumbnailh');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function Imagelinkphoto(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = event.target.parentElement.parentElement.parentElement.querySelector('.img-thumbnailp');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function link_video(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = event.target.parentElement.parentElement.parentElement.querySelector('.img-thumbnailv');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        $(document).ready(function() {
            $(".btn-clickPH").click(function() {
                var lsthmtl = $(".clonePH").html();
                $(".incrementPH").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".realprocodePH").remove();
            });
        });

        $(document).ready(function() {
            $(".btn-clickLP").click(function() {
                var lsthmtl = $(".cloneLP").html();
                $(".incrementLP").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".realprocodeLP").remove();
            });
        });

        $(document).ready(function() {
            $(".btn-clickLV").click(function() {
                var lsthmtl = $(".cloneLV").html();
                $(".incrementLV").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".realprocodeLV").remove();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Fetch pre-populated search suggestions on page load
            $.ajax({
                url: "{{ url('/koi') }}",
                type: "GET",
                success: function(data) {
                    if (data.suggestions.length > 0) {
                        $('#results').empty();
                        $.each(data.suggestions, function(index, item) {
                            $('#results').append(
                                '<li class="list-group-item list-group-item-action">' + item
                                .name + '</li>');
                        });
                    }
                }
            });
            // Handle live search
            $('#search').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 2) {
                    $.ajax({
                        url: "{{ url('/koi/search') }}",
                        type: "GET",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#results').empty();
                            if (data.length > 0) {
                                $.each(data, function(index, item) {
                                    $('#results').append(
                                        '<li class="list-group-item list-group-item-action">' +
                                        item.name + '</li>');
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

            // Hide results on clicking outside
            $(document).click(function(e) {
                if (!$(e.target).closest('.position-relative').length) {
                    $('#results').empty();
                }
            });
        });
    </script>
    <script>
        flatpickr("#purchase_date", {
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, // abbreviates month names
                    dateFormat: "Y-m", // format to match <input type="month">
                    altFormat: "F Y", // what user sees (optional)
                    theme: "light"
                })
            ]
        });

        flatpickr("#birthdate", {
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, // abbreviates month names
                    dateFormat: "Y-m", // format to match <input type="month">
                    altFormat: "F Y", // what user sees (optional)
                    theme: "light"
                })
            ]
        });

        flatpickr("#date_sell", {
            dateFormat: "Y-m-d" // or your preferred format
        });

        flatpickr("#death_date", {
            dateFormat: "Y-m-d" // or your preferred format
        });
    </script>


@endsection
