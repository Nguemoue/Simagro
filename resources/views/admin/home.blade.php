@extends("templates.admin_dashboard.admin_dashboard_template")

@section("content")
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                    <i class="fa fa-user"></i>
                </div>
                <div class="card-body">
                    <h4>Clients ({{$clientCount}})</h4>
                    <p>General settings such as, site title, site description, address and so on.</p>
                    <a href="#" class="card-cta">Gerer les clients <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                    <i class="fa fa-product-hunt"></i>
                </div>
                <div class="card-body">
                    <h4>Realisations ({{$realisationCount}})</h4>
                    <p>Search engine optimization settings, such as meta tags and social media.</p>
                    <a href="#" class="card-cta">Gerer les realisations <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="card-body">
                    <h4>Services ({{$serviceCount}})</h4>
                    <p>Email SMTP settings, notifications and others related to email.</p>
                    <a href="#}" class="card-cta">Gerer les services <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                    <i class="fa fa-power-off"></i>
                </div>
                <div class="card-body">
                    <h4>Rendez-vous ({{$rendezVousCount}})</h4>
                    <p>PHP version settings, time zones and other environments.</p>
                    <a href="#" class="card-cta">Acceder aux rendez vous <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                    <i class="fa fa-lock"></i>
                </div>
                <div class="card-body">
                    <h4>Parametres</h4>
                    <p>Security settings such as firewalls, server accounts and others.</p>
                    <a href="{{route('admin.parametres.index')}}" class="card-cta">Regler les parametres <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                    <i class="fa fa-stopwatch"></i>
                </div>
                <div class="card-body">
                    <h4>Automation</h4>
                    <p>Settings about automation such as cron job, backup automation and so on.</p>
                    <a href="features-setting-detail.html" class="card-cta text-primary">Change Setting <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
