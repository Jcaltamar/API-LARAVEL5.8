<?php

namespace App\Repositories;

use App\Models\cliente;
use App\Repositories\BaseRepository;

/**
 * Class clienteRepository
 * @package App\Repositories
 * @version April 27, 2019, 7:59 pm UTC
*/

class clienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    public $timestamps = false;

    protected $fieldSearchable = [
        'cedula',
        'nombres',
        'apellidos',
        'edad',
        'estatura'
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
        return cliente::class;
    }
}
