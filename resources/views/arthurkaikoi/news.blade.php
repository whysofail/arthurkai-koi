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
                <div class="d-flex flex-wrap justify-content-center gap-4">
                    @foreach ($news as $item)
                    <div class="col-md-3 col-sm-6 mb-4 d-flex">
                        <a href="{{ route('news.detail', $item->slug) }}" class="w-100 text-decoration-none">
                            <div class="artists-thumb p-2 bg-white shadow-lg hover-shadow transition d-flex flex-column justify-content-between" 
                                style="border-radius: 30px; min-height: 450px;">
                                <div>
                                    <!-- Image Section -->
                                    <div class="photo overflow-hidden rounded mb-3" 
                                        style="height: 200px; min-height: 200px; max-height: 200px;">
                                        <img 
                                            class="imagenews img-fluid w-100 h-100" 
                                            style="object-fit: cover;"
                                            src="{{ asset('img/koi/website/news/' . $item->image) }}" 
                                            alt="{{ $item->title }}">
                                    </div>
                                    <!-- Title and Description -->
                                    <div class="text-center">
                                        <p class="namaikan fw-bold text-dark">{{ $item->title }}</p>
                                        <p class="jenisikan text-muted small">
                                            {{ Str::limit(strip_tags($item->description), 30, '...') ?? '-' }}
                                        </p>
                                    </div>
                                </div>
                                <!-- Footer Section -->
                                <div class="mt-auto text-center">
                                    <p class="fw-light text-muted small mt-2">
                                        {{ $item->updated_at->format('F j, Y') }}
                                    </p>
                                    <span class="fw-lighter text-muted small">
                                        {{ ucfirst($item->type) }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="pagination mt-5">
                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </section>
    
    
    
    
@endsection

@section("script")
@endsection
