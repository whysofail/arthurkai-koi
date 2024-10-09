@extends("layouts.apparthuradm")

@section("title", "Dashboard")

@section("css")

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <style>
        .content_box {
            border: 1px black solid;
            padding: 15px;
        }

        a:hover {
            color: black !important;
            background: #ffffff00 !important;
        }

        .swiper {
            height: 100%;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-content: center;
            background-position: center;
            background-size: cover;
            padding-bottom: 1.75em;
        }

        .swiper-slide img {
            display: block;
            height: 100%;
            width: 300px;
            object-fit: cover;
        }

        .swiper-button-prev:after,
        .swiper-rtl .swiper-button-next:after {
            content: 'prev';
            font-weight: bold;
            position: relative;
            left: 85%;
        }

        .swiper-button-next:after,
        .swiper-rtl .swiper-button-prev:after {
            content: 'next';
            font-weight: bold;
            position: relative;
            right: 85%;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            cursor: auto;
            background-color: #fff;
            border-color: #dee2e6;
            display: none !important;
        }

        div.dt-buttons {
            position: relative;
            float: left;
            padding-bottom: 15px;
            padding-left: 50px !important;
        }

        @media only screen and (max-width: 600px) {
            div.dt-buttons {
                position: relative;
                float: left;
                padding-left: 0px !important;
            }
        }
    </style>

    <style>
        .dataTables_paginate .paginate_button.previous,
        .dataTables_paginate .paginate_button.next {
            display: none;
        }
    </style>

@endsection

@php
    use Carbon\Carbon;
@endphp

