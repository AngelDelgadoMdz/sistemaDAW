
<style>
    .icono-label {
        width: 50px;
    }
</style>

<div class="container">
<div class="container-fluid mx-auto w-75 myform p-5">
    <h1 id="titulo" class="text-center myfont">
        {{ $modo }} pedido
    </h1>



    <div class="form-group my-3">
        <label class="my-2" for="producto_id">
            <img class="icono-label" src="" alt="">
            Producto
        </label>
        <select class="form-select" name="producto_id" id="producto_id"> --}}
            @foreach ($productos as $id => $nombre)
                <option value="{{ $id }}">{{ $nombre }}</option>
            @endforeach 

        </select>
    </div>


    <div class="form-group my-3">
        <label class="my-2" for="cantidad">
            <img class="icono-label" src="https://cdn-icons-png.flaticon.com/512/3793/3793688.png" alt="">
            Cantidad
        </label>
        <input class="form-control" type="text" name="cantidad" id="cantidad"
            value="{{ isset($pedido->cantidad) ? $pedido->cantidad : '' }}">
    </div>

    {{-- <div class="form-group my-3">
        <label class="my-2" for="precio_unitario">
            <img class="icono-label" src="https://cdn-icons-png.flaticon.com/512/3037/3037156.png" alt="">
            Precio unitario
        </label>
        <input class="form-control" type="text" name="precio_unitario" id="precio_unitario"
            value="{{ isset($pedido->precio_unitario) ? $pedido->precio_unitario : '' }}">
    </div>

    <div class="form-group my-3">
        <label class="my-2" for="precio_total">
            <img class="icono-label" src="https://cdn-icons-png.flaticon.com/512/3037/3037156.png" alt="">
            Precio total
        </label>
        <input class="form-control" type="text" name="precio_total" id="precio_total"
            value="{{ isset($pedido->precio_total) ? $pedido->precio_total : '' }}">
    </div> --}}

    <div class="form-group my-3">
        <label class="my-2" for="status">
            <img class="" src="" alt="">
            Status
        </label>
        <select class="form-control" name="status" id="status">
            <option value="en proceso" {{ $pedido->status == "en proceso" ? "selected" : "" }}>En proceso</option>
            <option value="en ruta" {{ $pedido->status == "en ruta" ? "selected" : "" }}>En ruta</option>
            <option value="entregado" {{ $pedido->status == "entregado" ? "selected" : "" }}>Entregado</option>
        </select>
    </div>


    <input class="btn btn-success my-4" type="submit" value="{{ $modo }} datos">
    <a class="btn btn-primary my-4 px-3" href="{{ url('pedidos/') }}"> Regresar </a>
</div>
</div>

    
