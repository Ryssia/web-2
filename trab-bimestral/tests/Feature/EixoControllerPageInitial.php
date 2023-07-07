<?php

namespace Tests\Feature;

use App\Models\Eixo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use GuzzleHttp\Client;

class PageInicialTest extends TestCase
{
    public function testPageInicial()
    {
        $client = new Client();

        $response = $client->get('http://localhost:8000/eixos');
        $content = $response->getBody()->getContents();

        $this->assertStringContainsString('Eixos', $content);
    }
}
