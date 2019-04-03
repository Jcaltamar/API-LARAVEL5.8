<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeNoticiaTrait;
use Tests\ApiTestTrait;

class NoticiaApiTest extends TestCase
{
    use MakeNoticiaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_noticia()
    {
        $noticia = $this->fakeNoticiaData();
        $this->response = $this->json('POST', '/api/noticias', $noticia);

        $this->assertApiResponse($noticia);
    }

    /**
     * @test
     */
    public function test_read_noticia()
    {
        $noticia = $this->makeNoticia();
        $this->response = $this->json('GET', '/api/noticias/'.$noticia->id);

        $this->assertApiResponse($noticia->toArray());
    }

    /**
     * @test
     */
    public function test_update_noticia()
    {
        $noticia = $this->makeNoticia();
        $editedNoticia = $this->fakeNoticiaData();

        $this->response = $this->json('PUT', '/api/noticias/'.$noticia->id, $editedNoticia);

        $this->assertApiResponse($editedNoticia);
    }

    /**
     * @test
     */
    public function test_delete_noticia()
    {
        $noticia = $this->makeNoticia();
        $this->response = $this->json('DELETE', '/api/noticias/'.$noticia->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/noticias/'.$noticia->id);

        $this->response->assertStatus(404);
    }
}
