@extends('layouts.app')
@section('content')

<div class="container">

    <form action="{{ url('/pedidos') }}" method="post" enctype="multipart/form-data">
    
        @csrf
        {{-- //Con esto podemos incluir las referencias a otras vistas --}}
        @include('pedidosView.form', ['modo'=>'Crear'])
    
    
    
    </form>
    </div>
    @endsection