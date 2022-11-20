<?php

namespace App\Http\Controllers;

use CreateBlogsTable;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Llamar todas la informacion de la tabla blogs
        $blogs = Blog::all();

        return response()->json($blogs);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Metodo de Create se realizara con formato JSON
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Metodo para el Almacenamiento de Datos
        $blog = Blog::create(request()->post());
        return response()->json([
           'blog'=> $blog
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //Para mostrar los Valores Seleccionados
        return response()->json($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Se realizo la funcion de editar con Vuejs
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //Para validar la funcion de editar un registro y guardamos los valores 
        return response()->fill($request->post())->save();
        return response()->json([
            'blog'=>$blog
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //Funcion para eliminar un registro
        $blog->delete();
        return response()->json([
            'mensaje'=> 'Blog Eliminado'
        ]);
    }
}
