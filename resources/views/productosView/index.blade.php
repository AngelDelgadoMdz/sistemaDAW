
@extends('layouts.app')
@section('content')

<div class="container">
        
    @if (Session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif



    <a class="btn btn-success my-3" href="{{ url('productos/create') }}"> Registrar nuevo producto </a>

    <table class="table table-light table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Foto</th>
                <th>Nombre del producto</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>

                    <td>

                        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $producto->foto }}"
                            alt="" width="200">

                    </td>

                    <td>{{ $producto->nombre }}</td>

                    <td>{{ $producto->descripcion }}</td>

                    <td> {{ $producto->precio }} </td>

                    <td> {{$producto->stock}} </td>

                    <td> <a href="{{ url('/productos/' . $producto->id . '/edit') }}" class="btn btn-primary">
                            Editar
                        </a>

                        <form action="{{ url('/productos/' . $producto->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('¿Quieres borrar este producto?')"
                                value="Borrar" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>



    </table>
</div>
@endsection