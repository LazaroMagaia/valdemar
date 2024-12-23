<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaga_requirements extends Model
{
    protected $fillable = [
        'vaga_id','description'
    ];
    public function vaga()
    {
        return $this->belongsTo(Vagas::class);
    }
}
