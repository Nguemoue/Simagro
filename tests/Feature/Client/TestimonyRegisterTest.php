<?php

namespace Tests\Feature\Client;

use App\Constant\ReturnStatus;
use App\Domains\Services\Model\Client;
use App\Models\Temoignage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class TestimonyRegisterTest
 * @package Tests\Feature\Client
 */
class TestimonyRegisterTest extends TestCase
{
    use RefreshDatabase;


    public function test_client_can_access_to_index_page()
    {
        $this->refreshApplicationWithLocale("en");
        $client = Client::factory()->create([
           "email_verified_at" => now()
        ]);
        $response = $this->actingAs($client)->get(route('client.testimonies.index'));
        $response->assertStatus(200);
    }

    public function test_register_can_succed_with_correct_data(){
        $this->refreshApplicationWithLocale("en");
        $this->assertDatabaseEmpty(Temoignage::class);
        $client = Client::factory()->create([
            "email_verified_at" => now()
        ]);
        $response = $this->actingAs($client);
        $response->post(route('client.testimonies.store',[
            'contenu'=>fake("fr")->text()
        ]))->assertSessionHas(ReturnStatus::SUCCESS);
        $this->assertDatabaseHas(Temoignage::class,['id' => 1]);
    }

    public function test_client_cannot_access_without_login(){
        $this->refreshApplicationWithLocale("en");
        $this->get(route('client.testimonies.index'))
            ->assertRedirect(route('login'));
    }

    public function test_client_cannot_post_without_authentified(){
        $this->refreshApplicationWithLocale("en");
        $this->post(route('client.testimonies.store'),[
            'contenu'=>'content'
        ])->assertRedirect(route('login'));
    }

    public function test_edit_page_can_be_display(){
        $this->refreshApplicationWithLocale("en");
        $client = Client::factory()->create();
        $testimony = Temoignage::factory()->create();
        $reponse = $this->actingAs($client)
            ->get(route('client.testimonies.edit',['testimony'=>$testimony->id]));
        $reponse->assertOk()->assertViewHas("temoignage.id",$testimony->id);
    }
    public function test_update_temoignage_with_correct_data(){
        $this->refreshApplicationWithLocale("en");
        $client= Client::factory()->create();
        $testimony = Temoignage::factory()->create(['contenu' => 'contenu par defaut']);

        $this->assertEquals('contenu par defaut', 'contenu par defaut');

        $response = $this->actingAs($client)
            ->from(route('client.testimonies.index'))
            ->put(route('client.testimonies.update',
                ['testimony'=>$testimony->id]
            ),[
                'contenu'=>'contenu mis a jour'
            ])->assertRedirect(route('client.testimonies.index'));
        $testimony->refresh();
        $this->assertEquals('contenu mis a jour', $testimony->contenu);
    }

    public function test_temoignage_can_be_deleted(){
        $this->refreshApplicationWithLocale("en");
        $client = Client::factory()->create();
        $reponse = $this->actingAs($client);
        $temoignage = Temoignage::factory()->create();
        $this->assertDatabaseCount(Temoignage::class,1);
        $reponse->from(route('client.testimonies.index'))
            ->delete(route('client.testimonies.destroy',['testimony'=>$temoignage->id]))
        ->assertRedirect(route("client.testimonies.index"));
        $this->assertDatabaseEmpty(Temoignage::class);
    }

}
