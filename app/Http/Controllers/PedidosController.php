<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Productos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['pedidos'] = Pedidos::paginate(10);
        return view('pedidosView.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pedido = new Pedidos();
        $productos = Productos::pluck('nombre', 'id');
        $precios = Productos::pluck('precio', 'id');

        return view('pedidosView.create', compact('pedido', 'productos', 'precios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    //     $datosPedidos = request()->except('_token');


    //     Pedidos::insert($datosPedidos);

    //     //De esta manera se obtiene un token el cual contiene la información de nuestros envíos de formulario
    //     return redirect('pedidos')->with('mensaje', 'Pedido agregado correctamente');
    //  Por si fallamos en el intento }
    public function store(Request $request)
    {
        $datosPedidos = $request->except('_token');

        //Almacenamos la información del registro 
        //Almacenamos la información del producto a guardar en una variable
        $producto = Productos::find($datosPedidos['producto_id']);
        //El precio unitario está dado por el atributo precio del producto seleccionado
        $precio_unitario = $producto->precio;
        //la cantidad la encontramos del request
        $cantidad = $datosPedidos['cantidad'];
        //Pasamos la información a la variable datosPedidos
        $datosPedidos['precio_unitario'] = $precio_unitario;
        $datosPedidos['precio_total'] = $precio_unitario * $cantidad;

        //Insertamos la información
        Pedidos::insert($datosPedidos);

        return redirect('pedidos')->with('mensaje', 'Pedido agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedidos $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $pedido = Pedidos::findOrFail($id);
        $productos = Productos::pluck('nombre', 'id');

        return view('pedidosView.edit', compact('pedido', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosPedidos = request()->except(['_token', '_method']);
        $productos = Productos::pluck('nombre', 'id'); //Agregamos los nombres de los productos de la tabla 'productos'

        Pedidos::where('id', '=', $id)->update($datosPedidos);

        //Hacer que el stock del producto, una vez actualizado su status, cambie
        $pedido = Pedidos::findOrFail($id); // Tomamos los valores que tenemos en el registro actual ($id)

        //Revisamos el status antes de actualizar, revisamos si está ENTREGADO
        if ($pedido->status == 'entregado') {
            //Creamos la variable productos la cual nos regresa el registro que queremos de acuerdo al producto_id del pedido actual
            $producto = Productos::findOrFail($pedido->producto_id);
            //Actualizamos el valor del stock del producto
            $producto->stock -= $pedido->cantidad;
            $producto->save();
        }

        return view('pedidosView.edit', compact('pedido', 'productos'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $pedido = Pedidos::findOrFail($id);
        Pedidos::destroy($id);
        return redirect('pedidos')->with('mensaje', 'Pedido eliminado correctamente');
    }
}
