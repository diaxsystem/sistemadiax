<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
    
        return view("welcome")->with([
            'products' => Products::all(),
        ]);
    }
}
