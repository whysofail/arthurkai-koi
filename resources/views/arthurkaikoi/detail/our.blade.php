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
                    <div class="timeline">
                        Timeline
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
                                <li class="selected" data-date="01/01/2020">
                                    <p class="namaikan">Ginrin Shinwa</p>
                                    <p>Variety: -</p>
                                    <p>Gender: Female</p>
                                    <p>Age: -</p>
                                    <p>Size: 16cm</p>
                                    <p>Farm: -</p>
                                </li>

                                <li data-date="01/01/2021">
                                    <p class="namaikan">Ginrin Shinwa</p>
                                    <p>Variety: -</p>
                                    <p>Gender: Female</p>
                                    <p>Age: -</p>
                                    <p>Size: 16cm</p>
                                    <p>Farm: -</p>
                                </li>

                                <li data-date="01/01/2022">
                                    <p class="namaikan">Ginrin Shinwa</p>
                                    <p>Variety: -</p>
                                    <p>Gender: Female</p>
                                    <p>Age: -</p>
                                    <p>Size: 18cm</p>
                                    <p>Farm: -</p>
                                </li>
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
