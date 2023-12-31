@extends("layouts.default")
@section("content")
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Nos services!</h5>
                <h1 class="mb-0">Liste respectives de nos différents services chez Simagro</h1>
            </div>
            <div class="row g-5 justify-content-center align-items-center">
                @foreach($services as $service)
                    <div class="col-lg-6 col-sm-12 col-md-6 wow zoomIn my-4" data-wow-delay="0.3s">
                        <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class="mx-auto  h-75">
                                <img src="{{asset('storage/'.$service->image)}}" style="object-fit: cover;width: 100%;height: 100%" alt="image" class="img-fluid">
                            </div>
                            <hr>
                            <div class="position-absolute border" style="min-width: 50%">
                                <h4 class="mb-3 text-light">{{$service->libelle}}</h4>
                                <p class="m-0 text-light">{!! $service->description !!}</p>
                                <a class="btn btn-lg btn-primary rounded" href="{{route('client.services.show',[$service->id])}}">
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
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
                        <h3 class="text-white text-uppercase mb-3 animated slideInDown">Services</h3>
                        <h6 class="display-4 text-white mb-md-4 animated zoomIn">Decrouvrez nos différents Services offerts!</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

