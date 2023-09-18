@extends("templates.client_dashboard.client_dashboard")

@section("content")
    <h3 class="text-center">
        Editer le témoignage
    </h3>
    <hr>
    <form action="{{route('client.testimonies.update',['testimony'=>$temoignage->id])}}" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="form-group">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea name="contenu" id="contenu" class="form-control summernote" cols="30" rows="10" minlength="10" required>{{$temoignage->contenu}}</textarea>
            <div class="invalid-feedback">
                {{__('validation.required', ['attribute' => 'contenu'])}}
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary"><i class="fa fa-pencil"></i> Mettre à jour</button>
        </div>
    </form>
@endsection
