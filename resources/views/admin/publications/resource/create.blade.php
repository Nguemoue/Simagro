@extends("templates.admin_dashboard.admin_dashboard_template")
@section("content")
    <div class="alert alert-info alert-has-icon">
        <div class="alert-icon fa-2x"><i class="fa fa-lightbulb-o"></i></div>
        <div class="alert-body">
            <div class="alert-title">Info</div>
           Cette page permet de configurez les <span class="badge badge-secondary">photos, videos, music, pdf</span> rataché à la publication <b>{{$publication->titre}}</b>
        </div>
    </div>
    <div class="card-body">
        <div class="row mt-4">
            <div class="col-12 col-lg-8 offset-lg-2">
                <div class="wizard-steps">
                    <div class="wizard-step">
                        <div class="wizard-step-icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="wizard-step-label">
                            Creation de la publication
                        </div>
                    </div>
                    <div class="wizard-step wizard-step-active">
                        <div class="wizard-step-icon">
                            <i class="fa fa-share-square"></i>
                        </div>
                        <div class="wizard-step-label">
                            Configurations des resources de la publication.
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <form enctype="multipart/form-data" class="wizard-content  needs-validation mt-4" action="{{route('admin.publications.resources.store',['publication'=>$publication->id])}}" novalidate method="post">
            @csrf
            <div class="wizard-pane">
                <div class="form-group">
                    <label class="form-label" for="type_resource">Type de resource</label>
                    <select name="type_resource" id="type_resource" class="form-select select2">
                        <option value="image">Image</option>
                        <option value="video">Video</option>
                        <option value="audio">Audio</option>
                        <option value="pdf">Pdf</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="">
                        <label class="button btn btn-social btn-primary" for="file"><i class="fa fa-hand-o-up"></i> Choisir les fichiers</label>
                        <input required multiple type="file" name="file" accept="image/*,video/*,audio/*,application/pdf" id="file" class="d-none" >
                        <div class="invalid-feedback">
                            {{__('validation.required', ['attribute' => 'fichiers'])}}
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-success"> <i class="fa fa-save"></i> Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push("top_navigation")
    <li class="nav-item">
        <a href="{{route('admin.publications.index')}}" class="btn  nav-link mx-4"><i class="fa fa-arrow-left"></i> Retour a la page de publication!</a>
    </li>
@endpush
