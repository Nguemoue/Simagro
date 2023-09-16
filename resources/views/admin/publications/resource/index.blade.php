@extends("templates.admin_dashboard.admin_dashboard_template")
@section("content")
    <div class="text-divider">
        Gerer L'element rattaché à la publication
    </div>
    <hr>
    <div class="mb-3 d-flex justify-content-end">
        <a href="{{route('admin.publications.index')}}" class="btn btn-info mx-3"><i class="fa fa-chevron-left"></i> Page de publication</a>
        <a href="{{route('admin.publications.resources.create',['publication'=>$publication->id])}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter une nouvelle</a>
    </div>
    <table class="table table-bordered datatable">
        <thead>
        <th>#</th>
        <th>Chemin</th>
        <th>Date d'ajout</th>
        <th>Publication</th>
        <th>Actions</th>
        </thead>
        <tbody>
        @foreach($publication->getMedia() as $media)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$media->file_name}}</td>
                <td>{{$publication->created_at}}</td>
                <td>{{$publication->titre}}</td>
                <td>
                    <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-info"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
