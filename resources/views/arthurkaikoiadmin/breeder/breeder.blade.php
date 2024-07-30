@extends("layouts.apparthuradm")

@section("title", "Dashboard")

@section("css")

@endsection

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
                            <div class="row">
                                <div class="col-sm-8">
                                    <a href="{{ route("cmsbreederAdd") }}">
                                        <button type="button" class="btn btn-success"
                                            style=" background: green; color: white; "><b>+ Add Breeder</b></button>
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
                                                <th>Breeder Name</th>
                                                <th>Location</th>
                                                <th>Contact</th>
                                                <th>Breeder Code</th>
                                                <th>Breeder Website</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($breeder as $b)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>
                                                        <span style="display: flex !important; gap: 2px;">
                                                            <a href="{{ route("cmsbreederEdit", $b->id) }}" type="button"
                                                                class="btn btn-info btn-xs">Edit</a>

                                                            <a href="{{ route("cmsbreederDelete", $b->id) }}" type="button"
                                                                class="btn btn-danger btn-xs">Delete</a>

                                                        </span>

                                                    </td>

                                                    <td>{{ $b->name }}</td>

                                                    <td>{{ $b->location }}</td>

                                                    <td>{{ $b->contact }}</td>

                                                    <td>{{ $b->code }}</td>

                                                    <td>{{ $b->website }}</td>

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
