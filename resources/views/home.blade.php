@extends('layouts.apparthuradm')
@section('title', 'Dashboard')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
    </style>
@endsection
@php
    use Carbon\Carbon;
@endphp
@section('content')
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #2c7abe">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="brand-link"
            style="text-align: center; background: black; padding-top: 22px; padding-bottom: 22px;">
            <img width="55" src="{{ asset('images/logo/koilogo.png') }}">
        </a>

        <!-- Sidebar -->
        <div class="sidebar" style="background: #2c7abe">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item" style="border-bottom: 3px solid #0186fc; display:flex;">
                        <a href="{{ route('cmskoi') }}" class="nav-link" style=" height: 50px;">
                            <i class="whitefont nav-icon far fa-image" style="font-size: 19px !important;"></i>
                            <p class="whitefont" style="font-size: 19px !important;">
                                Koi
                            </p>
                        </a>
                        <a href="{{ route('cmskoigrid') }}" class="nav-link" style="text-align: right; height: 50px;">
                            <i class="fa-solid fa-table-cells" style="font-size: 19px !important; color: white"></i>
                            <p class="whitefont" style="font-size: 19px !important;">
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
                        <a href="{{ route('cmsvariety') }}" class="nav-link">
                            <i class="whitefont nav-icon fas fa-minus"></i>
                            <p class="whitefont">
                                Variety
                            </p>
                        </a>
                    </li>
                    <li class="nav-item" style="border-top: 0.6px solid white;">
                        <a href="{{ route('cmsbloodline') }}" class="nav-link">
                            <i class="whitefont nav-icon fas fa-minus"></i>
                            <p class="whitefont">
                                Bloodline
                            </p>
                        </a>
                    </li>
                    <li class="nav-item" style="border-top: 0.6px solid white;">
                        <a href="{{ route('cmsbreeder') }}" class="nav-link">
                            <i class="whitefont nav-icon fas fa-minus"></i>
                            <p class="whitefont">
                                Breeder
                            </p>
                        </a>
                    </li>
                    <li class="nav-item" style="border-top: 0.6px solid white; border-bottom: 0.6px solid white;">
                        <a href="{{ route('cmsagent') }}" class="nav-link">
                            <i class="whitefont nav-icon fas fa-minus"></i>
                            <p class="whitefont">
                                Agent
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

                    <div class="col-12 col-sm-12 col-md-12" style="background: black">
                        <a href="{{ route('cmskoi') }}" style="color:black;">
                            <div class="mb-2 mt-2">

                                <div class="info-box-content" style="background: black; color: white; text-align: center;">
                                    <span class="info-box-text">Number of Fish</span>
                                    <span class="info-box-number">
                                        : <b>{{ $koi }}</b>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-12 col-sm-1 col-md-1">
                        <a href="{{ route('cmskoigrid') }}" style="color:black;">
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
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box" style="background: #444cb7;">
                                    <div class="inner" style="text-align: center">
                                        <a href="{{ route('cmsvariety') }}" style="text-decoration: none; color: white;">
                                            <h3>{{ $koi }}</h3>
                                            <p>Variety</p>
                                        </a>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('cmsvariety') }}" class="small-box-footer">More <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner" style="text-align: center">
                                        <a href="{{ route('cmsbloodline') }}"
                                            style="text-decoration: none; color: white;">
                                            <h3>{{ $bloodline }}</h3>
                                            <p>Bloodline</p>
                                        </a>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('cmsbloodline') }}" class="small-box-footer">More <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box" style="background: #7c2b7f">
                                    <div class="inner" style="text-align: center">
                                        <a href="{{ route('cmsbreeder') }}" style="text-decoration: none; color: white;">
                                            <h3>{{ $breeder }}</h3>
                                            <p>Breeder</p>
                                        </a>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('cmsbreeder') }}" class="small-box-footer">More <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner" style="text-align: center">
                                        <a href="{{ route('cmsagent') }}" style="text-decoration: none; color: black;">
                                            <h3>{{ $agent }}</h3>
                                            <p>Agent</p>
                                        </a>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('cmsagent') }}" class="small-box-footer">More <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

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

    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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
    @endsection
