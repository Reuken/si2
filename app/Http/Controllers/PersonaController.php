<?php

namespace App\Http\Controllers;

use App\Models\persona;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index(){
        $personas = persona::paginate(7);
        $users = user::orderBy('created_at', 'desc')->paginate(7);
        return view('user.index',['users'=>$users, 'personas'=>$personas]);
    }

   public function create(){
        return view("auth.register");
    }

    public function store(Request $request){
        $user=User::create([
            'name' => $request['nombre'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
        persona::create([
            'id' => $request['ci'],
            'direccion' => $request['direccion'],
            'telefono' => $request['telefono'],
            'user_id' => $user['id']
        ]);
        return Redirect::to('user');
    }

    public function edit($id){
        $persona=persona::findOrFail($id);
        $user=user::findOrFail($persona->user_id);
        return view("user.edit",['persona'=>$persona, 'user'=>$user]);
    }

    public function update(Request $request, $id)
    {
        $persona=persona::findOrFail($id);
        $usuario=user::findOrFail($persona->user_id);

        $persona->id=$request->ci;
        $persona->direccion=$request->direccion;
        $persona->telefono=$request->telefono;
        $persona->update();

        $usuario->name=$request->nombre;
        $usuario->email=$request->email;
        $usuario->password=$request->password;
        $usuario->password=Hash::make($request['password']);
        $usuario->update();

        return Redirect::to('user');
    }

    public function destroy($id)
    {
        $usuario=User::find($id);
        $usuario->delete();
        
        return Redirect::to('user');
    }
}
