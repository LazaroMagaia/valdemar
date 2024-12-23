<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name', 'description','icon'];

    public function vagas()
    {
        return $this->hasMany(Vagas::class, 'category_id');
    }
    
}
