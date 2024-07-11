@extends('layouts.apparthuradm')
@section('title', 'List Koi')
@section('css')
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<style>
    .content_box{
        border: 1px black solid;
        padding: 15px;
        text-align: center;
    }

    a:hover{
        color: black !important;
        background: #ffffff00 !important;
    }
</style>
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
                    <a href="{{ route('cmskoigrid') }}" class="nav-link" style="text-align: right; height: 50px; background: black;">
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

                <div class="col-12 col-sm-1 col-md-1">
                    <a href="{{ route('dashboard') }}" style="color:black;">
                        <div class="mb-3 mt-4">

                            <div class="info-box-content" style="text-align: center">
                                <i class="fa-solid fa-table" style="font-size: 40px;"></i>
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

    <section class="content">
        <div class="women_main">
            <!-- start content -->

           <div class="w_content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row" style="padding: 20px;">
                            <div class="col-sm-4">
                                <a href="{{ route('cmskoiAdd') }}">
                                    <button type="button" class="btn btn-success"
                                        style=" background: green; color: white; "><b>+ Add KOI</b></button>
                                </a>
                            </div>
                            <div class="col-sm-5">
                                <div class="btn-group">
                                    <a href="#" type="button" class="btn btn-default btn-flat disabled"><i class="fas fa-filter"></i></a>
                                    <a href="{{ route('cmskoigfilteraz') }}" type="button" class="btn btn-default btn-flat"><i class="fas fa-sort-alpha-down"></i></a>
                                    <a href="{{ route('cmskoigfilterza') }}" type="button" class="btn btn-default btn-flat"><i class="fas fa-sort-alpha-up-alt"></i></a>
                                    <a href="{{ route('cmskoigfilter19') }}" type="button" class="btn btn-default btn-flat"><i class="fas fa-sort-numeric-down"></i></a>
                                    <a href="{{ route('cmskoigfilter91') }}" type="button" class="btn btn-default btn-flat"><i class="fas fa-sort-numeric-up-alt"></i></a>
                                    <a href="{{ route('cmskoigfilterpricebuyhigh') }}" type="button" class="btn btn-default btn-flat"><i class="fas fa-money-bill"></i></a>
                                    <a href="{{ route('cmskoigfilterpricebuylow') }}" type="button" class="btn btn-default btn-flat"><i class="fas fa-money-bill-alt"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card-tools">
                                    <form action="{{ route('cmskoigridsearch') }}" method="POST">
                                        @csrf
                                        <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" name="search" placeholder="Search Koi">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                        </div>
                                    </form>
                                  </div>
                            </div>
                        </div>
                <div class="card-body pb-0">
                <div class="row">
                    @foreach($koi as $k)
                    <div class="col-sm-3" style="padding-left: 10px; padding-right: 10px; padding-top: 10px;">
                        <div class="content_box"><a href="{{ route('cmskoidetail', $k->id_koi) }}">
                            @foreach (explode('|', $k->photo_highlight) as $image)
                            <img src="{{ asset('img/koi/photo/'. $image) }}" class="img-responsive" alt="" style="width: auto; height: 220.68px;">
                      @endforeach
                            </a>
                            <h6 style="padding-left: 10px; padding-right: 10px; padding-top: 10px;"><a href="{{ route('cmskoidetail', $k->id_koi) }}"> {{ $k->koi_code }}</a></h6>
                            <table style="width: 100%; padding: 10px; text-align: left; font-size: 14px;">
                                <tr>
                                    <td style="padding: 10px;"><strong>Variety</strong></td>
                                    <td style="padding: 10px;">:</td>
                                    <td style="padding: 10px;">{{ $k->variety }}</td>
                                </tr>
                                    <tr>
                                        <td style="padding: 10px;"><strong>Breeder Name</strong></td>
                                        <td style="padding: 10px;">:</td>
                                        <td style="padding: 10px;">{{ $k->breeder }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px;"><strong>Gender</strong></td>
                                        <td style="padding: 10px;">:</td>
                                        <td style="padding: 10px;">{{ $k->gender }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px;"><strong>Age</strong></td>
                                        <td style="padding: 10px;">:</td>
                                        <td style="padding: 10px;">
                                            @if($k->birth)
                                                @php
                                                    $umur = \Carbon\Carbon::parse($k->birth)->diff(\Carbon\Carbon::now());
                                                    $umurTahun = $umur->y;
                                                    $umurBulan = $umur->m;
                                                    echo $umurTahun . 'yr ' . $umurBulan . 'm';
                                                @endphp
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px;"><strong>Status</strong></td>
                                        <td style="padding: 10px;">:</td>
                                        <td style="padding: 10px;">
                                            <div class="btn-group">
                                                <button class="btn-light" disabled
                                                    style="font-size: 14px;">-</button>
                                                @if($k->n_status == 'Available')
                                                <button type="button"
                                                    class="btn btn-sm btn-success" style="font-size: 12px;">Available</button>
                                                @elseif($k->n_status == 'Sold')
                                                <button type="button" class="btn btn-sm btn-danger" style="font-size: 12px;">Sold</button>
                                                @elseif($k->n_status == 'Death')
                                                <button type="button" class="btn btn-sm btn-default"
                                                    style="background: purple; color: white; font-size: 12px;">Death</button>
                                                @else
                                                @endif
                                                <button type="button"
                                                    class="btn btn-default btn-xs dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown">
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
                                            </div>
                                        </td>
                                        </td>
                                    </tr>
                                </table>

                                <div class="grid_1 simpleCart_shelfItem">

                                <div class="item_add" style="padding-left: 10px; padding-right: 10px; padding-bottom: 25px; padding-top: 25px; display: inline-flex;">
                                    <span style="display: flex !important;">
                                        <a href="{{ route('cmskoigEdit', $k->id_koi) }}"
                                            class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a> |
                                        <a href="#bannerformmodal{{ $k->id_koi }}"
                                            class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger{{ $k->id_koi }}"><i class="far fa-trash-alt"></i></a> |
                                        <a href="{{ route('cmskoidetail', $k->id_koi) }}"
                                            class="btn btn-info btn-xs" style="background: black;">Details</a>
                                    </span>
                                </div>

                                <div class="item_add" style="padding-left: 10px; padding-right: 10px; padding-bottom: 25px; padding-top: 25px; display: inline-flex;">
                                    <span style="display: flex !important;">
                                        <a href="{{ route('cmskoidetail', $k->id_koi) }}" class="btn btn-xs"
                                            style="background: darkred; color:white; border: 1px solid #62200a"
                                            data-toggle="modal"
                                            data-target="#modalShowVideo{{ $k->id_koi }}">Video</a>
                                        <!-- modalShowVideo -->
                                        <div class="modal fade bannerformmodal{{ $k->id_koi }}"
                                            id="modalShowVideo{{ $k->id_koi }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header"
                                                        style="display: block; text-align: center;">
                                                        <h5 class="modal-title">{{ $k->koi_code }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: center">
                                                        <div class="swiper mySwiper">
                                                            <div class="swiper-wrapper">
                                                            @foreach($k->history as $h)
                                                            @if ($loop->first)
                                                            @foreach (explode('|', $h->link_video) as $image)
                                                            @if($image != null)
                                                            <div class="swiper-slide">
                                                            <video controls="controls" style="width: 80%" name="{{ $image }}">
                                                                <source src="{{ asset('img/koi/video/'. $image) }}">
                                                            </video><br>
                                                            </div>
                                                            @else
                                                            -
                                                            @endif
                                                            @endforeach
                                                            @else
                                                            @endif
                                                            @endforeach
                                                        </div>

                                                        <div class="swiper-pagination"></div>
                                                    </div>
                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>
                                                </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal"><i
                                                                class="fas fa-long-arrow-alt-left"></i></button>
                                                        {{-- <a href="{{ route('cmskoiDelete', $k->id_koi) }}"
                                                            type="button" class="btn btn-danger">Delete</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modalShowVideo -->

                                        <a href="{{ route('cmskoidetail', $k->id_koi) }}" class="btn btn-xs"
                                            style="background: darkblue; color:white; border: 1px solid #62200a; margin-left: 5px;"
                                            data-toggle="modal"
                                            data-target="#modalShowPhoto{{ $k->id_koi }}"><i class="far fa-image"></i></a>
                                        <!-- modalShowPhoto -->
                                        <div class="modal fade bannerformmodal{{ $k->id_koi }}"
                                            id="modalShowPhoto{{ $k->id_koi }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header"
                                                        style="display: block; text-align: center;">
                                                        <h5 class="modal-title">{{ $k->koi_code }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: center">
                                                        <div class="swiper mySwiper">
                                                            <div class="swiper-wrapper">

                                                                @foreach($k->history as $h)
                                                                @if ($loop->first)
                                                                @foreach (explode('|', $h->link_photo) as
                                                                $image)
                                                                @if($image != null)
                                                                <div class="swiper-slide">
                                                                    <img width="125" class="img-thumbnail"
                                                                        src="{{ asset('img/koi/photo/'. $image) }}">
                                                                </div>
                                                                @else
                                                                -
                                                                @endif
                                                                @endforeach
                                                                @else
                                                                @endif
                                                                @endforeach

                                                            </div>

                                                            <div class="swiper-pagination"></div>
                                                        </div>
                                                        <div class="swiper-button-next"></div>
                                                        <div class="swiper-button-prev"></div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal"><i
                                                                class="fas fa-long-arrow-alt-left"></i></button>
                                                        {{-- <a href="{{ route('cmskoiDelete', $k->id_koi) }}"
                                                            type="button" class="btn btn-danger">Delete</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modalShowPhoto -->

                                        <a href="{{ route('cmskoidetail', $k->id_koi) }}"
                                            class="btn btn-primary btn-xs" data-toggle="modal"
                                            data-target="#modalShowDocument{{ $k->id_koi }}" style="margin-left: 5px;"><i class="fas fa-photo-video"></i></a>
                                        <!-- modalShowDocument -->
                                        <div class="modal fade bannerformmodal{{ $k->id_koi }}"
                                            id="modalShowDocument{{ $k->id_koi }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header"
                                                        style="display: block; text-align: center;">
                                                        <h5 class="modal-title">{{ $k->koi_code }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: center">
                                                        <div class="swiper mySwiper">
                                                            <div class="swiper-wrapper">
                                                            @foreach($k->history as $h)
                                                            @if($h->link_trophy != null)
                                                            <img width="125" class="img-thumbnail"
                                                                src="{{ asset('img/koi/trophy/'. $h->link_trophy) }}"><br>
                                                            @else
                                                            -
                                                            @endif
                                                            <br/><br/><br/><br/>
                                                            @if($h->link_certificate != null)
                                                            <img width="125" class="img-thumbnail"
                                                                src="{{ asset('img/koi/certificate/'. $h->link_certificate) }}"><br />
                                                            @else
                                                            -
                                                            @endif
                                                            @endforeach
                                                        </div>

                                                        <div class="swiper-pagination"></div>
                                                    </div>
                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>
                                                </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal"><i
                                                                class="fas fa-long-arrow-alt-left"></i></button>
                                                        {{-- <a href="{{ route('cmskoiDelete', $k->id_koi) }}"
                                                            type="button" class="btn btn-danger">Delete</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modalShowVideo -->
                                    </span>
                                </div>

                                <div class="modal fade bannerformmodal{{ $k->id_koi }}" id="modal-danger{{ $k->id_koi }}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Delete Koi</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>Apakah kamu yakin ingin hapus?&hellip;</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          <a href="{{ route('cmskoigridDelete', $k->id_koi) }}" type="button" class="btn btn-danger">Delete</a>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                                  <!-- /.modal -->
                                {{-- <div class="item_add"><span class="item_price"><a href="#">See Price</a></span></div> --}}
                                </div>
                           </div>
                    </div>
                    @endforeach



                    <div class="clearfix"></div>
                </div>
                </div>
           </div>
        </div>
            </div>
           </div>
        </div>
        </section>
	<!-- end content -->
    <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
          <ul class="pagination justify-content-center m-0">
            @if ($koi->lastPage() > 1)
            @for ($i = 1; $i <= $koi->lastPage(); $i++)
            <li class="page-item {{ ($koi->currentPage() == $i) ? 'active' : '' }}"><a class="page-link" href="{{ $koi->url($i) }}">{{ $i }}</a></li>
            @endfor
            @endif
          </ul>
        </nav>
      </div>
@endsection
