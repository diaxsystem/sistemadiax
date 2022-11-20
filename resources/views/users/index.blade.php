@extends('layouts.app')

@section('content')
    <h1>Lista de los Usuarios</h1>
    <a class="btn btn-success mb-3" href="{{ route('users.create') }}"><i class="fas fa-plus"></i> Crear Nuevo</a>

    @if(empty($users))
        <div class="alert alert-warning">
             Esta lista de Usuarios esta Vacia 
        </div>
    @else

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
       
            <thead class="thead-light">
                <tr class="text-center">
                     <th>ID</th>
                     <th>Nombre</th>
                     <th>Correo</th>
                     <th>Contraseña</th>
                     <th>Celular</th>
                     <th>Sucursal</th>
                     <th>Nro de Registro</th>
                     <th>Sexo</th>
                     <th>Editar</th>
                     <th>Mostrar</th>
                     <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $users)
                <tr class="text-center">
                    <td>{{ $users->id }}</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                    <td>{{ $users->password }}</td>
                    <td>{{ $users->celular }}</td>
                    <td>{{ $users->sucursal_id }}</td>
                    <td>{{ $users->nro_registro }}</td>
                    <td>{{ $users->sexo }}</td>

                    <td>
                        <a class="btn btn-warning" href="{{ route('users.edit',
                        [$users->id]) }}"><i class="fas fa-edit"></i> Editar</a>
                    </td>

                    <td>
                        <a class="btn btn-info" href="{{ route('users.show',
                        [$users->id]) }}"><i class="fas fa-eye"></i> Mostrar</a>
                    </td>

                    <td>
                        <form class="d-inline" method="GET" action="{{ route('users.destroy', [
                            'user' =>$users->id
                        ])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>

                        </form>
                   </td>
                   
                    
                </tr>
                @endforeach
                             
            </tbody>
        </table>
    </div>
    @endif
    @endsection