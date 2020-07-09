<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'nama', 
        'id_companies', 
        'email'
    ];

    public function companies()
    {
        return $this->belongsTo(Companies::class, 'id_companies');
    }
}
