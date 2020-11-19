<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakepersonaTrait;
use Tests\ApiTestTrait;

class personaApiTest extends TestCase
{
    use MakepersonaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_persona()
    {
        $persona = $this->fakepersonaData();
        $this->response = $this->json('POST', '/api/personas', $persona);

        $this->assertApiResponse($persona);
    }

    /**
     * @test
     */
    public function test_read_persona()
    {
        $persona = $this->makepersona();
        $this->response = $this->json('GET', '/api/personas/'.$persona->id);

        $this->assertApiResponse($persona->toArray());
    }

    /**
     * @test
     */
    public function test_update_persona()
    {
        $persona = $this->makepersona();
        $editedpersona = $this->fakepersonaData();

        $this->response = $this->json('PUT', '/api/personas/'.$persona->id, $editedpersona);

        $this->assertApiResponse($editedpersona);
    }

    /**
     * @test
     */
    public function test_delete_persona()
    {
        $persona = $this->makepersona();
        $this->response = $this->json('DELETE', '/api/personas/'.$persona->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/personas/'.$persona->id);

        $this->response->assertStatus(404);
    }
}
