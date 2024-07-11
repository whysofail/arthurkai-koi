@extends("layouts.apparthur")

@section("title", "Arthurkai - KOI")

@section("aboutus", "active")

@section("css")

@endsection

@section("content")

    <section class="hero-collection">

    </section>

    <section class="artists-section section-padding" id="section_2">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-12">

                    <div class="about-text-wrap">

                        <img src="{{ asset("website/images/aboutus.jpg") }}" class="about-image img-fluid">

                    </div>

                </div>

                <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex">

                    <div class="services-info">

                        <h2 class="text-dark mb-4">About Us</h2>

                        <p class="text-dark">
                            @if ($data)
                                {!! $data->description !!}
                            @endif
                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection

@section("script")

@endsection
