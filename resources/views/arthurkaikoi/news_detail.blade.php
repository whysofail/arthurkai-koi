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
    <section>
        <h1>
            {{ $news->title }}
        </h1>
        <img src="{{ asset("img/koi/website/news/" . $news->image) }}">
        {!! $news->description !!}
    </section>
@endsection

@section("script")
@endsection
