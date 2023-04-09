{{-- Formulario de edición de pedidos --}}



@extends('layouts.app')
@section('content')

<div class="container">

    <form action="{{url('/pedidos/'.$pedido->id)}}" method="post" enctype="multipart/form-data">
        
        @csrf
        {{ method_field('PATCH') }}
    
        @include('pedidosView.form', ['modo'=>'Editar', 'productos' => $productos])

    
    </form>
    </div>
    @endsection