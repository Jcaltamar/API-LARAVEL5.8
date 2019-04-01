<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Novedades
 * @package App\Models
 * @version April 1, 2019, 5:13 pm UTC
 *
 * @property  Titulo
 * @property string descripcion
 * @property string usuario
 * @property string correo
 */
class Novedades extends Model
{
    use SoftDeletes;

    public $table = 'novedades';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Titulo',
        'descripcion',
        'usuario',
        'correo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descripcion' => 'string',
        'usuario' => 'string',
        'correo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Titulo' => 'required',
        'descripcion' => 'required',
        'usuario' => 'required'
    ];

    
}
