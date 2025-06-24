<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    public function test_products_can_be_indexed()
    {
        if (!defined('LARAVEL_START')) {
            define('LARAVEL_START', microtime(true));
        }
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }

    public function test_product_can_be_shown()
    {
        $product = Product::factory()->create();

        $response = $this->get('/api/products/' . $product->getKey());
        $response->assertStatus(200);
    }

    public function test_product_can_be_stored()
    {
        $attributes = [
            'sku' => '1122',
            'name' => 'Test name',
            'price' => '123',
        ];

        $response = $this->post('/api/products/', $attributes);

        $response->assertStatus(201);
        $this->assertDatabaseHas('products', $attributes);
    }

    public function test_product_can_be_updated()
    {
        $product = Product::factory()->create();

        $attributes = [
            'sku' => '1122',
            'name' => 'Test name',
            'price' => '123',
        ];

        $response = $this->patch('/api/products/' . $product->getKey(), $attributes);
        $response->assertStatus(202);

        $this->assertDatabaseHas('products', array_merge(
            ['id' => $product->getKey()],
            $attributes
        ));
    }

    public function test_product_can_be_destroyed()
    {
        $product = Product::factory()->create();
        $response = $this->delete('/api/products/' . $product->getKey());

        $response->assertStatus(200);

        $this->assertDatabaseMissing('products', ['id' => $product->getKey()]);
    }
}
