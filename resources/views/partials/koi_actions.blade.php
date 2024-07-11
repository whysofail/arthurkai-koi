<span style="display: flex !important; gap: 4px">
    <a href="{{ route("cmskoiEdit", $k->id) }}" class="btn btn-warning btn-xs" style="width: 30px"><i
            class="fas fa-edit"></i></a>
    <a href="#bannerformmodal{{ $k->id }}" class="btn btn-danger btn-xs" data-toggle="modal"
        data-target="#modalDelete{{ $k->id }}" style="width: 30px"><i class="far fa-trash-alt"></i></a>
    <a href="{{ route("cmskoidetail", $k->id) }}" class="btn btn-info btn-xs" style="background: black;">Details</a>
</span>
<!-- modalDELETE -->
<div class="modal fade bannerformmodal{{ $k->id }}" id="modalDelete{{ $k->id }}">
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
                <a href="{{ route("cmskoiDelete", $k->id) }}" type="button" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

<!-- /.modalDELETE -->
<br /><br />

<a href="{{ route("cmskoidetail", ['id', $k->id)] }}" class="btn btn-xs"
    style="background: darkred; color:white; border: 1px solid #62200a" data-toggle="modal"
    data-target="#modalShowVideo{{ $k->id }}"><i class="fas fa-video"></i></a>
<!-- modalShowVideo -->
<div class="modal fade bannerformmodal{{ $k->id }}" id="modalShowVideo{{ $k->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="display: block; text-align: center;">
                <h5 class="modal-title">{{ $k->code }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="swiper mySwiper" style="text-align: center">
                    <div class="swiper-wrapper">
                        @foreach ($k as $h)
                            @if ($loop->first)
                                @if (!empty($h->video))
                                    @foreach (explode("|", $h->video) as $image)
                                        @if (!empty($image))
                                            <div class="swiper-slide">
                                                <video controls="controls" style="width: 80%"
                                                    name="{{ $image }}">
                                                    <source src="{{ asset("img/koi/video/" . $image) }}">
                                                </video><br>
                                            </div>
                                        @else
                                            <p style="text-align: center;">-</p>
                                        @endif
                                    @endforeach
                                @else
                                    <p style="text-align: center;">No video available.</p>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="swiper-pagination"></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i
                class="fas fa-long-arrow-alt-left"></i></button>
        {{-- <a href="{{ route('cmskoiDelete', $k->id) }}"
                    type="button" class="btn btn-danger">Delete</a> --}}
    </div>
</div>
</div>
</div>
<!-- /.modalShowVideo -->
<a href="{{ route("cmskoidetail", $k->id) }}" class="btn btn-xs"
    style="background: darkblue; color:white; border: 1px solid #62200a" data-toggle="modal"
    data-target="#modalShowPhoto{{ $k->id }}"><i class="far fa-image"></i></a>
<!-- modalShowPhoto -->
<div class="modal fade bannerformmodal{{ $k->id }}" id="modalShowPhoto{{ $k->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="display: block; text-align: center;">
                <h5 class="modal-title">{{ $k->code }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @if (!empty($k->photo))
                            <img width="125" class="img-thumbnail" src="{{ asset("img/koi/photo/" . $k->photo) }}"
                                style="display: block; margin: 0 auto;">
                        @else
                            <p>-</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i
                    class="fas fa-long-arrow-alt-left"></i></button>
            {{-- <a href="{{ route('cmskoiDelete', $k->id) }}"
                    type="button" class="btn btn-danger">Delete</a> --}}
        </div>
    </div>
</div>
</div>
<!-- /.modalShowPhoto -->

<!-- /.modalShowDocument -->
<a href="{{ route("cmskoidetail", $k->id) }}" class="btn btn-primary btn-xs" data-toggle="modal"
    data-target="#modalShowDocument{{ $k->id }}"><i class="fas fa-photo-video"></i></a>
<!-- modalShowDocument -->
<div class="modal fade bannerformmodal{{ $k->id }}" id="modalShowDocument{{ $k->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="display: block; text-align: center;">
                <h5 class="modal-title">{{ $k->koi_code }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="text-align: center">
                <div class="swiper mySwiper" style="text-align: center">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            @if (!empty($h->trophy))
                                <img width="125" class="img-thumbnail"
                                    src="{{ asset("img/koi/trophy/" . $h->trophy) }}">
                            @else
                                <p>No Trophy Listed.</p>
                            @endif
                        </div>
                    </div>
                    <div class="swiper-slide">
                        @if (isset($h->certificate) && $h->certificate != null)
                            <img width="125" class="img-thumbnail"
                                src="{{ asset("img/koi/certificate/" . $h->certificate) }}">
                        @else
                            <p>No Certificate Listed.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal"><i
            class="fas fa-long-arrow-alt-left"></i></button>
    {{-- <a href="{{ route('cmskoiDelete', $k->id) }}"
                    type="button" class="btn btn-danger">Delete</a> --}}
</div>
</div>
</div>
</div>
<!-- /.modalShowVideo -->

<br /><br />
<div class="btn-group">
    <button class="btn-light" disabled style="font-size: 14px;">-</button>
    @if ($k->status == "Available")
        <button type="button" class="btn btn-sm btn-success">Available</button>
    @elseif($k->status == "Sold")
        <button type="button" class="btn btn-sm btn-danger">Sold</button>
    @elseif($k->status == "Death")
        <button type="button" class="btn btn-sm btn-default" style="background: purple; color: white">Death</button>
    @else
    @endif
    <button type="button" class="btn btn-default btn-xs dropdown-toggle dropdown-icon" data-toggle="dropdown">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" role="menu">
        <form action="{{ route("cmsstatusupdate") }}" method="POST">
            @csrf
            <input type="hidden" name="id_koi" value="{{ $k->id }}">
            <input type="hidden" name="n_status" value="Available">
            <button class="dropdown-item">Available</button>
        </form>
        <form action="{{ route("cmsstatusupdate") }}" method="POST">
            @csrf
            <input type="hidden" name="id_koi" value="{{ $k->id }}">
            <input type="hidden" name="n_status" value="Sold">
            <button class="dropdown-item">Sold</button>
        </form>
        <form action="{{ route("cmsstatusupdate") }}" method="POST">
            @csrf
            <input type="hidden" name="id_koi" value="{{ $k->id }}">
            <input type="hidden" name="n_status" value="Death">
            <button class="dropdown-item">Death</button>
        </form>
    </div>
</div>
