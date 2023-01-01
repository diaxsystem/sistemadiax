<?php

namespace App;

use App\Car;
use App\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    

    /*
    *The attributes that are mass asignable
    *
    *@var array
    */
    protected $fillable = [
        'titulo',
        'descripcion',
        'precio',
        'stock',
        'status',
    ];

    public function cars(){
        return $this->belongsToMany(Car::class)->withPivot('quantity');
    }

    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
