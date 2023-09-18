<nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
    <a href="{{route('home')}}" class="navbar-brand p-0">
        <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>Simagro</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{route('home')}}" @class(["nav-item nav-link","active"=>Route::is("home")])>{{__('navigation.home')}}</a>
            <a href="{{route('client.services.index')}}" @class(["nav-item nav-link","active"=>Route::is("client.services.*")])>{{__('navigation.services')}}</a>
            <a href="https://wa.me/message/NQ2L6NZR6EYLP1" class="nav-item nav-link">{{__('navigation.contact')}}</a>
            <a href="#" class="nav-item nav-link">{{__('navigation.about')}}</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{__('navigation.spaces')}}</a>
                <div class="dropdown-menu m-0">
                    <a href="{{route('dashboard')}}" class="dropdown-item">{{__('navigation.client_space')}}</a>
                    <a href="{{route('admin.home')}}" class="dropdown-item">{{__('navigation.admin_space')}}</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{__('navigation.pages')}}</a>
                <div class="dropdown-menu m-0">
                    <a href="#" class="dropdown-item">{{__('navigation.pricing_plan')}}</a>
                    <a href="#" class="dropdown-item">{{__('navigation.our_feature')}}</a>
                    <a href="#" class="dropdown-item">{{__('navigation.team_members')}}</a>
                    <a href="{{route('client.testimonies.index')}}" class="dropdown-item">{{__('navigation.testimonial')}}</a>
                    <a href="#" class="dropdown-item">{{__('navigation.free_quote')}}</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{__('navigation.language')}} ({{currentLocale()}})</a>
                <div class="dropdown-menu m-0">
                    @foreach($supportedLocales as $key =>$locale)
                        <a href="{{LaravelLocalization::getLocalizedURL($key)}}" @class(["active"=>$key==currentLocale(),"dropdown-item"]) >{{$locale['name']}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <button type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
    </div>
</nav>
