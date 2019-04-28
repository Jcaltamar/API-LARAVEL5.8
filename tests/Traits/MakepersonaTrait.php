<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\persona;
use App\Repositories\personaRepository;

trait MakepersonaTrait
{
    /**
     * Create fake instance of persona and save it in database
     *
     * @param array $personaFields
     * @return persona
     */
    public function makepersona($personaFields = [])
    {
        /** @var personaRepository $personaRepo */
        $personaRepo = \App::make(personaRepository::class);
        $theme = $this->fakepersonaData($personaFields);
        return $personaRepo->create($theme);
    }

    /**
     * Get fake instance of persona
     *
     * @param array $personaFields
     * @return persona
     */
    public function fakepersona($personaFields = [])
    {
        return new persona($this->fakepersonaData($personaFields));
    }

    /**
     * Get fake data of persona
     *
     * @param array $personaFields
     * @return array
     */
    public function fakepersonaData($personaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'cedula' => $fake->word,
            'nombres' => $fake->word,
            'apellidos' => $fake->word,
            'edad' => $fake->word,
            'estatura' => $fake->word,
            'selfie' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $personaFields);
    }
}
