<?php

namespace Tests\Feature;

use Tests\TestCase;

class DrinkTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_drink(): void
    {
        $response = $this->get('/drink');

        $response->assertStatus(200);

        $response->assertSee('I love Coca!!');
    }
}
