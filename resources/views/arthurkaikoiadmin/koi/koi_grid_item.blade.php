<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4"
style="padding-left: 10px; padding-right: 10px; padding-top: 10px;">
<div class="content_box"><a href="{{ route("cmskoidetail", $k->id) }}">
        @if (!empty($k->photo))
            @php
                $photos = array_filter(explode("|", $k->photo));
                $firstPhoto = !empty($photos) ? $photos[0] : null;
            @endphp
            <div id="existing-photos">
                @if ($firstPhoto)
                    @php
                        $photoPath = public_path(
                            "img/koi/photo/" . $firstPhoto,
                        );
                    @endphp
                    @if (file_exists($photoPath))
                        <div class="photo-item">
                            <img class="img-fluid card-img-top"
                                src="{{ asset("img/koi/photo/" . $firstPhoto) }}"
                                alt="Photo"
                                style="object-fit: contain;">
                        </div>
                        <br>
                    @else
                        <div class="photo-item">
                            <img src="{{ asset("img/assets/broken.png") }}"
                                class="img-fluid card-img-top"
                                style="object-fit: cover; width: 100%; height: auto;"
                                alt="Placeholder">
                        </div>
                    @endif
                @endif
            </div>
        @else
            <div class="photo-item">
                <img src="{{ asset("img/assets/broken.png") }}"
                    class="img-fluid card-img-top"
                    style="object-fit: cover; width: 100%; height: auto;"
                    alt="Placeholder">
            </div>
        @endif
    </a>
    <h6>
        <a style="text-decoration: underline; color:black; font-size: 1.25em;"
            href="{{ route("cmskoidetail", $k->id) }}">
            {{ $k->code ?? "-" }}</a>
    </h6>
    <table class="grid-table"
        style="width: 100%;  text-align: left; font-size: 14px;">
        <tr>
            <td style=""><strong>Variety</strong></td>
            <td style="">:</td>
            <td style="">{{ $k->variety->name ?? "-" }}</td>
        </tr>
        <tr>
            <td style=""><strong>Bloodline </strong>
            </td>
            <td style="">:</td>
            <td style="">{{ $k->bloodline->name ?? "-" }}</td>
        </tr>
        <tr>
            <td style=""><strong>Breeder Name</strong>
            </td>
            <td style="">:</td>
            <td style="">{{ $k->breeder->name ?? "-" }}</td>
        </tr>

        <tr>
            <td style=""><strong>Gender</strong></td>
            <td style="">:</td>
            <td style="">{{ $k->gender ?? "-" }}</td>
        </tr>

        <tr>

            <td style=""><strong>Age</strong></td>

            <td style="">:</td>

            <td style="">

                @if ($k->birth)
                    @php
                        $umur = \Carbon\Carbon::parse($k->birth)->diff(
                            \Carbon\Carbon::now(),
                        );
                        $umurTahun = $umur->y;
                        $umurBulan = $umur->m;
                        echo $umurTahun . "yr " . $umurBulan . "m";
                    @endphp
                @else
                    -
                @endif

            </td>

        </tr>

        <tr>

            <td style=""><strong>Status</strong></td>

            <td style="">:</td>

            <td style="">

                <div class="btn-group">

                    <button class="btn-light" disabled
                        style="font-size: 14px;">-</button>

                    @if ($k->status == "Available")
                        <button type="button"
                            class="btn btn-sm btn-success"
                            style="font-size: 12px;">Available</button>
                    @elseif($k->status == "Sold")
                        <button type="button"
                            class="btn btn-sm btn-danger"
                            style="font-size: 12px;">Sold</button>
                    @elseif($k->status == "Death")
                        <button type="button"
                            class="btn btn-sm btn-default"
                            style="background: purple; color: white; font-size: 12px;">Death</button>
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

                            <input type="hidden" name="id"
                                value="{{ $k->id }}">

                            <input type="hidden" name="n_status"
                                value="Available">

                            <button
                                class="dropdown-item btn-sm">Available</button>

                        </form>

                        <form action="{{ route("cmsstatusupdate") }}"
                            method="POST">

                            @csrf

                            <input type="hidden" name="id"
                                value="{{ $k->id }}">
                            <input type="hidden" name="n_status"
                                value="Sold">
                            <button
                                class="dropdown-item btn-sm">Sold</button>
                        </form>

                        <form action="{{ route("cmsstatusupdate") }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="id"
                                value="{{ $k->id }}">
                            <input type="hidden" name="n_status"
                                value="Death">

                            <button
                                class="dropdown-item btn-sm">Death</button>
                        </form>
                    </div>
                </div>
            </td>
            </td>
        </tr>
    </table>

    <div class="grid_1 simpleCart_shelfItem"
        style="margin-top: 32px; padding-bottom: 16px;">
        <div class="item_add" style="display: inline-flex;">
            <span style="display: flex !important; gap: 2px;">
                <a href="{{ route("cmskoiEdit", $k->id) }}"
                    class="btn btn-warning btn-xs" style="width: 30px"><i
                        class="fas fa-edit"></i></a>

                <a href="#bannerformmodal{{ $k->id }}"
                    class="btn btn-danger btn-xs" data-toggle="modal"
                    data-target="#modal-danger{{ $k->id }}"
                    style="color: black; width: 30px"><i
                        class="far fa-trash-alt"></i></a>

                <a href="{{ route("cmskoidetail", $k->id) }}"
                    class="btn btn-info btn-xs"
                    style="background: black;">Details</a>

            </span>
        </div>

        <div class="item_add" style="display: inline-flex;">

            <span style="display: flex !important;">

                <a href="{{ route("cmskoidetailgrid", $k->id) }}"
                    class="btn btn-xs"
                    style="background: darkred; color:white; border: 1px solid #62200a; width 30px;"
                    data-toggle="modal"
                    data-target="#modalShowVideo{{ $k->id }}"><i
                        class="fas fa-video"></i></a>

                <!-- modalShowVideo -->

                <div class="modal fade bannerformmodal{{ $k->id }}"
                    id="modalShowVideo{{ $k->id }}">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header"
                                style="display: block; text-align: center;">

                                <h5 class="modal-title">

                                    {{ $k->koi_code }}</h5>

                                <button type="button" class="close"
                                    data-dismiss="modal"
                                    aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                            <div class="modal-body"
                                style="text-align: center">

                                <div class="swiper mySwiper">

                                    <div class="swiper-wrapper">

                                        @foreach ($k->history as $h)
                                            @if ($loop->first)
                                                @foreach (explode("|", $h->link_video) as $image)
                                                    @if ($image != null)
                                                        <div
                                                            class="swiper-slide">

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
                                    <div class="swiper-pagination">
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div
                                class="modal-footer justify-content-between">
                                <button type="button"
                                    class="btn btn-default"
                                    data-dismiss="modal"><i
                                        class="fas fa-long-arrow-alt-left"></i></button>

                                {{-- <a href="{{ route('cmskoiDelete', $k->id) }}"
    type="button" class="btn btn-danger">Delete</a> --}}
                            </div>
                        </div>
                    </div>

                </div>

                <!-- /.modalShowVideo -->

                <a href="{{ route("cmskoidetail", $k->id) }}"
                    class="btn btn-xs"
                    style="background: darkblue; color:white; border: 1px solid #62200a; margin-left: 5px; width 30px;"
                    data-toggle="modal"
                    data-target="#modalShowPhoto{{ $k->id }}"><i
                        class="far fa-image"></i></a>

                <!-- modalShowPhoto -->

                <div class="modal fade bannerformmodal{{ $k->id }}"
                    id="modalShowPhoto{{ $k->id }}">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header"
                                style="display: block; text-align: center;">

                                <h5 class="modal-title">

                                    {{ $k->koi_code }}</h5>

                                <button type="button" class="close"
                                    data-dismiss="modal"
                                    aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                            <div class="modal-body"
                                style="text-align: center">

                                <div class="swiper mySwiper">

                                    <div class="swiper-wrapper">

                                        @foreach ($k->history as $h)
                                            @if ($loop->first)
                                                @foreach (explode("|", $h->link_photo) as $image)
                                                    @if ($image != null)
                                                        <div
                                                            class="swiper-slide">

                                                            <img width="125"
                                                                class="img-thumbnail"
                                                                src="{{ asset("img/koi/photo/" . $image) }}">

                                                        </div>
                                                    @else
                                                    @endif
                                                @endforeach
                                            @else
                                            @endif
                                        @endforeach

                                    </div>

                                    <div class="swiper-pagination">

                                    </div>

                                </div>

                                <div class="swiper-button-next"></div>

                                <div class="swiper-button-prev"></div>

                            </div>

                            <div
                                class="modal-footer justify-content-between">

                                <button type="button"
                                    class="btn btn-default"
                                    data-dismiss="modal"><i
                                        class="fas fa-long-arrow-alt-left"></i></button>

                                {{-- <a href="{{ route('cmskoiDelete', $k->id) }}"
    type="button" class="btn btn-danger">Delete</a> --}}

                            </div>

                        </div>

                    </div>

                </div>

                <!-- /.modalShowPhoto -->

                <a href="{{ route("cmskoidetail", $k->id) }}"
                    class="btn btn-primary btn-xs" data-toggle="modal"
                    data-target="#modalShowDocument{{ $k->id }}"
                    style="margin-left: 5px; width 30px;"><i
                        class="fas fa-photo-video"></i></a>

                <!-- modalShowDocument -->

                <div class="modal fade bannerformmodal{{ $k->id }}"
                    id="modalShowDocument{{ $k->id }}">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header"
                                style="display: block; text-align: center;">

                                <h5 class="modal-title">

                                    {{ $k->koi_code }}</h5>

                                <button type="button" class="close"
                                    data-dismiss="modal"
                                    aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                            <div class="modal-body"
                                style="text-align: center">

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
                                    <div class="swiper-pagination">
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div
                                class="modal-footer justify-content-between">
                                <button type="button"
                                    class="btn btn-default"
                                    data-dismiss="modal"><i
                                        class="fas fa-long-arrow-alt-left"></i></button>

                                {{-- <a href="{{ route('cmskoiDelete', $k->id) }}"
    type="button" class="btn btn-danger">Delete</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modalShowVideo -->
            </span>
        </div>
        <div class="modal fade bannerformmodal{{ $k->id }}"
            id="modal-danger{{ $k->id }}">
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
                        <a href="{{ route("cmskoigridDelete", $k->id) }}"
                            type="button"
                            class="btn btn-danger">Delete</a>
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