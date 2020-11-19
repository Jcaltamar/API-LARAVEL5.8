<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Novedades",
 *      required={"Titulo", "Descripcion", "Usuario", "Correo"},
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
 *          property="Usuario",
 *          description="Usuario",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Correo",
 *          description="Correo",
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
class Novedades extends Model
{
    use SoftDeletes;

    public $table = 'novedades';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Titulo',
        'Descripcion',
        'Usuario',
        'Correo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Titulo' => 'string',
        'Descripcion' => 'string',
        'Usuario' => 'string',
        'Correo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Titulo' => 'required',
        'Descripcion' => 'required',
        'Usuario' => 'required',
        'Correo' => 'required'
    ];

    
}
