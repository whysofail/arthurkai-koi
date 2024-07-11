@extends('layouts.apparthur')
@section('title', 'Arthurkai - KOI')
@section('aboutus', 'active')
@section('css')
@endsection
@section('content')
    <section class="hero-collection">
    </section>

    <section class="artists-section section-padding" id="section_2">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <div class="about-text-wrap">
                        <img src="{{ asset('website/images/aboutus.jpg') }}" class="about-image img-fluid">
                    </div>
                </div>

                <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex">
                    <div class="services-info">
                        <h2 class="text-dark mb-4">About Us</h2>

                        <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nibh metus,
                            accumsan eget ligula eu,
                            malesuada congue dui. Nunc magna felis, euismod luctus pellentesque ac, sagittis sit amet diam.
                            Ut laoreet, est eu pellentesque feugiat,
                            lorem neque lobortis eros, sit amet blandit nulla libero ac velit. Nulla sed scelerisque dui.
                            Pellentesque laoreet imperdiet odio non condimentum.
                            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec
                            posuere mollis dolor non ornare. Pellentesque non nisi diam.
                            Duis venenatis, quam a tempus dignissim, lectus nibh hendrerit felis, tincidunt ullamcorper ex
                            nunc eget velit. Suspendisse ut ante dictum, vehicula quam id, fermentum odio.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
