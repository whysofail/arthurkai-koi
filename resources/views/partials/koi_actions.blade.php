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

                <p>You are about to delete this item</p>
                <p>Delete this item?</p>

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

<a href="{{ route("cmskoidetail", ["id", $k->id]) }}" class="btn btn-xs"
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
                        @if (!empty($k->video))
                            @php
                                $videos = explode("|", $k->video);
                            @endphp
                            @foreach ($videos as $video)
                                <div class="swiper-slide">
                                    <video controls="controls" style="width: 100%" name="{{ $video }}">
                                        <source src="{{ asset("img/koi/video/" . $video) }}">
                                    </video><br>
                                </div>
                            @endforeach
                        @else
                            <p>No Video</p>
                        @endif

                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
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
                            @php
                                $photos = explode("|", $k->photo);
                            @endphp
                            @foreach ($photos as $photo)
                                <div class="swiper-slide">
                                    @if (file_exists(public_path("img/koi/photo/" . $photo)))
                                        <img class="img-thumbnail" src="{{ asset("img/koi/photo/" . $photo) }}"
                                            alt="Koi Photo" style="display: block;">
                                    @else
                                        <img class="img-thumbnail" src="{{ asset("img/assets/broken.png") }}"
                                            alt="Image Not Found" style="display: block;">
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <p>-</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
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
                            @if (!empty($k->trophy))
                                <img width="125" class="img-thumbnail"
                                    src="{{ asset("img/koi/trophy/" . $k->trophy) }}">
                            @else
                                <p>No Trophy Listed.</p>
                            @endif
                        </div>
                    </div>
                    <div class="swiper-slide">
                        @if (isset($k->certificate) && $k->certificate != null)
                            <img width="125" class="img-thumbnail"
                                src="{{ asset("img/koi/certificate/" . $k->certificate) }}">
                        @else
                            <p>No Certificate Listed.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<div class="modal-footer justify-content-between">
    {{-- <button type="button" class="btn btn-default" data-dismiss="modal"><i --}}
    {{-- class="fas fa-long-arrow-alt-left"></i></button> --}}
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
            <input type="hidden" name="id" value="{{ $k->id }}">
            <input type="hidden" name="status" value="Available">
            <button class="dropdown-item">Available</button>
        </form>
        <form action="{{ route("cmsstatusupdate") }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $k->id }}">

            <input type="hidden" name="status" value="Sold">

            <button class="dropdown-item">Sold</button>
        </form>
        <form action="{{ route("cmsstatusupdate") }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $k->id }}">
            <input type="hidden" name="status" value="Death">
            <button class="dropdown-item">Death</button>
        </form>

    </div>

</div>

<script type="module">
    const swiper = new Swiper(".mySwiper", {
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
            clickable: true,
        },
    });
</script>
