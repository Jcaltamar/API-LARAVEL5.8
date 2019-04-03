<?php namespace Tests\Repositories;

use App\Models\Noticia;
use App\Repositories\NoticiaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeNoticiaTrait;
use Tests\ApiTestTrait;

class NoticiaRepositoryTest extends TestCase
{
    use MakeNoticiaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var NoticiaRepository
     */
    protected $noticiaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->noticiaRepo = \App::make(NoticiaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_noticia()
    {
        $noticia = $this->fakeNoticiaData();
        $createdNoticia = $this->noticiaRepo->create($noticia);
        $createdNoticia = $createdNoticia->toArray();
        $this->assertArrayHasKey('id', $createdNoticia);
        $this->assertNotNull($createdNoticia['id'], 'Created Noticia must have id specified');
        $this->assertNotNull(Noticia::find($createdNoticia['id']), 'Noticia with given id must be in DB');
        $this->assertModelData($noticia, $createdNoticia);
    }

    /**
     * @test read
     */
    public function test_read_noticia()
    {
        $noticia = $this->makeNoticia();
        $dbNoticia = $this->noticiaRepo->find($noticia->id);
        $dbNoticia = $dbNoticia->toArray();
        $this->assertModelData($noticia->toArray(), $dbNoticia);
    }

    /**
     * @test update
     */
    public function test_update_noticia()
    {
        $noticia = $this->makeNoticia();
        $fakeNoticia = $this->fakeNoticiaData();
        $updatedNoticia = $this->noticiaRepo->update($fakeNoticia, $noticia->id);
        $this->assertModelData($fakeNoticia, $updatedNoticia->toArray());
        $dbNoticia = $this->noticiaRepo->find($noticia->id);
        $this->assertModelData($fakeNoticia, $dbNoticia->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_noticia()
    {
        $noticia = $this->makeNoticia();
        $resp = $this->noticiaRepo->delete($noticia->id);
        $this->assertTrue($resp);
        $this->assertNull(Noticia::find($noticia->id), 'Noticia should not exist in DB');
    }
}