@section("content")

    <!-- Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper" style="background: white;">

        <!-- Content Header (Page header) -->

        <div class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">

                        {{-- <h1 class="m-0">Chart</h1> --}}

                    </div><!-- /.col -->

                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="#"></a></li>

                            <li class="breadcrumb-item active"></li>

                        </ol>

                    </div><!-- /.col -->

                </div><!-- /.row -->

            </div><!-- /.container-fluid -->

        </div>

        <!-- /.content-header -->

        {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Chart</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section> --}}

        <!-- Main content -->

        <section class="content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-12 col-sm-1 col-md-1">

                        <a href="" style="color:black;">

                            <div class="info-box mb-3" style="background: #2c7abe; color: white;">

                                <div class="info-box-content">

                                    <span class="info-box-text">Koi</span>

                                    <span class="info-box-number">

                                        {{ $koitotal }}

                                    </span>

                                </div>

                                <!-- /.info-box-content -->

                            </div>

                        </a>

                        <!-- /.info-box -->

                    </div>

                    <div class="col-12 col-sm-1 col-md-1">

                        <a href="{{ route("cmskoi", ["layout" => "grid"]) }}" style="color:black;">

                            <div class=" mb-3 mt-4">

                                <div class="info-box-content" style="text-align: center">

                                    <i class="fa-solid fa-table-cells" style="font-size: 40px;"></i>

                                    {{-- <span class="info-box-number">
                                    {{ $koitotal }}
                                </span> --}}

                                </div>

                                <!-- /.info-box-content -->

                            </div>

                        </a>

                        <!-- /.info-box -->

                    </div>

                    <!-- /.col -->

                </div>

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

            <div class="container-fluid">

                <div class="row">

                    <div class="col-12">

                        <div class="card">

                            <div class="row" style="padding: 20px;">

                                <div class="col-sm-4">

                                    <a href="{{ route("cmskoiAdd") }}">

                                        <button type="button" class="btn btn-success"
                                            style=" background: green; color: white; "><b>+ Add KOI</b></button>

                                    </a>

                                </div>

                                {{-- <div class="col-sm-5">

                                    <div class="btn-group">

                                        <a href="#" type="button" class="btn btn-default btn-flat disabled"><i
                                                class="fas fa-filter"></i></a>

                                        <a href="{{ route("cmskoifilteraz") }}" type="button"
                                            class="btn btn-default btn-flat"><i class="fas fa-sort-alpha-down"></i></a>

                                        <a href="{{ route("cmskoifilterza") }}" type="button"
                                            class="btn btn-default btn-flat"><i class="fas fa-sort-alpha-up-alt"></i></a>

                                        <a href="{{ route("cmskoifilter19") }}" type="button"
                                            class="btn btn-default btn-flat"><i class="fas fa-sort-numeric-down"></i></a>

                                        <a href="{{ route("cmskoifilter91") }}" type="button"
                                            class="btn btn-default btn-flat"><i class="fas fa-sort-numeric-up-alt"></i></a>

                                        <a href="{{ route("cmskoifilterpricebuyhigh") }}" type="button"
                                            class="btn btn-default btn-flat"><i class="fas fa-money-bill"></i></a>

                                        <a href="{{ route("cmskoifilterpricebuylow") }}" type="button"
                                            class="btn btn-default btn-flat"><i class="fas fa-money-bill-alt"></i></a>

                                    </div>

                                </div> --}}

                                <div class="col-sm-3">

                                </div>

                            </div>

                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="dataKoi" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>

                                                <th>No</th>

                                                <th>Actions</th>

                                                <th>Photo</th>

                                                <th>Koi Code</th>

                                                <th>Nickname</th>

                                                <th>Variety</th>

                                                <th>Breeder</th>

                                                <th>Bloodline</th>

                                                <th>Gender</th>

                                                <th>Birth</th>

                                                <th>Age</th>

                                                <th>Purchase Date</th>

                                                <th>Size</th>

                                                <th>Seller Agent</th>

                                                <th>Handling Agent</th>

                                                <th>Buy Price</th>

                                                <th>Sell Price</th>

                                                <th>Keeping Location</th>
                                                

                                            </tr>

                                        </thead>

                                        <tbody>

                                        </tbody>

                                    </table>

                                </div>

                                <!-- /.card-body -->

                            </div>

                            <!-- /.card -->

                        </div>

                        <!-- /.col -->

                    </div>

                    <!-- /.row -->

                </div>

                <!-- /.content -->

            </div>

        </section>

        <!-- Control Sidebar -->

        <aside class="control-sidebar control-sidebar-dark">

            <!-- Control sidebar content goes here -->

        </aside>

        <!-- /.control-sidebar -->

    @endsection

    @section("script")

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                // Function to convert image URL to Base64
        
                var table = $('#dataKoi').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    ajax: {
                        url: '{!! route("getDataKoi") !!}',
                        type: 'GET'
                    },
                    columns: [
                        { data: 'index', name: 'index', orderable: false, searchable: false },
                        { data: 'action', name: 'action', orderable: false, searchable: false },
                        { data: 'photo', name: 'photo', orderable: false, searchable: false },
                        { data: 'code', name: 'code' },
                        { data: 'nickname', name: 'nickname' },
                        { data: 'variety', name: 'variety' },
                        { data: 'breeder', name: 'breeder' },
                        { data: 'bloodline', name: 'bloodline' },
                        { data: 'gender', name: 'gender' },
                        { data: 'birth', name: 'birthdate' },
                        { data: 'age', name: 'age', orderable: false, searchable: false },
                        { data: 'purchase_date', name: 'purchase_date' },
                        { data: 'size', name: 'size' },
                        { data: 'seller', name: 'seller' },
                        { data: 'handler', name: 'handler' },
                        { data: 'price_buy', name: 'price_buy', width: '15%' },
                        { data: 'price_sell', name: 'price_sell', width: '12.5%' },
                        { data: 'location', name: 'location' },
                        { data: 'photo_pdf', name: 'photo_pdf', visible: false },
                    ],
                    dom: 'lBfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: [2, 3, 4, 5, 6, 7, 9, 10, 11, 12, 13, 14, 15, 16]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            orientation: 'landscape',
                            pageSize: 'legal',
                            exportOptions: {
                                columns: [0, 18, 3, 4, 5, 6, 7, 9, 10, 11, 12, 13, 14, 15, 16]
                            },
                            customize: function(doc) {
                            let rows = doc.content[1].table.body;

                            for (let i = 1; i < rows.length; i++) {
                                if (rows[i][1].text) {
                                    const base64Image = rows[i][1].text;

                                    // Directly assign the Base64 string to the image property
                                    rows[i][1] = {
                                        image: base64Image,
                                        width: 100,
                                        height: 100,
                                    };
                                }
                            }

                            // Additional formatting for specific columns (e.g., price columns)
                            for (let i = 1; i < rows.length; i++) {
                                for (let j = 0; j < rows[i].length; j++) {
                                    const cellText = rows[i][j].text;
                                    if (cellText && cellText.includes('IDR:') && cellText.includes('JPY:')) {
                                        const parts = cellText.split('JPY:');
                                        rows[i][j].text = [parts[0].trim(), 'JPY:' + parts[1].trim()];
                                    }
                                }
                            }
                        },
                    },

                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [2, 3, 4, 5, 6, 7, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
                            }
                        }
                    ],
                    lengthMenu: [
                        [10, 25, 50, 100, 200, 500],
                        [10, 25, 50, 100, 200, 500]
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        var pageInfo = api.page.info();
                        api.column(0, { page: 'current' }).nodes().each(function(cell, i) {
                            cell.innerHTML = i + 1 + pageInfo.start;
                        });
                    }
                });
            });
        </script>
        
        <script>
            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 30,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    type: "fraction",
                    clickable: true,
                },
            });
        </script>

        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    @endsection
