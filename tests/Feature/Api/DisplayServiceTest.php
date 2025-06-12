<?php

namespace Tests\Feature\Api;

use App\Models\Display;
use App\Models\User;
use App\Services\DisplayService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DisplayServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_store_display()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $service = new DisplayService();
        $data = [
            'name' => 'Pantalla Test',
            'description' => 'desc',
            'price_per_day' => 100,
            'resolution_height' => 1080,
            'resolution_width' => 1920,
            'type' => 'indoor',
        ];

        $display = $service->store($data, $user);

        $this->assertDatabaseHas('displays', [
            'name' => 'Pantalla Test',
            'user_id' => $user->id,
        ]);
    }

    public function test_can_update_display()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $display = Display::factory()->create(['user_id' => $user->id]);

        $service = new DisplayService();

        $data = [
            'name' => 'Actualizada',
            'description' => 'nueva desc',
            'price_per_day' => 200,
            'resolution_height' => 1440,
            'resolution_width' => 2560,
            'type' => 'indoor',
        ];

        $updated = $service->update($display, $data);

        $this->assertEquals('Actualizada', $updated->name);
        $this->assertEquals(200, $updated->price_per_day);
    }

    public function test_can_destroy_display()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $display = Display::factory()->create(['user_id' => $user->id]);

        $service = new DisplayService();
        $service->destroy($display);

        $this->assertDatabaseMissing('displays', ['id' => $display->id]);
    }
}
