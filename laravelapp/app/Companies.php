<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = [
        'nama', 
        'email', 
        'logo', 
        'website'
    ];

    public function employees()
    {
        return $this->hasMany(Employees::class);
    }
}
