<?php

namespace Tests\Feature\Auth;

use App\Constant\ReturnStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $this->refreshApplicationWithLocale("en");
        $response = $this->get(route('register'));

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $this->refreshApplicationWithLocale("en");
        $response = $this->post(route('register'), [
            'nom' => 'nom',
            "prenom"=>"prenom",
            "bp"=>"bp",
            "pays"=>"pays",
            "telephone"=>"telephone",
            "type_compte"=>"type_compte",
            'email' => "client@gmail.com",
            'password' => "password",
            "password_confirmation"=>"password",
            "ville"=>"ville",
            "email_verified_at"=>now()
        ]);

        $this->assertGuest();
        $response->assertRedirect(route('login'))->assertSessionHas(ReturnStatus::SUCCESS);
    }
}
