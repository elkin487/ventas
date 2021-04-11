<?php

namespace App\Http\Controllers;

use App\Rol;
use App\User;
use App\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all();
        return view('user/index',compact('user'));
    }

   
    public function create()
    {
        $user = User::all();
        $rol = Rol::all();
        return view('user/create', compact('user','rol'));
    }

    
    public function store(Request $request)
    {
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make($request['password']);
        $user->rol_id = request('rol_id');
       
        $user->save();
         return redirect()->route('user/index')->with('mensaje1','usuario añadido');
    }
    

   
    public function show(User $user)
    {
        //
    }

   
    public function edit(User $user)
    {
        //
    }

    
    public function update(Request $request, User $user)
    {
        //
    }

   
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user/index')->with('mensaje2','usuario Eliminado');
    }
    public function desactivar($id){
        $user = User::findOrFail($id);
        $user->estado_id =2;
        $user->save();
        return redirect()->route('user/index');
    }
    public function activar($id){
        $user = User::findOrFail($id);
        $user->estado_id =1;
        $user->save();
        return redirect()->route('user/index');
    }
    
}

