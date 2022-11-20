<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsControllers extends Controller
{   
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
      
       $product = Products::all(); 
        // $product = DB::table('products')->first();
       //dd($product);

        return view('products.index')->with([
            'products' => Products::all(),
           // 'products' => [],
        ]);
    }



    public function create(){
        //return 'Esta es la lista para crear Productos desde un Controlador';

        return view('products.create');
        
    }

    public function store(Products $product, Request $request){  

      $product->create( $request->all());

      return redirect()->
      route('products.index')->
      withSuccess("El Producto de id: {$product->id} fue creado");
      
    }


    public function vista(Products $product){
      
      //$product = Products::findOrFail($product);
      return view('products.vista')->with([
       'products' => $product,

   ]);
   }


    public function edit(Products $product){
       // return "Este es el Producto {$product} a modificar" ;
      
       return view("products.edit")->with([
        'products' => $product,

    ]);
    }

    public function update(ProductsRequest $request, Products $product){

      $product->update( $request->all());
       return redirect()->
      route('products.index')->
      withSuccess("El Producto de id: {$product->id} fue editado");
    }

    public function destroy(Request $request, Products $product){
       // $product = Products::findOrFail($product);

      $product->delete( $request->all());

      return redirect()->
      route('products.index')->
      withSuccess("El Producto de id: {$product->id} fue eliminado");

     }

    
}
