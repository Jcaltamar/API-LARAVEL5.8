<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Noticia",
 *      required={"Titulo", "Descripcion", "UrlImage"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Titulo",
 *          description="Titulo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Descripcion",
 *          description="Descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="UrlImage",
 *          description="UrlImage",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Noticia extends Model
{
    use SoftDeletes;

    public $table = 'noticias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Titulo',
        'Descripcion',
        'UrlImage'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Titulo' => 'string',
        'Descripcion' => 'string',
        'UrlImage' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Titulo' => 'required',
        'Descripcion' => 'required',
        'UrlImage' => 'required'
    ];

    
}
