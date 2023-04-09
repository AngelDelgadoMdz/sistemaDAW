{{-- Formulario de edición de productos --}}



@extends('layouts.app')
@section('content')

<div class="container">

<form action="{{url('/productos/'.$producto->id)}}" method="post" enctype="multipart/form-data">
    
    @csrf
    {{ method_field('PATCH') }}

    @include('productosView.form', ['modo'=>'Editar'])

</form>
</div>
@endsection
