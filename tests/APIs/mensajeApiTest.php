<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakemensajeTrait;
use Tests\ApiTestTrait;

class mensajeApiTest extends TestCase
{
    use MakemensajeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_mensaje()
    {
        $mensaje = $this->fakemensajeData();
        $this->response = $this->json('POST', '/api/mensajes', $mensaje);

        $this->assertApiResponse($mensaje);
    }

    /**
     * @test
     */
    public function test_read_mensaje()
    {
        $mensaje = $this->makemensaje();
        $this->response = $this->json('GET', '/api/mensajes/'.$mensaje->id);

        $this->assertApiResponse($mensaje->toArray());
    }

    /**
     * @test
     */
    public function test_update_mensaje()
    {
        $mensaje = $this->makemensaje();
        $editedmensaje = $this->fakemensajeData();

        $this->response = $this->json('PUT', '/api/mensajes/'.$mensaje->id, $editedmensaje);

        $this->assertApiResponse($editedmensaje);
    }

    /**
     * @test
     */
    public function test_delete_mensaje()
    {
        $mensaje = $this->makemensaje();
        $this->response = $this->json('DELETE', '/api/mensajes/'.$mensaje->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/mensajes/'.$mensaje->id);

        $this->response->assertStatus(404);
    }
}
