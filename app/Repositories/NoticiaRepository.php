<?php

namespace App\Repositories;

use App\Models\Noticia;
use App\Repositories\BaseRepository;

/**
 * Class NoticiaRepository
 * @package App\Repositories
 * @version April 1, 2019, 4:47 pm UTC
*/

class NoticiaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Titulo',
        'descripcion',
        'Urlimage'
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
        return Noticia::class;
    }
}
