<?php

namespace Tests\Feature\Hotels;

use App\Models\Hotel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HotelTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function test_hotels_index(): void
    {
        $response = $this->get('/api/hotels');
        $response->assertStatus(200);
    }

    public function test_hotels_can_be_show(): void
    {
        $hotel = Hotel::factory()->create();

        $response = $this->get('/api/hotels/' . $hotel->getKey());
        $response->assertStatus(200);
    }

    public function test_hotel_can_be_created(): void
    {
        $attributes = [
            'name' => 'Test name',
            'address' => 'Test address',
        ];

        $response = $this->post('/api/hotels', $attributes);

        $response->assertStatus(201);
        $this->assertDatabaseHas('hotels', $attributes);
    }

    public function test_hotel_can_be_updated(): void
    {
        $hotel = Hotel::factory()->create();

        $attributes = [
            'name' => 'New name',
            'address' => 'New address',
        ];

        $response = $this->patch('/api/hotels/' . $hotel->getKey(), $attributes);

        $response->assertStatus(202);
        $this->assertDatabaseHas('hotels', array_merge(
            ['id' => $hotel->getKey()], $attributes
        ));
    }

    public function test_hotel_can_be_deleted(): void
    {
        $hotel = Hotel::factory()->create();

        $response = $this->delete('/api/hotels/' . $hotel->getKey());

        $response->assertStatus(204);
        $this->assertDatabaseMissing('hotels', ['id' => $hotel->getKey()]);
    }
}
