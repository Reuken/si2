<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    public function index(){
        $clientes = cliente::paginate(7);
        return view('cliente.index',['clientes'=>$clientes]);
    }

   public function create(){
        return view("cliente.create");
    }

    public function store(Request $request){
        cliente::create([
            'ci' => $request['ci'],
            'nombre' => $request['nombre'],
            'direccion' => $request['direccion'],
            'telefono' => $request['telefono'],
            'nit' => $request['nit']
        ]);
        return Redirect::to('cliente');
    }

    public function edit($id){
        $cliente=cliente::findOrFail($id);
        return view("cliente.edit",['cliente'=>$cliente]);
    }

    public function update(Request $request, $id)
    {
        $cliente=cliente::findOrFail($id);

        $cliente->ci=$request->ci;
        $cliente->nombre=$request->nombre;
        $cliente->direccion=$request->direccion;
        $cliente->telefono=$request->telefono;
        $cliente->nit=$request->nit;
        $cliente->update();

        return Redirect::to('cliente');
    }

    public function destroy($id)
    {
        $cliente=cliente::find($id);
        $cliente->delete();
        
        return Redirect::to('cliente');
    }
}