<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\cliente;
use App\Repositories\clienteRepository;

trait MakeclienteTrait
{
    /**
     * Create fake instance of cliente and save it in database
     *
     * @param array $clienteFields
     * @return cliente
     */
    public function makecliente($clienteFields = [])
    {
        /** @var clienteRepository $clienteRepo */
        $clienteRepo = \App::make(clienteRepository::class);
        $theme = $this->fakeclienteData($clienteFields);
        return $clienteRepo->create($theme);
    }

    /**
     * Get fake instance of cliente
     *
     * @param array $clienteFields
     * @return cliente
     */
    public function fakecliente($clienteFields = [])
    {
        return new cliente($this->fakeclienteData($clienteFields));
    }

    /**
     * Get fake data of cliente
     *
     * @param array $clienteFields
     * @return array
     */
    public function fakeclienteData($clienteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'cedula' => $fake->text,
            'nombre' => $fake->text,
            'apellido' => $fake->text,
            'edad' => $fake->text,
            'estatura' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $clienteFields);
    }
}
