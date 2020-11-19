<?php namespace Tests\Repositories;

use App\Models\Novedades;
use App\Repositories\NovedadesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeNovedadesTrait;
use Tests\ApiTestTrait;

class NovedadesRepositoryTest extends TestCase
{
    use MakeNovedadesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var NovedadesRepository
     */
    protected $novedadesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->novedadesRepo = \App::make(NovedadesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_novedades()
    {
        $novedades = $this->fakeNovedadesData();
        $createdNovedades = $this->novedadesRepo->create($novedades);
        $createdNovedades = $createdNovedades->toArray();
        $this->assertArrayHasKey('id', $createdNovedades);
        $this->assertNotNull($createdNovedades['id'], 'Created Novedades must have id specified');
        $this->assertNotNull(Novedades::find($createdNovedades['id']), 'Novedades with given id must be in DB');
        $this->assertModelData($novedades, $createdNovedades);
    }

    /**
     * @test read
     */
    public function test_read_novedades()
    {
        $novedades = $this->makeNovedades();
        $dbNovedades = $this->novedadesRepo->find($novedades->id);
        $dbNovedades = $dbNovedades->toArray();
        $this->assertModelData($novedades->toArray(), $dbNovedades);
    }

    /**
     * @test update
     */
    public function test_update_novedades()
    {
        $novedades = $this->makeNovedades();
        $fakeNovedades = $this->fakeNovedadesData();
        $updatedNovedades = $this->novedadesRepo->update($fakeNovedades, $novedades->id);
        $this->assertModelData($fakeNovedades, $updatedNovedades->toArray());
        $dbNovedades = $this->novedadesRepo->find($novedades->id);
        $this->assertModelData($fakeNovedades, $dbNovedades->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_novedades()
    {
        $novedades = $this->makeNovedades();
        $resp = $this->novedadesRepo->delete($novedades->id);
        $this->assertTrue($resp);
        $this->assertNull(Novedades::find($novedades->id), 'Novedades should not exist in DB');
    }
}
