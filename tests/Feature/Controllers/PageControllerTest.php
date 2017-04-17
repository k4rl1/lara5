<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PageControllerTest extends TestCase
{
    /**
     * @test
     */
    public function it_shows_program_page_of_all_packages()
    {
        $response = $this->get('/programm');

        $response->assertStatus(200);
    }
}
