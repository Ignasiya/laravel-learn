<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function test_products_can_be_indexed(): void
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }

    public function test_product_can_be_shown(): void
    {
        $product = Product::factory()->create();

        $response = $this->get('/api/products/' . $product->getKey());
        $response->assertStatus(200);
    }

    public function test_product_can_be_stored(): void
    {
        $attributes = [
            'sku' => 'test-1234',
            'name' => 'Test name',
            'price' => 12345.679,
        ];

        $response = $this->post('/api/products', $attributes);

        $response->assertStatus(201);
        $this->assertDatabaseHas('products', $attributes);
    }

    public function test_product_can_be_updated(): void
    {
        $product = Product::factory()->create();

        $attributes = [
            'sku' => 'new-1234',
            'name' => 'New name',
            'price' => 98765.431,
        ];

        $response = $this->patch('/api/products/' . $product->getKey(), $attributes);

        $response->assertStatus(202);
        $this->assertDatabaseHas('products', array_merge(
            ['id' => $product->getKey()], $attributes
        ));
    }

    public function test_product_can_be_destroyed(): void
    {
        $product = Product::factory()->create();

        $response = $this->delete('/api/products/' . $product->getKey());

        $response->assertStatus(204);
        $this->assertDatabaseMissing('products', ['id' => $product->getKey()]);
    }
}
