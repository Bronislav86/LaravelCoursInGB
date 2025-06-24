<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PhpParser\Node\Expr\FuncCall;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_products_can_be_indexed()
    {
        //
    }

    public function test_product_can_be_shown()
    {
        //
    }

    public function test_product_can_be_stored()
    {
        //
    }

    public function test_product_can_be_updated()
    {
        //
    }

    public function test_product_can_be_destroyed()
    {
        //
    }
}
