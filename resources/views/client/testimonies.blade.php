@extends("layouts.default")
@section("content")
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Tous les temoignages!</h5>
                <h1 class="mb-0">Listes des témoignages de l'application!</h1>
            </div>
            <div class="row g-5">
                @foreach($temoignages as $temoignage)
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="membre-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center p-2">
                            <div class="membre-icon">
                                <img src="{{asset('img/testimonial-1.jpg')}}" alt="image temoignage" class="img-fluid"/>
                            </div>
                            <h4 class="mb-3">{{$temoignage->client->fullname}}</h4>
                            <p class="m-0">{!! $temoignage->contenu !!}</p>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row my-4 w-75 mx-auto">
                {{$temoignages->links()}}
            </div>
        </div>
    </div>
@endsection

@section("header-carousel")
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{asset('img/carousel-2.old.jpg')}}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h3 class="text-white text-uppercase mb-3 animated slideInDown">Temoignages</h3>
                        <h6 class="display-4 text-white mb-md-4 animated zoomIn">Les clients etant ravi vont faire ce temoignages</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

