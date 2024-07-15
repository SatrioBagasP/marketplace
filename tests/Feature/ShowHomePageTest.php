<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowHomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testShowHomePage(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testShowAboutPage(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
