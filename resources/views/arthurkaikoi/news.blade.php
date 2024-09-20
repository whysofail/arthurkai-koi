@extends("layouts.apparthur")
@section("title", "Arthurkai - KOI")
@section("news", "active")
@section("css")
@endsection
@section("content")
    <section class="hero-collection">
        <div class="justify-content-center align-items-center">
            <img class="banner" src="{{ asset("website/images/collectionbanner.png") }}" alt="Collection Banner">
        </div>
    </section>
    <section class="artists-section section-padding" id="section_2">
        <div class="container">
            <div class="row">
                <div class="galeri">
                    @foreach ($news as $item)
                        <div class="artists-thumb">
                            <div class="photo">
                                <a href="{{ route("news.detail", $item->slug) }}">
                                    <img class="imagenews" src="{{ asset("img/koi/website/news/" . $item->image) }}"
                                        alt="{{ $item->title }}">
                                </a>
                            </div>
                            <div>
                                <p class="namaikan">{{ $item->title }}</p>

                                <p class="jenisikan">{!! Str::limit($item->description, 40, "...") ?? "-" !!}</p>
                                {{ $item->type }}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination">
                    {{ $news->links() }}
                    {{-- <a href="page2.html" class="next">Next</a> --}}
                </div>
            </div>
        </div>
    </section>
@endsection

@section("script")
@endsection
