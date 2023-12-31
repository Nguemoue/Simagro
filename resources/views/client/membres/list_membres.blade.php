@extends("layouts.default")
@section("content")
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Notre equipes!</h5>
                <h1 class="mb-0">Plus bas la liste de nos différentes équipes</h1>
            </div>
            <div class="row g-5">
                @foreach($membres as $membre)
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="membre-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="membre-icon2">
                                <img src="{{asset('storage/'.$membre->photo_url)}}" alt="" class="img-fluid">
                            </div>
                            <h4 class="mb-3">{{$membre->fullname}}</h4>
                            <p class="m-0">{!! $membre->fonction !!}</p>
                            <a class="btn btn-lg btn-primary rounded" href="{{route('client.membres.show',[$membre->id])}}">
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@section("header-carousel")
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{asset('img/blog-1.jpg')}}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h3 class="text-white text-uppercase mb-3 animated slideInDown">Membres</h3>
                        <h6 class="display-4 text-white mb-md-4 animated zoomIn">Vous avez plus bas une liste complete de toute l'equipe!</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

