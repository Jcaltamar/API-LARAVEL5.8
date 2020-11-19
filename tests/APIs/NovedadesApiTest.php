<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeNovedadesTrait;
use Tests\ApiTestTrait;

class NovedadesApiTest extends TestCase
{
    use MakeNovedadesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_novedades()
    {
        $novedades = $this->fakeNovedadesData();
        $this->response = $this->json('POST', '/api/novedades', $novedades);

        $this->assertApiResponse($novedades);
    }

    /**
     * @test
     */
    public function test_read_novedades()
    {
        $novedades = $this->makeNovedades();
        $this->response = $this->json('GET', '/api/novedades/'.$novedades->id);

        $this->assertApiResponse($novedades->toArray());
    }

    /**
     * @test
     */
    public function test_update_novedades()
    {
        $novedades = $this->makeNovedades();
        $editedNovedades = $this->fakeNovedadesData();

        $this->response = $this->json('PUT', '/api/novedades/'.$novedades->id, $editedNovedades);

        $this->assertApiResponse($editedNovedades);
    }

    /**
     * @test
     */
    public function test_delete_novedades()
    {
        $novedades = $this->makeNovedades();
        $this->response = $this->json('DELETE', '/api/novedades/'.$novedades->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/novedades/'.$novedades->id);

        $this->response->assertStatus(404);
    }
}
