<?php

namespace Tests\Feature;


use Tests\TestCase;
use App\Http\Controllers\EixoController;
use Illuminate\View\View;

class EixosControllerStoreTest extends TestCase
{
    public function testCreate()
    {
        $controller = new EixoController();

        $response = $controller->create();

        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('eixos.create', $response->getName());
    }
}



