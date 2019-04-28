<?php

namespace App\Repositories;

use App\Models\persona;
use App\Repositories\BaseRepository;

/**
 * Class personaRepository
 * @package App\Repositories
 * @version April 28, 2019, 5:52 pm UTC
*/

class personaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cedula',
        'nombres',
        'apellidos',
        'edad',
        'estatura',
        'selfie'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return persona::class;
    }
}
