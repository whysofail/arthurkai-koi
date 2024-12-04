@extends("layouts.apparthur")
@section("title", "Arthurkai - KOI")
@section("css")
@endsection
@section("content")
    <section class="hero-collection">
        <div class="justify-content-center align-items-center">
            <img class="banner" src="{{ asset("website/images/collectionbanner.png") }}" alt="Collection Banner">
        </div>
    </section>
        <section class="artists-section pt-4">
            <div class="container">
                <img class="img-fluid" src="{{ asset("img/koi/website/news/" . $news->image) }}">
                <h1>
            {{ $news->title }}
        </h1>
        {!! $news->description !!}
    </div>
    </section>
@endsection

@section("script")
@endsection
