<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'municipios';

    protected $fillable = [
        'id',
        'codigo',
        'nome',
        'uf',
    ];

    public $timestamps = false;

    public function estados()
    {
      return $this->belongsTo('App\Models\Estado');
    }
}
