<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class vagas_candidatura extends Model
{
    protected $fillable = [
        'vaga_id',
        'user_id',
        'status'
    ];
    public function vaga()
    {
        return $this->belongsTo(Vagas::class, 'vaga_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
