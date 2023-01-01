@extends('layouts.app')

@section('content')
<h1 class="text-center">Grabar un Usuario</h1>
    <div class="container">
    <form method="POST" action="{{ route('users.index') }}">
        @csrf
        <div class="form-row">
            <label for="titulo">Titulo</label>
            <input class="form-control" type="text" name="titulo" value="{{old('titulo') }}" >
        </div>

        <div class="form-row">
            <label for="descripcion">Descripcion</label>
            <input class="form-control" type="text" name="descripcion" value="{{old('descripcion') }}" >
        </div>

        <div class="form-row">
            <label for="titulo">Precio</label>
            <input class="form-control" type="number" name="precio"  min="1.00" step="0.01" value="{{old('precio') }}">
        </div>

        <div class="form-row">
            <label for="titulo">Stock</label>
            <input class="form-control" type="number" name="stock"  min="0" value="{{old('stock') }}">
        </div>
        
        <div class="form-row">
            <label for="status">Estatus</label>
            <select class="form-control" name="status" id="status" >
                <option value="" selected>Selecione.....</option>
                <option {{old('status') == 'disponible' ? 'selected' : ''}} value="disponible">Disponible</option>
                <option {{old('status') == 'no-disponible' ? 'selected' : ''}} value="no-disponible">No Disponible</option>
            </select>
        </div>
        
        <div class="form-row mt-3 text-center">
           <button class="btn btn-primary btn-lg" type="submit" >Grabar Producto</button>
        </div>

    </form>
</div>
@endsection