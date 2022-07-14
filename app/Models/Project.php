<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'number',
        'year',
        'date',
        'author',
        'type',
        'summary',
        'file',
        'status',
    ];

    public function councilors(){
        return $this->belongsToMany(Councilor::class);
    }

    public function commissions(){
        return $this->belongsToMany(Commission::class);
    }
}

