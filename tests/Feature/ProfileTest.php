<?php

namespace Tests\Feature;

use App\Domains\Services\Model\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed(): void
    {
        $this->refreshApplicationWithLocale("en");
        $user = Client::factory()->create([
            'email_verified_at' => now()->subDays(2)
        ]);
        $response = $this
            ->actingAs($user)
            ->get(route('profile.edit'));
        $response->assertOk();
    }

    public function test_profile_information_can_be_updated(): void
    {
        $this->refreshApplicationWithLocale("en");
        $user = Client::factory()->create();
        $response = $this->actingAs($user)
            ->patch(route('profile.update'), [
                'nom' => 'Test User',
                'email' => 'test@example.com',
            ]);

            $response
                ->assertSessionHasNoErrors()
                ->assertRedirect(route('profile.edit'));

        $user->refresh();
        $this->assertSame('Test User', $user->nom);
        $this->assertSame('test@example.com', $user->email);
        $this->assertNull($user->email_verified_at);
    }

    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
        $user = Client::factory()->create([
            'email_verified_at'=>now()
        ]);

        $response = $this
            ->actingAs($user)
            ->patch(route('profile.update'), [
                'nom' => 'Test User',
                'email' => $user->email,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('profile.edit'));

        $this->assertNotNull($user->refresh()->email_verified_at);
    }

    public function test_user_can_delete_their_account(): void
    {
        $this->refreshApplicationWithLocale("en");
        $user = Client::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete(route('profile.destroy'), [
                'password' => 'password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('home'));

        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    public function test_correct_password_must_be_provided_to_delete_account(): void
    {
        $user = Client::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/profile')
            ->delete('/profile', [
                'password' => 'wrong-password',
            ]);

        $response
            ->assertSessionHasErrorsIn('userDeletion', 'password')
            ->assertRedirect('/profile');

        $this->assertNotNull($user->fresh());
    }
}
