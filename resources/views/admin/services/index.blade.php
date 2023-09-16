@extends("templates.admin_dashboard.admin_dashboard_template")

@section("content")
    <h1>Gestion des Services</h1>
    <hr>
    <div class="row">
        @foreach($services as $service)
            <div class="col-12 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-header"> {{$service->libelle}}</div>
                    <div class="card-body" style="background-image: url('{{asset('storage/'.$service->image)}}')">
                        <div>
                            <b>but</b>
                            <p>
                                {{$service->but}}
                            </p>
                        </div>
                        <div>
                            <b>description</b>
                            <p>
                                {{$service->description}}
                            </p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group btn-group-sm justify-content-between btn-group-toggle">
                            <a href="{{route('admin.services.edit',['service'=>$service->id])}}" class="btn btn-sm btn-primary">Editer</a>
                            <a href="{{route('admin.services.show',["service"=>$service->id])}}" class="btn btn-sm btn-info">Voir</a>
                            <form action="{{route('admin.services.destroy',[$service->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@push("top_navigation")
    <li class="nav-item mx-4">
        <a href="{{route('admin.services.create')}}" class="btn rounded-lg btn-success">Créer un nouveau services</a>
    </li>
@endpush
