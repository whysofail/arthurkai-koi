@extends("layouts.apparthur")
@section("title", "Arthurkai - KOI")
@section("our", "active")
@section("css")
@endsection
@section("content")
    <section class="hero-collection">
        <div class="justify-content-center align-items-center">
            <img class="banner" src="{{ asset("website/images/collectionbanner.png") }}" alt="Collection Banner">
        </div>
        </div>
    </section>

    <section class="artists-section section-padding">
        <div class="container">
            <div class="row">
                <div class="details col-lg-4">
                    <div class="swiper ourSwiper">
                        <div class="swiper-wrapper">
                            @if (!empty($ourCollection->koi->photo))
                                @php
                                    $photos = explode("|", $ourCollection->koi->photo);
                                @endphp
                                @foreach ($photos as $photo)
                                    <div class="swiper-slide">
                                        <img class="img-thumbnail" src="{{ asset("img/koi/photo/" . $photo) }}">
                                    </div>
                                @endforeach
                            @else
                                <img src="{{ asset("img/assets/broken.png") }}" class="img" style="object-fit: contain;"
                                    alt="Placeholder">
                            @endif
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="spesifikasi col-lg-8">
                    <div class="timeline">
                        Timeline
                    </div>
                    <div class="cd-horizontal-timeline">
                        <div class="timeline">
                            <div class="events-wrapper">
                                <div class="events">
                                    <ol>
                                        @foreach ($ourCollection->koi->history as $history)
                                            <li><a href="#0"
                                                    data-date="{{ "01/01/" . $history->year }}">{{ $history->year }}</a>
                                            </li>
                                        @endforeach
                                    </ol>

                                    <span class="filling-line" aria-hidden="true"></span>
                                </div> <!-- .events -->
                            </div> <!-- .events-wrapper -->

                            <ul class="cd-timeline-navigation">
                                <li><a href="#0" class="prev inactive">Prev</a></li>
                                <li><a href="#0" class="next">Next</a></li>
                            </ul> <!-- .cd-timeline-navigation -->
                        </div> <!-- .timeline -->

                        <div class="events-content">
                            <ol>
                                @foreach ($ourCollection->koi->history as $historyContent)
                                    <li data-date="{{ "01/01/" . $historyContent->year }}"
                                        class="@if ($loop->first) selected @endif">
                                        <p>year : {{ $historyContent->year }}</p>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur ipsa ab tempore
                                        ipsam quaerat deleniti sequi odio itaque dolore, veritatis nam ad provident
                                        cupiditate nostrum tempora omnis ullam. Eos, quia!
                                        <p class="namaikan">Ginrin Shinwa</p>
                                        <p>Variety: -</p>
                                        <p>Gender: Female</p>
                                        <p>Age: -</p>
                                        <p>Size: 16cm</p>
                                        <p>Farm: -</p>
                                    </li>
                                @endforeach
                            </ol>
                        </div> <!-- .events-content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section("script")
    <script src="{{ asset("website/js/timeline.js") }}"></script>
@endsection
<script type="module">
    const swiper = new Swiper(".ourSwiper", {
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
