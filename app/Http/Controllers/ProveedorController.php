<?php

namespace App\Http\Controllers;

use App\Models\proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProveedorController extends Controller
{
    public function index(){
        $proveedors = proveedor::paginate(7);
        return view('proveedor.index',['proveedors'=>$proveedors]);
    }

   public function create(){
        return view("proveedor.create");
    }

    public function store(Request $request){
        proveedor::create([
            'nombre' => $request['nombre'],
            'direccion' => $request['direccion'],
            'nit' => $request['nit'],
            'telefono' => $request['telefono'],
            'descripcion' => $request['descripcion']
        ]);
        return Redirect::to('proveedor');
    }

    public function edit($id){
        $proveedor=proveedor::findOrFail($id);
        return view("proveedor.edit",['proveedor'=>$proveedor]);
    }

    public function update(Request $request, $id)
    {
        $proveedor=proveedor::findOrFail($id);

        $proveedor->nombre=$request->nombre;
        $proveedor->direccion=$request->direccion;
        $proveedor->nit=$request->nit;
        $proveedor->telefono=$request->telefono;
        $proveedor->descripcion=$request->descripcion;
        $proveedor->update();

        return Redirect::to('proveedor');
    }

    public function destroy($id)
    {
        $proveedor=proveedor::find($id);
        $proveedor->delete();
        
        return Redirect::to('proveedor');
    }
}
