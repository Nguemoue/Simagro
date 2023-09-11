@extends("layouts.dashboard.dashboard_admin_template")

@section("main-content")

    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="card-title">Détail sur la réalisation</h4>
            </div>
            <div class="card-body">
                <h3>Titre de la réalisation</h3>
                <div class="card">
                    <div class="card-header">
                        {{$realisation->titre}}
                    </div>
                    <div class="card-body">
                        <h4>Lieu</h4>
                        <div class="card-text">{{$realisation->lieu}}</div>
                        <h4>Contenu</h4>
                        <div class="card-text">{!! $realisation->contenu !!}</div>
                        <h4>Réalisateur</h4>
                        <div class="card-text">{{$realisation->realisateur}}</div>
                        <h4>Date de réalisation</h4>
                        <div class="card-text">{{$realisation->date_realisation}}</div>
                    </div>
                </div>
            </div>
            <div class="my-4">
                <h4 class="jumbotron">Images Principale</h4>
                <div class="col col-6">
                    <img src="{{asset('storage/'.$realisation->photo)}}" alt="Image du produit" class="img w-100">
                </div>
            </div>
            <div>
                <h4 class="jumbotron">Autres Resources</h4>
                <div class="row mx-4">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>Type</th>
                            <th>Contenu</th>
                        </tr>
                        </thead>
                        @foreach($realisation->getMedia("ressources") as $media)
                            <tr>
                                <td>
                                    {{ ($media->type) }}
                                </td>
                                <td>
                                    <x-front.resource :src="$media->getUrl()" :type="$media->type"/>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("top_navigation")

@endsection
