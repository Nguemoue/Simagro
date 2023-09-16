@extends("templates.admin_dashboard.admin_dashboard_template")

@section("content")
    <h4 class="text-center">Listes des réaliisations.</h4>
    <div class="text-divider"></div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Numéro</th>
                <th>Titre</th>
                <th>Lieu</th>
                <th>Date de realisation</th>
                <th>Realisateur</th>
                <th>Nombre de jour</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($realisations as $realisation)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$realisation->titre}}</td>
                    <td>{{$realisation->lieu}}</td>
                    <td>{{$realisation->date_realisation}}</td>
                    <td>{{$realisation->realisateur}}</td>
                    <td>{{$realisation->nombre_jour}}</td>
                    <td>
                        <div class="btn-group btn-group-sm d-flex justify-content-between">
                            <a href="{{route('admin.realisations.edit',['realisation'=>$realisation->id])}}" class="btn btn-sm btn-primary">Editer</a>
                            <a href="{{route('admin.realisations.show',["realisation"=>$realisation->id])}}" class="btn btn-sm btn-info">Voir</a>
                            <form action="{{route('admin.realisations.destroy',[$realisation->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

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
