<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\Novedades;
use App\Repositories\NovedadesRepository;

trait MakeNovedadesTrait
{
    /**
     * Create fake instance of Novedades and save it in database
     *
     * @param array $novedadesFields
     * @return Novedades
     */
    public function makeNovedades($novedadesFields = [])
    {
        /** @var NovedadesRepository $novedadesRepo */
        $novedadesRepo = \App::make(NovedadesRepository::class);
        $theme = $this->fakeNovedadesData($novedadesFields);
        return $novedadesRepo->create($theme);
    }

    /**
     * Get fake instance of Novedades
     *
     * @param array $novedadesFields
     * @return Novedades
     */
    public function fakeNovedades($novedadesFields = [])
    {
        return new Novedades($this->fakeNovedadesData($novedadesFields));
    }

    /**
     * Get fake data of Novedades
     *
     * @param array $novedadesFields
     * @return array
     */
    public function fakeNovedadesData($novedadesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Titulo' => $fake->word,
            'Descripcion' => $fake->word,
            'Usuario' => $fake->word,
            'Correo' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $novedadesFields);
    }
}
