@extends("layouts.apparthur")
@section("title", "Arthurkai - KOI | Our Collection")
@section("our", "active")
@section("css")
@endsection
@section("content")
    <section class="hero-collection">
        <div class="justify-content-center align-items-center">
            <img class="banner" src="{{ asset("website/images/collectionbanner.png") }}" alt="Collection Banner">
            <div class="search">
                <input class="search-txt" type="text" name="" placeholder="Type to search">
                <a class="search-btn" href="#">
                    <i class="fas fa-search"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="artists-section section-padding" id="section_2">
        <div class="container">
            <div class="galeri">
                {{ $ourCollection }}
                @if ($ourCollection !== null)
                    @foreach ($ourCollection as $collection)
                        <div class="artists-thumb">
                            @if (!empty($collection->koi->photo))
                                @php
                                    $photos = array_filter(explode("|", $collection->koi->photo));
                                    $firstPhoto = !empty($photos) ? $photos[0] : null;
                                @endphp
                                <div class="photo">
                                    @if ($firstPhoto)
                                        @php
                                            $photoPath = public_path("img/koi/photo/" . $firstPhoto);
                                        @endphp
                                        <a href="{{ route("ourdetail", $collection->id) }}">
                                            @if (file_exists($photoPath))
                                                <img src="{{ asset("img/koi/photo/" . $firstPhoto) }}">
                                            @else
                                                <img src="{{ asset("img/assets/broken.png") }}" class="img"
                                                    style="object-fit: contain;" alt="Placeholder">
                                            @endif
                                        </a>
                                    @endif
                                    </a>
                                </div>
                            @endif
                            <div>
                                <p class="namaikan">{{ $collection->title }}</p>
                                <p class="jenisikan">{{ $collection->koi->variety->name ?? "-" }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="pagination">
                <a href="page2.html" class="next">Next</a>
            </div>
        </div>
    </section>
@endsection

@section("script")
@endsection
