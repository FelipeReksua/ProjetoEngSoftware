<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('users.list')->with(
            array(
                'page' => 'Usuários',
                'usuarios' => $usuarios
            )
        );
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        if ($usuario)
            return view('users.edit', array('usuario' => $usuario, 'page' => 'Editar cadastro de usuário'));
        else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()) {
            return redirect('/');
        }

        $user = User::find($id);

        if (Auth::user()->email == $request->get('email')) {
            $this->validate(request(), [
                'name' => 'required',
                'email' => 'email|required',
                'password' => 'required|min:6|confirmed'
            ]);
        } else {
            $this->validate(request(), [
                'name' => 'required',
                // 'email' => 'email|required|unique:users',
                'email' => 'email|required|unique:users,email,'.$user->id,
                'password' => 'required|min:6|confirmed'
            ]);
        }
        

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));

        $user->save();

        return redirect('/users')->with(
            array(
                'page' => 'Usuários',
                'success' => 'Cadastro atualizado!'
            )
        );
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/users')->with('success', 'Cadastro deletado!');
    }
}
