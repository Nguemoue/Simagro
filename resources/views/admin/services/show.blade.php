@extends("layouts.dashboard.dashboard_admin_template")

@section("main-content")

    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="card-title">Affichage du service</h4>
            </div>

            <div class="card-body">
                <h3>Titre du service</h3>
                <div class="card">
                    <div class="card-header">
                        {{$service->libelle}}
                    </div>
                    <div class="card-body">
                        <h4>But</h4>
                        <div class="card-text">{{$service->but}}</div>
                        <h4>description</h4>
                        <div class="card-text">{!! $service->description !!}</div>
                    </div>
                </div>
            </div>
            <div class="my-4">
                <h4 class="jumbotron">Images Principale</h4>
                <div class="col col-6">
                    <img src="{{asset('storage/'.$service->image)}}" alt="Image du produit" class="img w-100">
                </div>
            </div>
            <div>
                <h4 class="jumbotron">Autres Images</h4>
                <div class="row">

                    @foreach($service->getMedia("images") as $image)
                        {{$image}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section("top_navigation")

@endsection
