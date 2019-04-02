<?php

namespace App\Repositories;

use App\Models\Noticia;
use App\Repositories\BaseRepository;

/**
 * Class NoticiaRepository
 * @package App\Repositories
 * @version April 2, 2019, 1:34 pm UTC
*/

class NoticiaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
