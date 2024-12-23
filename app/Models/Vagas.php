<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vagas extends Model
{
    protected $filable = [
        'name', 'description', 'salary','contract_type','company_id',
        'address','category_id','expiration_date','status','provincia'
    ];
    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function funcoes()
    {
        return $this->hasMany(vaga_funcoes::class, 'vaga_id');
    }
    public function requisitos()
    {
        return $this->hasMany(Vaga_requirements::class, 'vaga_id');
    }
}
