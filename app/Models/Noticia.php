<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Noticia
 * @package App\Models
 * @version March 31, 2019, 7:16 pm UTC
 *
 * @property string Titulo
 * @property string Descripcion
 * @property string urlimg
 */
class Noticia extends Model
{
    use SoftDeletes;

    public $table = 'noticias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Titulo',
        'Descripcion',
        'urlimg'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Titulo' => 'string',
        'Descripcion' => 'string',
        'urlimg' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Titulo' => 'required',
        'Descripcion' => 'required',
        'urlimg' => 'required'
    ];

    
}
