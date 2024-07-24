@extends("layouts.apparthuradm")

@section("title", "Dashboard")

@section("css")

    @php
        use Carbon\Carbon;
    @endphp

@section("content")
    @parent
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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12" style="background: black">
                        <a href="{{ route("cmskoi") }}" style="color:black;">
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
                        <div class="row">

                            <div class="col-lg-3 col-6">

                                <!-- small box -->

                                <div class="small-box" style="background: #444cb7;">

                                    <div class="inner" style="text-align: center">

                                        <a href="{{ route("cmsvariety") }}" style="text-decoration: none; color: white;">

                                            <h3>{{ $variety }}</h3>
                                            <p>Variety</p>

                                        </a>

                                    </div>

                                    <div class="icon">

                                        <i class="ion ion-bag"></i>

                                    </div>

                                    <a href="{{ route("cmsvariety") }}" class="small-box-footer">More <i
                                            class="fas fa-arrow-circle-right"></i></a>

                                </div>

                            </div>

                            <div class="col-lg-3 col-6">

                                <!-- small box -->

                                <div class="small-box bg-success">

                                    <div class="inner" style="text-align: center">

                                        <a href="{{ route("cmsbloodline") }}" style="text-decoration: none; color: white;">

                                            <h3>{{ $bloodline }}</h3>

                                            <p>Bloodline</p>

                                        </a>

                                    </div>

                                    <div class="icon">

                                        <i class="ion ion-bag"></i>

                                    </div>

                                    <a href="{{ route("cmsbloodline") }}" class="small-box-footer">More <i
                                            class="fas fa-arrow-circle-right"></i></a>

                                </div>

                            </div>

                            <div class="col-lg-3 col-6">

                                <!-- small box -->

                                <div class="small-box" style="background: #7c2b7f">

                                    <div class="inner" style="text-align: center">

                                        <a href="{{ route("cmsbreeder") }}" style="text-decoration: none; color: white;">

                                            <h3>{{ $breeder }}</h3>

                                            <p>Breeder</p>

                                        </a>

                                    </div>

                                    <div class="icon">

                                        <i class="ion ion-bag"></i>

                                    </div>

                                    <a href="{{ route("cmsbreeder") }}" class="small-box-footer">More <i
                                            class="fas fa-arrow-circle-right"></i></a>

                                </div>

                            </div>

                            <div class="col-lg-3 col-6">

                                <!-- small box -->

                                <div class="small-box bg-warning">

                                    <div class="inner" style="text-align: center">

                                        <a href="{{ route("cmsagent") }}" style="text-decoration: none; color: black;">

                                            <h3>{{ $agent }}</h3>

                                            <p>Agent</p>

                                        </a>

                                    </div>

                                    <div class="icon">

                                        <i class="ion ion-bag"></i>

                                    </div>

                                    <a href="{{ route("cmsagent") }}" class="small-box-footer">More <i
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

    @section("script")

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
