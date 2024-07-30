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
                                    <a href="{{ route("cmsagentAdd") }}">
                                        <button type="button" class="btn btn-success"
                                            style=" background: green; color: white; "><b>+ Add Agent</b></button>
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
                                                <th>Action</th>
                                                <th>Name</th>
                                                <th>Location</th>
                                                <th>Website</th>
                                                <th>Owner</th>
                                                <th>Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($agent as $a)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>
                                                        <span style="display: flex !important; gap: 4px;">
                                                            <a href="{{ route("cmsagentEdit", $a->id) }}" type="button"
                                                                class="btn btn-info btn-xs">Edit</a>
                                                            <a href="{{ route("cmsagentDelete", $a->id) }}" type="button"
                                                                class="btn btn-danger btn-xs">Delete</a>
                                                        </span>
                                                    </td>
                                                    <td>{{ $a->name }}</td>
                                                    <td>{{ $a->location }}</td>
                                                    <td>{{ $a->website }}</td>
                                                    <td>{{ $a->owner }}</td>
                                                    <td>{{ $a->code }}</td>
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
