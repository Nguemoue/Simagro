@extends("layouts.kitadmin.kitadmin_layout")

@section("sidebar")
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{url('/')}}">
                <span class="align-middle">{{config('app.name')}} | Admin</span>
            </a>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Pages
                </li>

                <li @class(["sidebar-item","active"=>Route::is("admin.home")])>
                    <a class="sidebar-link" href="{{route('admin.home')}}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Acceuil</span>
                    </a>
                </li>

                <li @class(["sidebar-item","active"=>Route::is("admin.realisations.*")])>
                    <a class="sidebar-link" href="{{route('admin.realisations.index')}}">
                        <i class="align-middle" data-feather="home"></i> <span class="align-middle">Réalisations</span>
                    </a>
                </li>

                <li  @class(["sidebar-item","active"=>Route::is("admin.services.*")])>
                    <a class="sidebar-link"  href="{{route('admin.services.index')}}">
                        <i class="align-middle" data-feather="book"></i> <span class="align-middle">Services</span>
                    </a>
                </li>
                <li  @class(["sidebar-item","active"=>Route::is("admin.publications.*")])>
                    <a class="sidebar-link"  href="{{route('admin.publications.index')}}">
                        <i class="align-middle" data-feather="share"></i> <span class="align-middle">Publications</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Parametres & Configurations
                </li>

                <li @class(["sidebar-item","active"=>Route::is("admin.parametres.*")])>
                    <a class="sidebar-link" href="{{route('admin.parametres.index')}}">
                        <i class="align-middle" data-feather="square"></i> <span class="align-middle">Parametres</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="align-middle" data-feather="user"></i> <span
                            class="align-middle">Equipes</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="align-middle" data-feather="user"></i> <span
                            class="align-middle">Clients</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Espaces
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('home')}}">
                        <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Espace client</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="align-middle" data-feather="map"></i> <span class="align-middle">Mon espace</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>
@endsection

@section("navbar")
    <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                @stack("top_navigation")
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                        <i class="align-middle" data-feather="settings"></i>
                    </a>

                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                        <span class="text-dark"><i class="fa fa-user"></i> User</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i>
                            Analytics</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="settings"></i>
                            Settings & Privacy</a>
                        <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i>
                            Help Center</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Log out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
@endsection

@section("footer")
    <footer class="footer">
        <div class="container-fluid">
            <div class="row text-muted">
                <div class="col-6 text-start">
                    <p class="mb-0">
                        <a class="text-muted" href="#" target="_blank"><strong>{{config('app.name')}}</strong></a>
                        &copy;
                    </p>
                </div>
                <div class="col-6 text-end">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-muted" href="#" target="_blank">Support</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="#" target="_blank">Help Center</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="#" target="_blank">Privacy</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="#" target="_blank">Terms</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
@endsection

@push("scripts")
    <script src="{{asset('lib/izitoast/js/iziToast.min.js')}}"></script>
    <script src="{{asset('lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset("js/validation.js")}}"></script>
    @includeIf("_partials.izitoast")
@endpush

@push("stylesheets")
    <link rel="stylesheet" href="{{asset('lib/izitoast/css/iziToast.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/assets/modules/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/customstyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/components.css')}}">
@endpush
