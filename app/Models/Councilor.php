<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Councilor extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'user',
        'email',
        'password',
    ];

    public function projects(){
        return $this->belongsToMany(Project::class);
    }

    public function commissions(){
        return $this->belongsToMany(Commission::class);
    }
}
