
@extends('layouts.app')
@section('content')


<div class="container">
        
    @if (Session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif



    <a class="btn btn-success my-3" href="{{ url('pedidos/create') }}"> Registrar nuevo pedido </a>

    <table class="table table-light table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Precio total</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id}}</td>


                    <td>{{ $pedido->producto->nombre}}</td>

                    <td>{{ $pedido->cantidad }}</td>

                    <td> {{ $pedido->producto->precio }} </td>

                    <td> {{ $pedido->producto->precio * $pedido->cantidad }} </td>

                    <td> {{$pedido->status}} </td>

                    <td> <a href="{{ url('/pedidos/' . $pedido->id . '/edit') }}" class="btn btn-primary">
                            Editar
                        </a>

                        <form action="{{ url('/pedidos/' . $pedido->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('¿Quieres borrar este pedido?')"
                                value="Borrar" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>



    </table>
</div>

@endsection