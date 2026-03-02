<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clave extends Model
{
    protected $fillable = [
        'clave'
    ];

    public const PAGINATE = 10;


    public function atncion(): HasMany
     {
         return $this->hasMany(Extintor::class);
     }
    
}
