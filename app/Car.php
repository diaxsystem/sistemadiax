<?php

namespace App;

use App\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function products(){
        return $this->belongsToMany(Products::class)->withPivot('quantity');
    }
}
