<?php

namespace App\Repositories;

use App\Models\Noticia;
use App\Repositories\BaseRepository;

/**
 * Class NoticiaRepository
 * @package App\Repositories
 * @version March 31, 2019, 7:16 pm UTC
*/

class NoticiaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Titulo',
        'Descripcion',
        'urlimg'
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
