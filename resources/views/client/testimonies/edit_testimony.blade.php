@extends("templates.client_dashboard.client_dashboard")

@section("content")
    <h3 class="text-center">
        Editer le témoignage
    </h3>
    <hr>
    <form action="{{route('client.testimonies.update',['testimony'=>$temoignage->id])}}" method="post" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
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
@push('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer>
        $(document).ready(function(){
            $('.summernote').summernote()
        })
    </script>
@endpush
