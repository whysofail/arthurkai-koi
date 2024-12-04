@extends("layouts.apparthur")
@section("title", "Arthurkai - KOI")
@section("contact", "active")
@section("css")
@endsection
@section("content")
<section class="artists-section " id="section_2">
      <div class="container justify-content-center align-content-center" style="min-height: 50vh;">
        <div class="d-flex">
            <div class="col-md-6">
                <h2>For more information</h2> 
                <p>Please kindly contact us at :</p>
            </div>
            <div class="col-md-6">
                <div class="services-info">
                    @if (!empty($contactus->email))
                    <div>
                        <span>
                            <a href="mailto:{{$contactus->email}}" style="color: black; font-size: 20px">
                            <i class="fas fa-envelope fa-lg"></i>
                            {{ $contactus->email }}
                        </a>
                    </span>
                </div>        
                @endif
                @if (!empty($contactus->whatsapp))
                <div>
                    <span>
                        <a href="https://wa.me/{{$contactus->whatsapp}}" style="color: black; font-size: 20px"  target="_blank"  rel="noopener noreferrer">
                        <i class="fab fa-whatsapp fa-lg"></i>
                            {{ $contactus->whatsapp }}
                        </a>
                    </span>
                </div>         
                @endif
            </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section("script")
@endsection
