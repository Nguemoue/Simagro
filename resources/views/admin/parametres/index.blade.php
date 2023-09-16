@extends("templates.admin_dashboard.admin_dashboard_template")
@section("content")
    <h3 class="text-center">
        Configuration des Paramètres de l'application!
    </h3>
    <hr>
    <div class="card m-0 p-3">
        <form class="needs-validation" novalidate>
            <div class="row">
                @foreach($parametres as $parametre)
                    <div class="col-md-6 col-sm-12 col-lg-6">
                        <div class="form-group my-2">
                            <label for="{{$parametre->nom}}" class="form-label">{{str($parametre->nom)->title()}}</label>
                            <input id="{{$parametre->nom}}" value="{{$parametre->value}}" type="text" class="form-control" required/>
                            <div class="help-text">
                                {{$parametre->description}}
                            </div>
                            <div class="invalid-feedback">
                                {{__('validation.required',['attribute' => $parametre->nom])}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-3">
                <button class="btn btn-success">Mettre à jour</button>
            </div>
        </form>
    </div>
@endsection

@push("top_navigation")
    <li class="nav-item">
        <a href="#!" class="nav-link border btn-outline-secondary">Pages de configurations des parametres lié a l'application</a>
    </li>
@endpush
