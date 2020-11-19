<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="mensaje",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="mensaje",
 *          description="mensaje",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="url",
 *          description="url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="data",
 *          description="data",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="buttons",
 *          description="buttons",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="schedule",
 *          description="schedule",
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
class mensaje extends Model
{
    use SoftDeletes;

    public $table = 'mensajes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'mensaje',
        'url',
        'data',
        'buttons',
        'schedule'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'mensaje' => 'string',
        'url' => 'string',
        'data' => 'string',
        'buttons' => 'string',
        'schedule' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
