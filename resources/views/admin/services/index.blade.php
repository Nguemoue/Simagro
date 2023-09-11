@extends("layouts.dashboard.dashboard_admin_template")

@section("main-content")
    <h1>Gestion des Services</h1>
    <hr>
    <div class="row">
        @foreach($services as $service)
            <div class="col col-4">
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
                        <div class="btn-group">
                            <a href="{{route('admin.services.edit',['service'=>$service->id])}}" class="btn btn-primary">Editer</a>
                            <a href="{{route('admin.services.show',["service"=>$service->id])}}" class="btn btn-info">Voir</a>
                            <form action="{{route('admin.services.destroy',[$service->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section("top_navigation")
    <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('admin.services.create')}}"  class="nav-link"><i class="fas fa-plus"></i><span>creer</span></a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Lister</span></a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
@section("topnavigation.menuhamburger")
    @include("layouts._partials.menuhamburger")
@endsection
