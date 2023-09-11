@extends("layouts.dashboard.dashboard_admin_template")

@section("main-content")

    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title">Editer la Realisation {{$realisation->titre}}</h4>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <div class="card-body">
            <form method="post" action="{{route('admin.realisations.update',['realisation'=>$realisation->id])}}" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" value="{{$realisation->titre}}" id="titre" name="titre" class="form-control" required>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "titre"])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="lieu">Lieu</label>
                    <input type="text" value="{{$realisation->lieu}}" name="lieu" id="lieu" class="form-control" required>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "lieu"])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="realisateur">Réalisateur</label>
                    <input type="text" value="{{$realisation->realisateur}}" name="realisateur" id="realisateur" class="form-control" required>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "realisateur"])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="date_realisation">Date de réalisation</label>
                    <input type="date" name="date_realisation" value="{{$realisation->date_realisation}}" id="date_realisation" class="form-control" required>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "date de réalisation"])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombre_jour">Nombre de jour</label>
                    <input type="number" name="nombre_jour" id="nombre_jour" value="{{$realisation->nombre_jour}}" class="form-control" required>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "nombre de jour"])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="but"> Nouvelle Image principale <span class="text-warning">le choix est facultatif</span></label>
                    <input name="photo" type="file" id="but" accept="image/*" class="form-control">
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "images"])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="ressources"> Autres Resources <span class="text-warning">le choix est facultatif</span></label>
                    <input type="file" id="ressources" name="ressources[]" accept="image/*,video/*,music/*,application/pdf" class="form-control"  multiple>

                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "ressources"])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="contenu">contenu</label>
                    <textarea name="contenu" id="contenu" class="form-control" required>{{$realisation->contenu}}</textarea>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "contenu"])}}
                    </div>
                </div>
                <button class="btn btn-success">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection
@section("top_navigation")

@endsection
