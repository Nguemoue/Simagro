@extends("templates.client_dashboard.client_dashboard")
@section("content")
    <h3 class="text-center">Page de témoignages</h3>
    <hr>
    <div class="mb-3 d-flex justify-content-end">
        <button data-bs-target="#createTestimonyModal" data-bs-toggle="modal" class="btn btn-primary"><i class="fa fa-plus-square"></i> Nouveau Témoignage</button>
        @includeIf("client.testimonies.includes.createTestimonyModal")
    </div>
    <table class="table table-bordered datatable">
        <thead>
        <tr>
            <th>#</th>
            <th>Contenu</th>
            <th>Publie le</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($temoignages as $temoignage)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$temoignage->contenu}}</td>
                <td>{{$temoignage->created_at->isoformat('lll')}}</td>
                <td>
                    <a href="{{route('client.testimonies.edit',['testimony'=>$temoignage->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @empty
            <div class="alert alert-info">
                <x-ui.alert class="p-0">Aucun témoignages disponible maintenant</x-ui.alert>
            </div>
        @endforelse
        </tbody>
    </table>
@endsection
