@extends('layouts.app')

@section('content')
<h1 class="text-center">Editar un Usuario</h1>
    <div class="conatiner">

    <form method="POST" action="{{ route('users.update', ['user' => $users->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="titulo">Titulo</label>
            <input class="form-control" type="text" name="name"  
            value="{{ old('name') ?? $users->name }}">
        </div>

        <div class="form-row">
            <label for="descripcion">Descripcion</label>
            <input class="form-control" type="email" name="email" 
            value="{{ old('email') ?? $users->email }}">
        </div>

      
        
        <div class="form-row mt-3 text-center">
           <button class="btn btn-primary btn-lg" type="submit" >Editar Producto</button>
        </div>

    </form>
</div>
@endsection