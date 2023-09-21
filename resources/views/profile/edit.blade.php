@extends("templates.client_dashboard.client_dashboard")

@section("content")
    <div class="card">
        <div class="card-header">
            Mis a jour du profil!
        </div>
        <div class="card-body">
            @includeIf("profile.partials.update-profile-information-form")
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            Mis a jour du mot de passe
        </div>
        <div class="card-body">
            @includeIf("profile.partials.update-password-form")

        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            Suppression du profile!
        </div>
        <div class="card-body">
            @includeIf("profile.partials.delete-user-form")
        </div>
    </div>
    <hr>
@endsection
