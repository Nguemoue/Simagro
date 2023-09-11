@extends("layouts.stisla.stisla_top_navigation")

@section("navbar.nav")
    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item active"><a href="{{route('home')}}" class="nav-link">Acceuil</a></li>
            <li class="nav-item"><a href="{{route('admin.services.index')}}" class="nav-link">Services</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Temoignages</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Abonnements</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Rdv</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Publications</a></li>
            <li class="nav-item"><a href="{{route('admin.realisations.index')}}" class="nav-link">Realisations</a></li>
        </ul>
    </div>
@endsection
