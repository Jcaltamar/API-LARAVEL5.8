<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Noticia
 * @package App\Models
 * @version April 1, 2019, 4:47 pm UTC
 *
 * @property string Titulo
 * @property string descripcion
 * @property string Urlimage
 */
class Noticia extends Model
{
    use SoftDeletes;

    public $table = 'noticias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Titulo',
        'descripcion',
        'Urlimage'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Titulo' => 'string',
        'descripcion' => 'string',
        'Urlimage' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Titulo' => 'required',
        'descripcion' => 'required',
        'Urlimage' => 'required'
    ];

    
}
