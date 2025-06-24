<?php

namespace Tests\Feature\Hotels;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Hotel;

class HotelsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan("db:seed");
    }

    public function test_hotels_index()
    {
        $response = $this->get('/api/hotels');
        $response->assertStatus(200);
    }

    public function test_hotels_can_be_shown()
    {
        $hotel = Hotel::factory()->create();

        $response = $this->get('/api/hotels/' . $hotel->getKey());
        $response->assertStatus(200);
    }

    public function test_hotel_can_be_created()
    {
        $attributes = [
            'name' => 'Test name',
            'address' => 'Test address',
        ];

        $response = $this->post('/api/hotels/', $attributes);

        $response->assertStatus(201);
        $this->assertDatabaseHas('hotels', $attributes);
    }

    public function test_hotel_can_be_updated()
    {
        $hotel = Hotel::factory()->create();

        $attributes = [
            'name' => 'New name',
            'address' => 'New address',
        ];

        $response = $this->patch('/api/hotels/' . $hotel->getKey(), $attributes);
        $response->assertStatus(202);

        $this->assertDatabaseHas('hotels', array_merge(
            ['id' => $hotel->getKey()],
            $attributes
        ));
    }$hotel = Hotel::factory()->create();
        $response = $this->delete('/api/hotels/' . $hotel->getKey());

        $response->assertStatus(204);

        $this->assertDatabaseMissing('hotels', ['id' => $hotel->getKey()]);

    public function test_hotel_can_be_deleted()
    {
        
    }
}
