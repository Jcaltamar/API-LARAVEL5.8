<?php

namespace App\Repositories;

use App\Models\mensaje;
use App\Repositories\BaseRepository;

/**
 * Class mensajeRepository
 * @package App\Repositories
 * @version June 6, 2019, 4:22 am UTC
*/

class mensajeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mensaje',
        'url',
        'schedule'
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
        return mensaje::class;
    }
}
