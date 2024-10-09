@extends("layouts.apparthuradm")

@section("title", "Contact Us")

@section("css")
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
@endsection

@section("content")
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
                                    <a href="{{ route("cmsnewsAdd") }}">
                                        <button type="button" class="btn btn-success"
                                            style=" background: green; color: white; "><b>+ Add News</b></button>
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
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($news as $n)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>
                                                        <span style="display: flex !important; gap: 4px;">
                                                            <a href="{{ route("cmsnewsEdit", $n->id) }}" type="button"
                                                                class="btn btn-info btn-xs">Edit</a>
                                                            <a href="{{ route("cmsnewsDelete", $n->id) }}" type="button"
                                                                class="btn btn-danger btn-xs">Delete</a>
                                                        </span>
                                                    </td>
                                                    <td>{{ $n->title }}</td>
                                                    <td>
                                                        @if ($n->image != null)
                                                            <div class="swiper-slide">
                                                                <img width="125" class="img-thumbnail"
                                                                    src="{{ asset("img/koi/website/news/" . $n->image) }}">
                                                            </div>
                                                        @else
                                                            -
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <p>{{ Str::limit(strip_tags($n->description), 25, "...") }}</p>
                                                    </td>
                                                    <td>
                                                        {{ Str::ucfirst($n->type) }}
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
