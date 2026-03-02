<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Tipo extends Model
{
    protected $fillable = [
        'tipo'
    ];

    public const PAGINATE = 10;

    //Relación con los extintores
    public function atncion(): HasMany
    {
        return $this->hasMany(Extintor::class);
    }
}
