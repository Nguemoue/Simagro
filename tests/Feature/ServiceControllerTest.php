<?php
namespace Tests\Feature;
use App\Models\Administrateur;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceControllerTest extends TestCase
{
    use RefreshDatabase;
    static protected   $admin;


    public function testStore()
    {

    }

    public function testUpdate()
    {

    }

    public function testDestroy()
    {

    }


    public function test_service_sreen_can_be_renderer()
    {
        $this->refreshApplicationWithLocale("en");
        $admin = Administrateur::factory()->create();
        $this->actingAs($admin,"admin")->get(route('admin.services.create'))
            ->assertStatus(200)->assertSeeText("Nouveau Services");
    }

    public function test_can_access_in_edit_service_with_connected()
    {
        $this->refreshApplicationWithLocale("en");
        $admin = Administrateur::factory()->create();
        $service = Service::factory()->create();
        $this->actingAs($admin,"admin")->get(route("admin.services.edit",[$service->id]))
            ->assertOk()->assertViewHas(["service"],[$service]);
    }
    public function test_canot_access_in_edit_service_without_connected()
    {
        $this->refreshApplicationWithLocale("en");
        $service = Service::factory()->create();
        $this->get(route("admin.services.edit",[$service->id]))
            ->assertRedirect(route('login.admin'));
    }

    public function testShow()
    {
        $this->refreshApplicationWithLocale("en");
        $admin = Administrateur::factory()->create();
        //je cree un article
        $service = Service::factory()->create();
        $this->actingAs($admin,"admin")->get(route('admin.services.show',['service'=>$service->id]))
            ->assertStatus(200)->assertSeeText([$service->libelle,$service->description]);
    }

    public function testIndex()
    {
        $this->refreshApplicationWithLocale("en");
        $admin = Administrateur::factory()->create();
        $response = $this->actingAs($admin,"admin");
        $response->get(route('admin.services.index'))->assertStatus(200);
    }
}
