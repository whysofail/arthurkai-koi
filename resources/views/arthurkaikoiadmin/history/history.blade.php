@extends('layouts.apparthuradm')
@section('title', 'Dashboard')
@section('css')
@endsection
@section('content')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #2c7abe; overflow-y: scroll; overflow-x: hidden;">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link" style="text-align: center; padding-top: 22px; padding-bottom: 22px;">
        <img width="55" src="{{ asset('images/logo/koilogo.png') }}">
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background: #2c7abe">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-2 pb-2 mb-2 d-flex">
            <div class="info">

                <a href="#" class="d-block" style="text-decoration: none; color: white;">
                    <h5 style="font-family: 'Truculenta', sans-serif;"><b>{{date('l, d - m - Y') }}</b></h5>
                </a>
            </div>
        </div> --}}

        {{--
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>koi
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item" style="border-bottom: 3px solid #0186fc; display:flex;">
                    <a href="{{ route('cmskoi') }}" class="nav-link" style="height: 50px;">
                        <i class="whitefont nav-icon far fa-image" style="font-size: 18px !important;"></i>
                        <p class="whitefont" style="font-size: 18px !important;">
                            Koi
                        </p>
                    </a>
                    <a href="{{ route('cmskoigrid') }}" class="nav-link" style="text-align: right; height: 50px;">
                        <i class="fa-solid fa-table-cells" style="font-size: 18px !important; color: white"></i>
                        <p class="whitefont" style="font-size: 18px !important;">
                            Koi<span> Grid</span>
                        </p>
                    </a>
                </li>
            </ul>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="margin-top: 20px;">
                <li class="nav-header whitefontlist"><i class="fas fa-cog"></i> <span style="margin-left: 10px">Setting Koi</span></li>

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

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="margin-top: 20px;">
                <li class="nav-header whitefontlist"><i class="fas fa-cog"></i> <span style="margin-left: 10px">Live Website Koi</span></li>

                <li class="nav-item" style="border-top: 0.6px solid white;">
                    <a href="{{ route('cmsourcollection') }}" class="nav-link">
                        <i class="whitefont nav-icon fas fa-minus"></i>
                        <p class="whitefont">
                            Our Collection
                        </p>
                    </a>
                </li>
                <li class="nav-item" style="border-top: 0.6px solid white;">
                    <a href="{{ route('cmsnews') }}" class="nav-link">
                        <i class="whitefont nav-icon fas fa-minus"></i>
                        <p class="whitefont">
                            News
                        </p>
                    </a>
                </li>
                <li class="nav-item" style="border-top: 0.6px solid white;">
                    <a href="{{ route('cmsaboutus') }}" class="nav-link">
                        <i class="whitefont nav-icon fas fa-minus"></i>
                        <p class="whitefont">
                            About Us
                        </p>
                    </a>
                </li>
                <li class="nav-item" style="border-top: 0.6px solid white; border-bottom: 0.6px solid white;">
                    <a href="{{ route('cmscontactus') }}" class="nav-link">
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
                        <div class="info-box mb-3">


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
                        <div class="row">
                            <div class="col-sm-8">
                                <a href="{{ route('cmskoiAdd') }}">
                                    <button type="button" class="btn btn-success"
                                        style=" background: green; color: white; "><b>+ Add KOI</b></button>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <div class="btn-group">
                                    <a href="#" type="button" class="btn btn-default btn-flat disabled"><i class="fas fa-filter"></i></a>
                                    <a href="{{ route('cmskoifilteraz') }}" type="button" class="btn btn-default btn-flat"><i class="fas fa-sort-alpha-down"></i></a>
                                    <a href="{{ route('cmskoifilterza') }}" type="button" class="btn btn-default btn-flat"><i class="fas fa-sort-alpha-up-alt"></i></a>
                                    <a href="{{ route('cmskoifilter19') }}" type="button" class="btn btn-default btn-flat"><i class="fas fa-sort-numeric-down"></i></a>
                                    <a href="{{ route('cmskoifilter91') }}" type="button" class="btn btn-default btn-flat"><i class="fas fa-sort-numeric-up-alt"></i></a>
                                </div>
                            </div>
                        </div>


                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>year</th>
                                            <th></th>
                                            <th>KOI code</th>
                                            <th>Nickname</th>
                                            <th style="padding-right: 400px;">Photo</th>
                                            <th>Variety</th>
                                            <th>Gender</th>
                                            <th>Documents</th>
                                            <th>Video</th>
                                            <th>Birth</th>
                                            <th>Age</th>
                                            <th>Date of Ownership</th>
                                            <th>Size</th>
                                            <th>Seller Agent</th>
                                            <th>Handling Agent</th>
                                            <th>Price Buy (IDR)</th>
                                            <th>Price Buy (JPY)</th>
                                            <th>Keeping Location</th>
                                            <th>Sell Price (IDR)</th>
                                            <th>Sell Price (JPY)</th>
                                            <th>Date Of Sell</th>
                                            <th>Buyer Name</th>
                                            <th>Date of Death</th>
                                            <th>Death Note</th>
                                            {{-- <th>link_video</th>
                                            <th>link_trophy</th>
                                            <th>link_certificate</th> --}}
                                            <th>Breeder</th>
                                            <th>Bloodline</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        @foreach($koi as $k)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>
                                                @foreach($k->history as $history)
                                                    {{ $history->year }}
                                                @endforeach
                                            </td>
                                            <td>
                                                <span style="display: flex !important">
                                                    <a href="{{ route('cmskoiEdit', $k->id_koi) }}" type="button"
                                                        class="btn btn-info btn-xs">Edit</a> |
                                                    <a href="{{ route('cmskoiDelete', $k->id_koi) }}" type="button"
                                                        class="btn btn-danger btn-xs">Delete</a> |
                                                    <a href="{{ route('cmskoidetail', $k->id_koi) }}" type="button"
                                                        class="btn btn-warning btn-xs">Details</a>
                                                </span>
                                                <br><br><br>
                                                <span style="text-align: center">
                                                    <div class="btn-group">
                                                        @if($k->n_status == 'Available')
                                                        <button type="button" class="btn btn-sm btn-success">Available</button>
                                                        @elseif($k->n_status == 'Sold')
                                                        <button type="button" class="btn btn-sm btn-danger">Sold</button>
                                                        @elseif($k->n_status == 'Death')
                                                        <button type="button" class="btn btn-sm btn-default" style="background: purple; color: white">Death</button>
                                                        @else
                                                        @endif
                                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                            <form action="{{ route('cmsstatusupdate') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id_koi" value="{{ $k->id_koi }}">
                                                                <input type="hidden" name="n_status" value="Available">
                                                                <button class="dropdown-item">Available</button>
                                                            </form>
                                                            <form action="{{ route('cmsstatusupdate') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id_koi" value="{{ $k->id_koi }}">
                                                                <input type="hidden" name="n_status" value="Sold">
                                                                <button class="dropdown-item">Sold</button>
                                                            </form>
                                                            <form action="{{ route('cmsstatusupdate') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id_koi" value="{{ $k->id_koi }}">
                                                                <input type="hidden" name="n_status" value="Death">
                                                                <button class="dropdown-item">Death</button>
                                                            </form>

                                                      </div>
                                                </span>
                                            </td>
                                            <td>{{ $k->koi_code }}</td>
                                            <td>{{ $k->nickname }}</td>
                                            <td>
                                                <span style="display: flex; padding: 20px;">
                                                    @foreach (explode('|', $k->link_photo) as $image)
                                                    <img width="125" class="img-thumbnail"
                                                        src="{{ asset('img/koi/photo/'. $image) }}"><br />
                                                    {{-- <span style="font-size: 0.8rem; color: #62200a">{{ $image
                                                        }}</span> --}}
                                                    {{-- <br /> --}}
                                                    @endforeach
                                                </span>
                                            </td>
                                            <td>{{ $k->variety }}</td>
                                            <td>{{ $k->gender }}</td>
                                            <td>
                                                <img width="100" class="img-thumbnail"
                                                    src="{{ asset('img/koi/trophy/'. $k->link_trophy) }}">
                                                <img width="100" class="img-thumbnail"
                                                    src="{{ asset('img/koi/certificate/'. $k->link_certificate) }}">
                                            </td>
                                            <td>
                                                <video src="{{ asset('img/koi/video/'. $k->link_video) }}" type="video/mp4" width="100px" playsinline autoplay muted loop></video>
                                            </td>
                                            <td>{{ $k->birth }}</td>
                                            <td>{{ $k->age }}</td>
                                            <td>{{ $k->date_ownp }}</td>
                                            <td>{{ $k->size }}</td>
                                            <td>{{ $k->salleragent }}</td>
                                            <td>{{ $k->hagent }}</td>
                                            <td>{{ $k->pricebuy_idr }}</td>
                                            <td>{{ $k->pricebuy_jpy }}</td>
                                            <td>{{ $k->kep_loc }}</td>
                                            <td>{{ $k->pricesell_idr }}</td>
                                            <td>{{ $k->pricesell_jpy }}</td>
                                            <td>{{ $k->date_sell }}</td>
                                            <td>{{ $k->buyer_name }}
                                            <td>{{ $k->death_date }}
                                            <td>{{ $k->death_note }}
                                            {{--
                                                <td>{{ $k->link_trophy }}</td>
                                                <td>{{ $k->link_certificate }}</td>
                                            --}}
                                            <td>{{ $k->breeder }}</td>
                                            <td>{{ $k->bloodline }}</td>
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

    @section('script')

    @endsection
