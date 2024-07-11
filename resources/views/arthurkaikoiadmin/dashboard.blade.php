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
            width: 300px;
            height: 100%;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
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

                        <a href="{{ route("cmskoi") }}" class="nav-link" style="background: black; height: 50px;">

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

                        <a href="{{ route("cmskoigrid") }}" style="color:black;">

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

                                <div class="col-sm-5">

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
                                            class="btn btn-default btn-flat"><i
                                                class="fas fa-sort-numeric-up-alt"></i></a>

                                        <a href="{{ route("cmskoifilterpricebuyhigh") }}" type="button"
                                            class="btn btn-default btn-flat"><i class="fas fa-money-bill"></i></a>

                                        <a href="{{ route("cmskoifilterpricebuylow") }}" type="button"
                                            class="btn btn-default btn-flat"><i class="fas fa-money-bill-alt"></i></a>

                                    </div>

                                </div>

                                <div class="col-sm-3">

                                </div>

                            </div>

                            <div class="card">

                                <!-- /.card-header -->

                                <div class="card-body">

                                    <table id="dataKoi" class="table table-bordered table-striped"
                                        style="width: 100% !important;">

                                        <thead>

                                            <tr>

                                                <th>No</th>

                                                <th>Actions</th>

                                                <th>Koi Code</th>

                                                <th>Nickname</th>

                                                <th>Variety</th>

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

                                                <th>Date Of Sell</th>

                                                <th>Buyer Name</th>

                                                <th>Date of Death</th>

                                                <th>Death Note</th>

                                                <th>Breeder</th>

                                                <th>Bloodline</th>

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
                var table = $('#dataKoi').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: {
                        url: '{!! route("getDataKoi") !!}',
                        type: 'GET'
                    },
                    columns: [{
                            data: null,
                            name: 'index',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'code',
                            name: 'koi_code'
                        },
                        {
                            data: 'nickname',
                            name: 'nickname'
                        },
                        {
                            data: 'variety',
                            name: 'variety'
                        },
                        {
                            data: 'gender',
                            name: 'gender'
                        },
                        {
                            data: 'birth',
                            name: 'birth'
                        },
                        {
                            data: 'age',
                            name: 'age'
                        },
                        {
                            data: 'date_purchase',
                            name: 'date_purchase'
                        },
                        {
                            data: 'size',
                            name: 'size'
                        },
                        {
                            data: 'selleragent',
                            name: 'seller'
                        },
                        {
                            data: 'handling_agent',
                            name: 'handler'
                        },
                        {
                            data: 'price_buy',
                            name: 'price_buy',
                            width: '12.5%'
                        },
                        {
                            data: 'price_sell',
                            name: 'price_sell',
                            width: '12.5%'
                        },
                        {
                            data: 'kep_loc',
                            name: 'kep_loc'
                        },
                        {
                            data: 'date_of_sell',
                            name: 'date_of_sell'
                        },
                        {
                            data: 'buyer_name',
                            name: 'buyer_name'
                        },
                        {
                            data: 'date_of_death',
                            name: 'date_of_death'
                        },
                        {
                            data: 'death_note',
                            name: 'death_note'
                        },
                        {
                            data: 'breeder',
                            name: 'breeder'
                        },
                        {
                            data: 'bloodline',
                            name: 'bloodline'
                        }
                    ],
                    // order: [[2, 'asc']], // Urutkan berdasarkan kolom kedua (koi_code)
                    dom: 'lBfrtip', // This controls the layout of the table
                    buttons: [
                        'excel', 'pdf', 'print'
                    ],
                    lengthMenu: [ // Custom lengthMenu options
                        [10, 25, 50, 100, 200, 500],
                        [10, 25, 50, 100, 200, 500] // labels for options
                    ],
                    drawCallback: function(settings) {
                        var api = this.api();
                        var pageInfo = api.page.info();
                        api.column(0, {
                            page: 'current'
                        }).nodes().each(function(cell, i) {
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
