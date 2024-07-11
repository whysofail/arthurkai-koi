@extends("layouts.apparthuradm")

@section("title", "Dashboard")

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

                    <li class="nav-header whitefontlist">List Setting Koi</li>

                    <li class="nav-item" style="border-bottom: 3px solid #0186fc; display:flex;">

                        <a href="{{ route("cmskoi") }}" class="nav-link" style="height: 50px; background: black;">

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

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>

                                                <th>No</th>

                                                <th></th>

                                                <th>KOI code</th>

                                                <th>History Year</th>

                                                <th>Nickname</th>

                                                <th>Variety</th>

                                                <th>Gender</th>

                                                <th>Birth</th>

                                                <th>Age</th>

                                                <th>Purchese Date</th>

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

                                                <th>Breeder</th>

                                                <th>Bloodline</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php $no = 1; ?>

                                            @foreach ($koi as $k)
                                                <tr>

                                                    <td>{{ $no }}</td>

                                                    <td>

                                                        <span style="display: flex !important">

                                                            <a href="{{ route("cmskoiEdit", $k->id_koi) }}"
                                                                class="btn btn-warning btn-xs" style="width: 30px"><i
                                                                    class="fas fa-edit"></i></a> |

                                                            <a href="#bannerformmodal{{ $k->id_koi }}"
                                                                class="btn btn-danger btn-xs" data-toggle="modal"
                                                                data-target="#modalDelete{{ $k->id_koi }}"
                                                                style="width: 30px"><i class="far fa-trash-alt"></i></a> |

                                                            <a href="{{ route("cmskoidetail", $k->id_koi) }}"
                                                                class="btn btn-info btn-xs"
                                                                style="background: black;">Details</a>

                                                        </span>

                                                        <!-- modalDELETE -->

                                                        <div class="modal fade bannerformmodal{{ $k->id_koi }}"
                                                            id="modalDelete{{ $k->id_koi }}">

                                                            <div class="modal-dialog">

                                                                <div class="modal-content">

                                                                    <div class="modal-header">

                                                                        <h4 class="modal-title">Delete Koi</h4>

                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">

                                                                            <span aria-hidden="true">&times;</span>

                                                                        </button>

                                                                    </div>

                                                                    <div class="modal-body">

                                                                        <p>Apakah kamu yakin ingin hapus?&hellip;</p>

                                                                    </div>

                                                                    <div class="modal-footer justify-content-between">

                                                                        <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Close</button>

                                                                        <a href="{{ route("cmskoiDelete", $k->id_koi) }}"
                                                                            type="button"
                                                                            class="btn btn-danger">Delete</a>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <!-- /.modalDELETE -->

                                                        <br /><br />

                                                        <a href="{{ route("cmskoidetail", $k->id_koi) }}"
                                                            class="btn btn-xs"
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

                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">

                                                                            <span aria-hidden="true">&times;</span>

                                                                        </button>

                                                                    </div>

                                                                    <div class="modal-body" style="text-align: center">

                                                                        <div class="swiper mySwiper">

                                                                            <div class="swiper-wrapper">

                                                                                @foreach ($k->history as $h)
                                                                                    @if ($h->link_trophy != null)
                                                                                        <div class="swiper-slide">

                                                                                            <img width="125"
                                                                                                class="img-thumbnail"
                                                                                                src="{{ asset("img/koi/trophy/" . $h->link_trophy) }}">

                                                                                        </div>
                                                                                    @else
                                                                                        -
                                                                                    @endif

                                                                                    <br /><br /><br /><br />

                                                                                    @if ($h->link_certificate != null)
                                                                                        <div class="swiper-slide">

                                                                                            <img width="125"
                                                                                                class="img-thumbnail"
                                                                                                src="{{ asset("img/koi/certificate/" . $h->link_certificate) }}">

                                                                                        </div>
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

                                                        <a href="{{ route("cmskoidetail", $k->id_koi) }}"
                                                            class="btn btn-xs"
                                                            style="background: darkblue; color:white; border: 1px solid #62200a"
                                                            data-toggle="modal"
                                                            data-target="#modalShowPhoto{{ $k->id_koi }}">Photo</a>

                                                        <!-- modalShowPhoto -->

                                                        <div class="modal fade bannerformmodal{{ $k->id_koi }}"
                                                            id="modalShowPhoto{{ $k->id_koi }}">

                                                            <div class="modal-dialog">

                                                                <div class="modal-content">

                                                                    <div class="modal-header"
                                                                        style="display: block; text-align: center;">

                                                                        <h5 class="modal-title">{{ $k->koi_code }}</h5>

                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">

                                                                            <span aria-hidden="true">&times;</span>

                                                                        </button>

                                                                    </div>

                                                                    <div class="modal-body" style="text-align: center">

                                                                        <div class="swiper mySwiper">

                                                                            <div class="swiper-wrapper">

                                                                                @foreach ($k->history as $h)
                                                                                    @if ($loop->first)
                                                                                        @foreach (explode("|", $h->link_photo) as $image)
                                                                                            @if ($image != null)
                                                                                                <div class="swiper-slide">

                                                                                                    <img width="125"
                                                                                                        class="img-thumbnail"
                                                                                                        src="{{ asset("img/koi/photo/" . $image) }}">

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

                                                        <br /><br />

                                                        <!-- /.modalShowDocument -->

                                                        <a href="{{ route("cmskoidetail", $k->id_koi) }}"
                                                            class="btn btn-primary btn-xs" data-toggle="modal"
                                                            data-target="#modalShowDocument{{ $k->id_koi }}">Documents</a>

                                                        <!-- modalShowDocument -->

                                                        <div class="modal fade bannerformmodal{{ $k->id_koi }}"
                                                            id="modalShowDocument{{ $k->id_koi }}">

                                                            <div class="modal-dialog">

                                                                <div class="modal-content">

                                                                    <div class="modal-header"
                                                                        style="display: block; text-align: center;">

                                                                        <h5 class="modal-title">{{ $k->koi_code }}</h5>

                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">

                                                                            <span aria-hidden="true">&times;</span>

                                                                        </button>

                                                                    </div>

                                                                    <div class="modal-body" style="text-align: center">

                                                                        <div class="swiper mySwiper">

                                                                            <div class="swiper-wrapper">

                                                                                @foreach ($k->history as $h)
                                                                                    @if ($loop->first)
                                                                                        @foreach (explode("|", $h->link_video) as $image)
                                                                                            @if ($image != null)
                                                                                                <div class="swiper-slide">

                                                                                                    <video
                                                                                                        controls="controls"
                                                                                                        style="width: 80%"
                                                                                                        name="{{ $image }}">

                                                                                                        <source
                                                                                                            src="{{ asset("img/koi/video/" . $image) }}">

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

                                                        <br /><br />

                                                        <div class="btn-group">

                                                            <button class="btn-light" disabled
                                                                style="font-size: 14px;">-</button>

                                                            @if ($k->n_status == "Available")
                                                                <button type="button"
                                                                    class="btn btn-sm btn-success">Available</button>
                                                            @elseif($k->n_status == "Sold")
                                                                <button type="button"
                                                                    class="btn btn-sm btn-danger">Sold</button>
                                                            @elseif($k->n_status == "Death")
                                                                <button type="button" class="btn btn-sm btn-default"
                                                                    style="background: purple; color: white">Death</button>
                                                            @else
                                                            @endif

                                                            <button type="button"
                                                                class="btn btn-default btn-xs dropdown-toggle dropdown-icon"
                                                                data-toggle="dropdown">

                                                                <span class="sr-only">Toggle Dropdown</span>

                                                            </button>

                                                            <div class="dropdown-menu" role="menu">

                                                                <form action="{{ route("cmsstatusupdate") }}"
                                                                    method="POST">

                                                                    @csrf

                                                                    <input type="hidden" name="id_koi"
                                                                        value="{{ $k->id_koi }}">

                                                                    <input type="hidden" name="n_status"
                                                                        value="Available">

                                                                    <button class="dropdown-item">Available</button>

                                                                </form>

                                                                <form action="{{ route("cmsstatusupdate") }}"
                                                                    method="POST">

                                                                    @csrf

                                                                    <input type="hidden" name="id_koi"
                                                                        value="{{ $k->id_koi }}">

                                                                    <input type="hidden" name="n_status" value="Sold">

                                                                    <button class="dropdown-item">Sold</button>

                                                                </form>

                                                                <form action="{{ route("cmsstatusupdate") }}"
                                                                    method="POST">

                                                                    @csrf

                                                                    <input type="hidden" name="id_koi"
                                                                        value="{{ $k->id_koi }}">

                                                                    <input type="hidden" name="n_status" value="Death">

                                                                    <button class="dropdown-item">Death</button>

                                                                </form>

                                                            </div>

                                                        </div>

                                                    </td>

                                                    <td>{{ $k->koi_code }}</td>

                                                    <td>

                                                        @foreach ($k->history as $h)
                                                            {{ $h->year }}
                                                        @endforeach

                                                    </td>

                                                    <td>{{ $k->nickname }}</td>

                                                    <td>{{ $k->variety }}</td>

                                                    <td>{{ $k->gender }}</td>

                                                    <td>{{ $k->birth }}</td>

                                                    <td>

                                                        @if (!empty($k->birth))
                                                            @php
                                                                try {
                                                                    $birthDate = \Carbon\Carbon::parse($k->birth);
                                                                    $umur = $birthDate->diff(\Carbon\Carbon::now());
                                                                    $umurTahun = $umur->y;
                                                                    $umurBulan = $umur->m;
                                                                    echo $umurTahun . "yr " . $umurBulan . "m";
                                                                } catch (\Exception $e) {
                                                                    echo "Invalid date";
                                                                }
                                                            @endphp
                                                        @else
                                                            -
                                                        @endif

                                                    </td>

                                                    <td>{{ $k->date_purchese }}</td>

                                                    <td>

                                                        @foreach ($k->history as $h)
                                                            @if ($loop->first)
                                                                {{ $h->size }}
                                                            @else
                                                            @endif
                                                        @endforeach

                                                    </td>

                                                    <td>{{ $k->salleragent }}</td>

                                                    <td>

                                                        @foreach ($k->history as $h)
                                                            @if ($loop->first)
                                                                {{ $h->hagent }}
                                                            @else
                                                            @endif
                                                        @endforeach

                                                    </td>

                                                    <td>{{ $k->pricebuy_idr }}</td>

                                                    <td>{{ $k->pricebuy_jpy }}</td>

                                                    <td>{{ $k->kep_loc }}</td>

                                                    <td>

                                                        @foreach ($k->history as $h)
                                                            @if ($loop->first)
                                                                {{ $h->pricesell_idr }}
                                                            @else
                                                            @endif
                                                        @endforeach

                                                    </td>

                                                    <td>

                                                        @foreach ($k->history as $h)
                                                            @if ($loop->first)
                                                                {{ $h->pricesell_jpy }}
                                                            @else
                                                            @endif
                                                        @endforeach

                                                    </td>

                                                    <td>

                                                        @foreach ($k->history as $h)
                                                            @if ($loop->first)
                                                                {{ $h->date_sell }}
                                                            @else
                                                            @endif
                                                        @endforeach

                                                    </td>

                                                    <td>

                                                        @foreach ($k->history as $h)
                                                            @if ($loop->first)
                                                                {{ $h->buyer_name }}
                                                            @else
                                                            @endif
                                                        @endforeach

                                                    </td>

                                                    <td>

                                                        @foreach ($k->history as $h)
                                                            @if ($loop->first)
                                                                {{ $h->death_date }}
                                                            @else
                                                            @endif
                                                        @endforeach

                                                    </td>

                                                    <td>

                                                        @foreach ($k->history as $h)
                                                            @if ($loop->first)
                                                                {{ $h->death_note }}
                                                            @else
                                                            @endif
                                                        @endforeach

                                                    </td>

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

    @section("script")

    @endsection
