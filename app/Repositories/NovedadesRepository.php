<?php

namespace App\Repositories;

use App\Models\Novedades;
use App\Repositories\BaseRepository;

/**
 * Class NovedadesRepository
 * @package App\Repositories
 * @version April 3, 2019, 12:52 am UTC
*/

class NovedadesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Titulo',
        'Descripcion',
        'Usuario',
        'Correo'
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
