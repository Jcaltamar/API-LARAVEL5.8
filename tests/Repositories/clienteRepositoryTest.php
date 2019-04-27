<?php namespace Tests\Repositories;

use App\Models\cliente;
use App\Repositories\clienteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeclienteTrait;
use Tests\ApiTestTrait;

class clienteRepositoryTest extends TestCase
{
    use MakeclienteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var clienteRepository
     */
    protected $clienteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clienteRepo = \App::make(clienteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cliente()
    {
        $cliente = $this->fakeclienteData();
        $createdcliente = $this->clienteRepo->create($cliente);
        $createdcliente = $createdcliente->toArray();
        $this->assertArrayHasKey('id', $createdcliente);
        $this->assertNotNull($createdcliente['id'], 'Created cliente must have id specified');
        $this->assertNotNull(cliente::find($createdcliente['id']), 'cliente with given id must be in DB');
        $this->assertModelData($cliente, $createdcliente);
    }

    /**
     * @test read
     */
    public function test_read_cliente()
    {
        $cliente = $this->makecliente();
        $dbcliente = $this->clienteRepo->find($cliente->id);
        $dbcliente = $dbcliente->toArray();
        $this->assertModelData($cliente->toArray(), $dbcliente);
    }

    /**
     * @test update
     */
    public function test_update_cliente()
    {
        $cliente = $this->makecliente();
        $fakecliente = $this->fakeclienteData();
        $updatedcliente = $this->clienteRepo->update($fakecliente, $cliente->id);
        $this->assertModelData($fakecliente, $updatedcliente->toArray());
        $dbcliente = $this->clienteRepo->find($cliente->id);
        $this->assertModelData($fakecliente, $dbcliente->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cliente()
    {
        $cliente = $this->makecliente();
        $resp = $this->clienteRepo->delete($cliente->id);
        $this->assertTrue($resp);
        $this->assertNull(cliente::find($cliente->id), 'cliente should not exist in DB');
    }
}
