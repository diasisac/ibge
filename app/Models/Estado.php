<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'estados';

    protected $fillable = [
        'id',
        'codigo',
        'nome',
        'uf',
        'id_regiao',
    ];

    public $timestamps = false;
}
