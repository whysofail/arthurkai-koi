@extends("layouts.apparthuradm")

@section("title", "Our Collection")

@section("css")
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
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
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-sm-8">

                                    <a href="{{ route("cmsourcollectionAdd") }}" style="padding: 10px 0 10px 0;">

                                        <button type="button" class="btn btn-success"
                                            style=" background: green; color: white; margin: 10px 0 10px 10px;"><b>+ Add Our
                                                Collection</b></button>
                                    </a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>Koi</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($ourcollection as $o)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>
                                                        <span style="display: flex !important; gap: 2px;">
                                                            <a href="{{ route("cmsourcollectionEdit", $o->id) }}"
                                                                type="button" class="btn btn-info btn-xs">Edit</a>
                                                            <a href="{{ route("cmsourcollectionDelete", $o->id) }}"
                                                                type="button" class="btn btn-danger btn-xs">Delete</a>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route("cmskoidetail", $o->koi_id ?? 0) }}">
                                                            @if (!is_null($o->koi))
                                                                {{ $o->koi->code ?? "-" }}
                                                            @else
                                                                No Koi Provided, Please Edit
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>{{ $o->title }}</td>
                                                    <td>
                                                        {{ Str::limit($o->description, 50, "...") }}
                                                    </td>
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
