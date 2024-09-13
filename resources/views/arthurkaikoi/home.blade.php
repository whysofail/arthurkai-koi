@extends("layouts.apparthur")
@section("title", "Arthurkai - KOI")
@section("css")
@endsection
@section("content")
    <section class="hero-section">
        <div class="section-overlay"></div>

        <div class="container d-flex justify-content-center align-items-center">
            <div class="row">

                <div class="col-12 mt-auto mb-5 text-center">
                    <img src="{{ asset("website/images/arthurlogo.png") }}">

                    <h1 class="text-white mb-5"> </h1>

                    <a class="btn custom-btn smoothscroll" href="#section_2">Enter</a>
                </div>

            </div>
        </div>

        <div class="video-wrap">
            <!-- <img src="images/bannerkoi.jpg"> -->
            <video autoplay="" loop="" muted="" class="custom-video" poster="">
                <source src="{{ asset("website/video/TAIMOK022300001.MOV") }}" type="video/mp4">

                Your browser does not support the video tag.
            </video>
        </div>
    </section>

    <section class="artists-section section-padding" id="section_2">
        <div class="container">
            <div class="col-12 text-center">
                <div class="row justify-content-center">
                    <h2 class="mb-4">Our Collection</h1>
                        @if (count($ourCollection) >= 1)
                            @foreach ($ourCollection as $collection)
                                <div class="col-lg-3 col-6">
                                    @if (!empty($collection->koi->photo))
                                        @php
                                            $photos = array_filter(explode("|", $collection->koi->photo));
                                            $firstPhoto = !empty($photos) ? $photos[0] : null;
                                        @endphp
                                        <div class="artists-thumb">
                                            <div class="artists-image-wrap">
                                                <a href="{{ route("ourdetail", $collection->id) }}">
                                                    @if ($firstPhoto)
                                                        @php
                                                            $photoPath = public_path("img/koi/photo/" . $firstPhoto);
                                                        @endphp
                                                        @if (file_exists($photoPath))
                                                            <img src="{{ asset("img/koi/photo/" . $firstPhoto) }}"
                                                                class="artists-image img-fluid">
                                                        @else
                                                            <img src="{{ asset("img/assets/broken.png") }}" class="img"
                                                                 alt="Placeholder">
                                                        @endif
                                                    @endif
                                                </a>
                                            </div>
                                            <div>
                                                <p class="namaikan">{{ $collection->title }}</p>
                                                <p class="jenisikan">{{ $collection->koi->variety->name }}</p>
                                            </div>
                                    @endif
                                </div>
                </div>
                @endforeach
            @else
                <h2>Hi there, currently there's no Koi listed.</h2>
                @endif
            </div>
        </div>

        {{-- <div class="col-12 text-center">
                <p class="deskripsi mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                    Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
            </div> --}}

        <a href="{{ route("our") }}" class="buttoncollection seecollection">See More >></a>

        </div>
        </div>
    </section>

    <section class="about-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="mb-4">Event</h1>
                </div>
                @if (count($news) >= 1)
                    @foreach ($news as $news)
                        <div class="boxcard col-lg-4 col-12">
                            <div class="event-thumb">
                                <img class="thumbnail" src="{{ asset("img/koi/website/news/" . $news->image) }}">
                                <div class="card-details">
                                    <h3 class="bold namaikan">{{ $news->title }}</h3>
                                    <p>{{ $news->updated_at->format("F j, Y") }}</p>
                                    <p class="eventdesc">
                                        {{ $news->description }}
                                    </p>
                                    <a href="{{ route("news.detail", $news->slug) }}" class="buttonevent seemore">See
                                        More
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @else
                    <h4>Hi there, currently there's no News listed.</h4>
                @endif
                {{-- <div class="boxcard col-lg-4 col-12">
                    <div class="event-thumb">
                        <img class="thumbnail" src="{{ asset("website/images/articlekoi.jpg") }}">
                        <div class="card-details">
                            <p class="bold namaikan"> EVENT NAME </p>
                            <p>21 Feb 2024</p>

                            <p class="eventdesc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                                ultrices gravida.
                                Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                            <a href="#" class="buttonevent seemore">See More >></a>
                        </div>

                    </div>
                </div> --}}
    </section>
    <section class="article-section section-padding">
        <div class="container">
            {{-- <div class="row contentart justify-content-center">
                <div class="col-lg-6 col-12">
                    <div class="article">
                        <h3>Article</h3>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                            Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                        <a href="#" class="buttonarticle seearticle">See More >></a>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <img class="articleimg" src="{{ asset("website/images/koi.jpg") }}">
                </div>
            </div> --}}
            <div class="row infoart justify-content-center">
                <div class="col-lg-5 col-12">
                    <img class="articleimg" src="{{ asset("website/images/koi.jpg") }}">
                </div>
                <div class="col-lg-3 col-12">
                    <div class="article">
                        <h3>ARTHUR KAI KOI</h3>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                            Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="article">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.075784823057!2d106.8507885!3d-6.2282294!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f536893df215%3A0xe6d8aeac2595855e!2sARTEE%20Group!5e0!3m2!1sid!2sid!4v1717409752956!5m2!1sid!2sid"
                            width="350" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section("script")
@endsection
