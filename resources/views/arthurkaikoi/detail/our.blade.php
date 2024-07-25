@extends("layouts.apparthur")
@section("title", "Arthurkai - KOI")
@section("our", "active")
@section("css")
@endsection
@section("content")
    <section class="hero-collection">
        <div class="justify-content-center align-items-center">
            <img class="banner" src="{{ asset("website/images/collectionbanner.png") }}" alt="Collection Banner">
            <!-- <div class="search">
                                                                                                                                                                                                                                                    <input  class="search-txt" type="text" name="" placeholder="Type to search">
                                                                                                                                                                                                                                                    <a class="search-btn" href="#" >
                                                                                                                                                                                                                                                       <i class="fas fa-search"></i>
                                                                                                                                                                                                                                                    </a>
                                                                                                                                                                                                                                                </div> -->
        </div>
    </section>

    <section class="artists-section section-padding">
        <div class="container">
            <div class="row">

                <div class="details col-lg-4">
                    <img id="timeline-image" src="{{ asset("website/images/koi.png") }}">
                </div>
                <div class="spesifikasi col-lg-8">
                    <br>
                    <p class="namaikan">{{ $ourCollection->title ?? "Unknown" }}</p>
                    <hr>
                    <p>{{ $ourCollection->description ?? "No description." }}</p>
                    <div>
                        @if (isset($ourCollection->koi))
                            <div class="selected"
                                data-date="{{ date("d/m/Y", strtotime($ourCollection->koi->created_at ?? "-")) }}">
                                <p class="namaikan">{{ $ourCollection->koi->nickname ?? "No Nickname" }}</p>
                                <p>Variety: {{ $ourCollection->koi->variety->name ?? "-" }}</p>
                                <p>Breeder Farm: {{ $ourCollection->koi->breeder->name ?? "-" }}</p>
                                <p>Gender: {{ $ourCollection->koi->gender ?? "-" }}</p>
                                <p>Age: {{ \Carbon\Carbon::parse($ourCollection->koi->birthdate)->age ?? "-" }}
                                    years</p>
                                <p>Size: {{ $ourCollection->koi->size ?? "-" }}cm</p>
                            </div>
                        @endif
                    </div>
                    <div class="timeline">
                        <br>
                        <p class="namaikan">Timeline</p>
                        <hr>
                    </div>
                    <div class="cd-horizontal-timeline">
                        <div class="timeline">
                            <div class="events-wrapper">
                                <div class="events">
                                    <ol>
                                        <li><a href="#0" data-date="01/01/2020" class="selected">2020</a></li>
                                        <li><a href="#0" data-date="01/01/2021">2021</a></li>
                                        <li><a href="#0" data-date="01/01/2022">2022</a></li>
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
                                @if (isset($ourCollection->koi))
                                    <li class="selected"
                                        data-date="{{ date("d/m/Y", strtotime($ourCollection->koi->created_at ?? "-")) }}">
                                        <p class="namaikan">{{ $ourCollection->koi->nickname ?? "No Nickname" }}</p>
                                        <p>Variety: {{ $ourCollection->koi->variety->name ?? "-" }}</p>
                                        <p>Gender: {{ $ourCollection->koi->gender ?? "-" }}</p>
                                        <p>Age: {{ \Carbon\Carbon::parse($ourCollection->koi->birthdate)->age ?? "-" }}
                                            years</p>
                                        <p>Size: {{ $ourCollection->koi->size ?? "-" }}cm</p>
                                        <p>Farm: {{ $ourCollection->koi->breeder->name ?? "-" }}</p>
                                    </li>
                                @endif

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
