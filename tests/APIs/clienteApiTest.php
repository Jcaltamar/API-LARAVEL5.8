<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeclienteTrait;
use Tests\ApiTestTrait;

class clienteApiTest extends TestCase
{
    use MakeclienteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cliente()
    {
        $cliente = $this->fakeclienteData();
        $this->response = $this->json('POST', '/api/clientes', $cliente);

        $this->assertApiResponse($cliente);
    }

    /**
     * @test
     */
    public function test_read_cliente()
    {
        $cliente = $this->makecliente();
        $this->response = $this->json('GET', '/api/clientes/'.$cliente->id);

        $this->assertApiResponse($cliente->toArray());
    }

    /**
     * @test
     */
    public function test_update_cliente()
    {
        $cliente = $this->makecliente();
        $editedcliente = $this->fakeclienteData();

        $this->response = $this->json('PUT', '/api/clientes/'.$cliente->id, $editedcliente);

        $this->assertApiResponse($editedcliente);
    }

    /**
     * @test
     */
    public function test_delete_cliente()
    {
        $cliente = $this->makecliente();
        $this->response = $this->json('DELETE', '/api/clientes/'.$cliente->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/clientes/'.$cliente->id);

        $this->response->assertStatus(404);
    }
}
