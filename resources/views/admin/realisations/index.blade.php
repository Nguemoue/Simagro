@extends("layouts.dashboard.dashboard_admin_template")

@section("main-content")
    <h1>Gestion des Realisations</h1>
    <hr>
    <div class="row">
        @foreach($realisations as $realisation)
            <div class="col col-md-6 col-xs-12 col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4> {{$realisation->titre}}</h4>
                    </div>
                    <div class="card-body" style="background-image: url('{{asset('storage/'.$realisation->image)}}')">
                        <div>
                            <b>Lieu:</b>
                            <span>
                                {{$realisation->lieu}}
                            </span>
                        </div>
                        <hr>
                        <div>
                            <div >
                                <b>Date:</b>
                                <span>{{$realisation->date_realisation->isoFormat('lll')}}</span>
                            </div>
                            <hr>
                            <div >
                                <b class="display-6">Realisateur:</b>
                                {{$realisation->realisateur}}
                            </div>
                            <hr>
                            <div >
                                <b>Nombre de jour</b>
                                {{$realisation->nombre_jour}}
                            </div>
                            <hr>
                            <div>
                                <b>Contenu</b>
                                <blockquote>
                                    {{$realisation->contenu}}
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group d-flex justify-content-between">
                            <a href="{{route('admin.realisations.edit',['realisation'=>$realisation->id])}}" class="btn btn-primary">Editer</a>
                            <a href="{{route('admin.realisations.show',["realisation"=>$realisation->id])}}" class="btn btn-info">Voir</a>
                            <form action="{{route('admin.realisations.destroy',[$realisation->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section("top_navigation")
    <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('admin.realisations.create')}}"  class="nav-link"><i class="fa fa-plus"></i><span>Ajouter une réalisation</span></a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Listes des réalisations disponibles</span></a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
@section("topnavigation.menuhamburger")
    @include("layouts._partials.menuhamburger")
@endsection
