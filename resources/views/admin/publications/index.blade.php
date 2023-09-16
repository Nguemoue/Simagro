@extends("templates.admin_dashboard.admin_dashboard_template")
@section("content")
    <div class="text-divider">
        Gerer les publications
    </div>
    <hr>
    <div class="mb-3 d-flex justify-content-end">
        <button data-bs-toggle="modal" data-bs-target="#createPublicationModal" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Creer une nouvelle publication!</button>
        @include("admin.publications.includes.modalCreate")
    </div>
    <table class="table table-bordered datatable">
        <thead>
        <th>#</th>
        <th>Titre</th>
        <th>Domaine</th>
        <th>Date de publication</th>
        <th>Actions</th>
        </thead>
        <tbody>
        @foreach($publications as $publication)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$publication->titre}}</td>
                <td>{{$publication->domainePublication->libelle}}</td>
                <td>{{$publication->date_publication->isoFormat("ll")}}</td>
                <td>
                    <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-info"><i class="fa fa-pencil"></i></button>
                    <form class="btn btn-danger" action="{{route('admin.publications.destroy',['publication'=>$publication->id])}}" method="post"
                          onclick="if(confirm('voulez suprimez cette publication?')){submit()}">
                        @csrf
                        @method("DELETE")
                        <i class="fa fa-trash"></i>
                    </form>
                    <a href="{{route('admin.publications.resources.index',['publication'=>$publication->id])}}" class="btn btn-secondary"><i class="fa fa-image"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
