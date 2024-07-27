<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RepoTest extends TestCase
{
    public function testGetPopularRepositories()
    {
        $response = $this->get('/repos?date=2019-01-10&limit=10');

        $response->assertStatus(200);
    }
}
