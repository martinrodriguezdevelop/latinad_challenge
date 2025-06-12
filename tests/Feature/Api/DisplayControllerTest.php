<?php
namespace Tests\Feature\Api;

use App\Models\Display;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DisplayControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_only_see_own_display()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        $display = Display::factory()->create(['user_id' => $otherUser->id]);

        $response = $this->actingAs($user)->getJson("/api/displays/{$display->id}", [
            'name' => 'No permitido',
            'description' => 'Una descripción',
            'price_per_day' => '150.00',
            'resolution_height' => 720,
            'resolution_width' => 1280,
            'type' => 'indoor',
        ]);

        $response->assertForbidden();
    }

    public function test_user_can_see_own_display()
    {
        $user = User::factory()->create();

        $display = Display::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->getJson("/api/displays/{$display->id}", [
            'name' => 'Permitido',
            'description' => 'Una descripción',
            'price_per_day' => '150.00',
            'resolution_height' => 720,
            'resolution_width' => 1280,
            'type' => 'indoor',
        ]);

        $response->assertOk();
    }

    public function test_user_can_only_update_own_display()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        $display = Display::factory()->create(['user_id' => $otherUser->id]);

        $response = $this->actingAs($user)->putJson("/api/displays/{$display->id}", [
            'name' => 'No permitido',
            'description' => 'Una descripción',
            'price_per_day' => '150.00',
            'resolution_height' => 720,
            'resolution_width' => 1280,
            'type' => 'indoor',
        ]);

        $response->assertForbidden();
    }

    public function test_user_can_update_own_display()
    {
        $user = User::factory()->create();
        $display = Display::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->putJson("/api/displays/{$display->id}", [
            'name' => 'Permitido',
            'description' => 'Una descripción',
            'price_per_day' => '150.00',
            'resolution_height' => 720,
            'resolution_width' => 1280,
            'type' => 'indoor',
        ]);

        $response->assertOk();
        $this->assertDatabaseHas('displays', [
            'id' => $display->id,
            'name' => 'Permitido',
        ]);
    }

    public function test_user_can_only_destroy_own_display()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        $ownDisplay = Display::factory()->create(['user_id' => $user->id]);
        $othersDisplay = Display::factory()->create(['user_id' => $otherUser->id]);

        $responseOwn = $this->actingAs($user)->deleteJson("/api/displays/{$ownDisplay->id}");
        $responseOwn->assertOk();
        $this->assertDatabaseMissing('displays', ['id' => $ownDisplay->id]);

        $responseOthers = $this->actingAs($user)->deleteJson("/api/displays/{$othersDisplay->id}");
        $responseOthers->assertStatus(403);
        $this->assertDatabaseHas('displays', ['id' => $othersDisplay->id]);
    }


    public function test_user_can_destroy_own_display()
    {
        $user = User::factory()->create();
        $display = Display::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->deleteJson("/api/displays/{$display->id}", [
            'name' => 'Permitido',
            'description' => 'Una descripción',
            'price_per_day' => '150.00',
            'resolution_height' => 720,
            'resolution_width' => 1280,
            'type' => 'indoor',
        ]);

        $response->assertOk();
        $this->assertDatabaseMissing('displays', [
            'id' => $display->id,
            'name' => 'Permitido',
        ]);
    }
}
