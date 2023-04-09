<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['productos'] = Productos::paginate(10);
        return view('productosView.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('productosView.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datosProductos = request()->except('_token');
        

        if($request -> hasFile('foto')){
            $datosProductos['foto'] = $request -> file('foto') -> store('uploads', 'public');
        }


        Productos::insert($datosProductos);

        //De esta manera se obtiene un token el cual contiene la información de nuestros envíos de formulario
        return redirect('productos')->with('mensaje', 'Producto agregado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $producto = Productos::findOrFail($id);
        return view('productosView.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosProductos = request()->except(['_token', '_method']);

        if($request -> hasFile('foto')){

            $producto = Productos::findOrFail($id);
            Storage::delete('/public'.$producto->foto);

            $datosProductos['foto'] = $request -> file('foto') -> store('uploads', 'public');
        }



        Productos::where('id','=',$id)->update($datosProductos);
        $producto = Productos::findOrFail($id);
        return view('productosView.edit', compact('producto'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $producto = Productos::findOrFail($id);
        if(Storage::delete('/public'.$producto->foto)){

            Productos::destroy($id);

        }
        
        return redirect('productos')->with('mensaje','Producto eliminado correctamente');
    }
}
