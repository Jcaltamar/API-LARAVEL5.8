<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\mensaje;
use App\Repositories\mensajeRepository;

trait MakemensajeTrait
{
    /**
     * Create fake instance of mensaje and save it in database
     *
     * @param array $mensajeFields
     * @return mensaje
     */
    public function makemensaje($mensajeFields = [])
    {
        /** @var mensajeRepository $mensajeRepo */
        $mensajeRepo = \App::make(mensajeRepository::class);
        $theme = $this->fakemensajeData($mensajeFields);
        return $mensajeRepo->create($theme);
    }

    /**
     * Get fake instance of mensaje
     *
     * @param array $mensajeFields
     * @return mensaje
     */
    public function fakemensaje($mensajeFields = [])
    {
        return new mensaje($this->fakemensajeData($mensajeFields));
    }

    /**
     * Get fake data of mensaje
     *
     * @param array $mensajeFields
     * @return array
     */
    public function fakemensajeData($mensajeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'mensaje' => $fake->word,
            'url' => $fake->word,
            'data' => $fake->text,
            'buttons' => $fake->text,
            'schedule' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $mensajeFields);
    }
}
