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
                <td>{!! $temoignage->contenu !!}</td>
                <td>{{$temoignage->created_at->isoformat('lll')}}</td>
                <td>
                    <a href="{{route('client.testimonies.edit',['testimony'=>$temoignage->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <form onclick="submit()" class="btn btn-danger" action="{{route('client.testimonies.destroy',['testimony'=>$temoignage->id])}}"
                          method="post">
                        @method("DELETE")
                        @csrf
                        <i class="fa fa-trash"></i>
                    </form>
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

@push('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js" integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer>
        $(document).ready(function(){
            $('.summernote').summernote()
        })
    </script>
@endpush
