@extends("layouts.dashboard.dashboard_admin_template")

@section("main-content")

    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title">Editer le Service / {{$service->libelle}}</h4>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <div class="card-body">
            <form method="post" action="{{route('admin.services.update',[$service->id])}}" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" value="{{$service->libelle}}" id="titre" name="titre" class="form-control" required>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "titre"])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="but">But</label>
                    <input type="text" value="{{$service->but}}" name="but" id="but" class="form-control" required>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "but"])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="but"> Image principale</label>
                    <input name="image" type="file" id="but" accept="image/*" class="form-control" >
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "images"])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="but"> Autres Image</label>
                    <input type="file" id="other_images" name="other_images[]" accept="image/*" class="form-control"  multiple>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "images"])}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <textarea name="description" id="description" class="form-control" required>{{$service->description}}</textarea>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "description"])}}
                    </div>
                </div>
                <button class="btn btn-success">mettre  à jour</button>
            </form>
        </div>
    </div>
@endsection
@section("top_navigation")

@endsection
