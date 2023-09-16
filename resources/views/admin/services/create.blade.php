@extends("templates.admin_dashboard.admin_dashboard_template")

@section("content")

    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title">Nouveau Services</h4>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <div class="card-body">
            <form method="post" action="{{route('admin.services.store')}}" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                <div class="form-group my-2">
                    <label class="form-label" for="titre">Titre</label>
                    <input type="text" id="titre" name="titre" class="form-control" required>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "titre"])}}
                    </div>
                </div>
                <div class="form-group my-2">
                    <label for="but" class="form-label">But</label>
                    <input type="text" name="but" id="but" class="form-control" required>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "but"])}}
                    </div>
                </div>
                <div class="form-group my-2">
                    <label for="but" class="form-label"> Image principale</label>
                    <input name="image" type="file" id="but" accept="image/*" class="form-control" required>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "images"])}}
                    </div>
                </div>
                <div class="form-group my-2">
                    <label for="but" class="form-label"> Autres Image</label>
                    <input type="file" id="other_images" name="other_images[]" accept="image/*" class="form-control"  multiple>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "images"])}}
                    </div>
                </div>
                <div class="form-group my-2">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                    <div class="invalid-feedback">
                        {{__('validation.required', ['attribute' => "description"])}}
                    </div>
                </div>
                <hr/>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push("top_navigation")
    <li class="nav-item mx-4">
        <a href="{{route('admin.services.index')}}" class="btn rounded-lg btn-success">Listes de services</a>
    </li>
@endpush
