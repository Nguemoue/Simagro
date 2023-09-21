<x-ui.modal modal-id="createTestimonyModal" title="Nouveau témoignage">
    <form action="{{route('client.testimonies.store')}}" class="needs-validation" novalidate method="post">
        @csrf
        <div class="form-group">
            <label for="contenu">Contenu</label>
            <textarea class="form-control summernote" id="contenu" name="contenu" required></textarea>
        </div>
        <div class="d-flex justify-content-between">
            <button class="btn btn-primary"><i class="fa fa-share-square"></i> Publier</button>
        </div>
    </form>
</x-ui.modal>
