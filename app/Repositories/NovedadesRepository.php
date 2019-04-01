<?php

namespace App\Repositories;

use App\Models\Novedades;
use App\Repositories\BaseRepository;

/**
 * Class NovedadesRepository
 * @package App\Repositories
 * @version April 1, 2019, 5:13 pm UTC
*/

class NovedadesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Titulo',
        'descripcion',
        'usuario',
        'correo'
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
        return Novedades::class;
    }
}
