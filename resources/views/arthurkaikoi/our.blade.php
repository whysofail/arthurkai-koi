@extends("layouts.apparthur")
@section("title", "Arthurkai - KOI | Our Collection")
@section("our", "active")
@section("css")
    <style>
        [aria-disabled="true"] {
            display: none;
        }

        [rel="prev"],
        [rel="next"] {
            display: none;
        }

        span[aria-current="page"]>span {
            background-color: #99D8FA !important;
        }
    </style>
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
                @if ($ourCollection !== null)
                    @foreach ($ourCollection as $collection)
                        <div class="artists-thumb">
                            @php
                                $photos = !empty($collection->koi->photo) ? array_filter(explode("|", $collection->koi->photo)) : [];
                                $firstPhoto = !empty($photos) ? $photos[0] : null;
                            @endphp
                            <div class="photo">
                                <a href="{{ route('ourdetail', $collection->id) }}">
                                    @if ($firstPhoto)
                                        @php
                                            $photoPath = public_path("img/koi/photo/" . $firstPhoto);
                                        @endphp
                                        @if (file_exists($photoPath))
                                            <img src="{{ asset("img/koi/photo/" . $firstPhoto) }}">
                                        @else
                                            <img src="{{ asset("img/assets/broken.png") }}" class="img"
                                                style="object-fit: contain;" alt="Placeholder">
                                        @endif
                                    @else
                                        <img src="{{ asset("img/assets/broken.png") }}" class="img"
                                            style="object-fit: contain;" alt="No Photo Available">
                                    @endif
                                </a>
                            </div>
                            <div>
                                <p class="namaikan">{{ $collection->title }}</p>
                                <p class="jenisikan">{{ $collection->koi->variety->name ?? '-' }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            
            <div class="pagination">
                {{ $ourCollection->links() }}
                {{-- <a href="page2.html" class="next">Next</a> --}}
            </div>
        </div>
    </section>
@endsection

@section("script")
@endsection
