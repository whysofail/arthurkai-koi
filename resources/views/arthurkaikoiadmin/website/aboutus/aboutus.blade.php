@extends("layouts.apparthuradm")

@section("title", "About Us")

@section("css")

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

                    <li class="nav-item" style="border-top: 0.6px solid white;">

                        <a href="{{ route("cmsnews") }}" class="nav-link">

                            <i class="whitefont nav-icon fas fa-minus"></i>

                            <p class="whitefont">

                                News

                            </p>

                        </a>

                    </li>

                    <li class="nav-item" style="border-top: 0.6px solid white; background: black;">

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

        <!-- Main content -->

        <section class="content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-12">

                        <div class="card">

                            <div class="row">

                                <div class="col-sm-8">

                                    <a href="{{ route("cmsaboutusAdd") }}">

                                        <button type="button" class="btn btn-success"
                                            style=" background: green; color: white; "><b>+ Add About Us</b></button>

                                    </a>

                                </div>

                            </div>

                            <div class="card">

                                <!-- /.card-header -->

                                <div class="card-body">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th></th>
                                                <th>image</th>
                                                <th>deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($aboutus as $a)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>
                                                        <span style="display: flex !important; gap: 2px;">
                                                            <a href="{{ route("cmsaboutusEdit", $a->id) }}"
                                                                type="button" class="btn btn-info btn-xs">Edit</a>

                                                            <a href="{{ route("cmsaboutusDelete", $a->id) }}"
                                                                type="button" class="btn btn-danger btn-xs">Delete</a>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if ($a->image != null)
                                                            <div class="swiper-slide">
                                                                <img width="125" class="img-thumbnail"
                                                                    src="{{ asset("img/koi/website/aboutus/" . $a->image) }}">
                                                            </div>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>{!! $a->description !!}</td>

                                                </tr>
                                                <?php $no++; ?>
                                            @endforeach

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

    @endsection
