<x-ui.modal modal-id="createPublicationModal">
    <form action="{{route('admin.publications.store')}}" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="form-group">
            <label class="form-label" for="titre">Titre</label>
            <input id="titre" type="text" class="form-control" name="titre" required>
            <div class="invalid-feedback">
                {{__('validation.required', ['attribute' => 'titre'])}}
            </div>
        </div>
        <div class="form-group">
            <label class="form-label" for="contenu">Contenu</label>
            <textarea id="contenu" class="form-control summernote" name="contenu" required></textarea>
            <div class="invalid-feedback">
                {{__('validation.required', ['attribute' => 'contenu'])}}
            </div>
        </div>
        <div class="form-group">
            <label class="form-label" for="domaine">Domaine de publication</label>
            <select name="domaine" required id="domaine" class="form-select select2">
                @foreach($domainesPublications as $domaine)
                    <option value="{{$domaine->id}}">{{$domaine->libelle}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                {{__('validation.required', ['attribute' => 'Domaine de publication'])}}
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="button btn btn-success"><i class="fa fa-share"></i> Publier</button>
        </div>
    </form>
    @slot("footer")
        <div class="card-footer">
        </div>
    @endslot
</x-ui.modal>
