<?php

// UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserCollection;
use App\Usuario;

class UserController extends Controller
{
    public function store(Request $request)
    {
      $user = new Usuario([
        'nome' => $request->get('nome'),
        'sobrenome' => $request->get('sobrenome'),
        'email' => $request->get('email'),
        'senha' => $request->get('senha')
      ]);

      $user->save();

      return response()->json('success');
    }
    public function index()
    {
      return new UserCollection(Usuario::all());
    }

    public function edit($id)
    {
      $user = Usuario::find($id);
      return response()->json($user);
    }

    public function update($id, Request $request)
    {
      $user = Usuario::find($id);

      $user->update($request->all());

      return response()->json('successfully updated');
    }

    public function delete($id)
    {
      $user = Usuario::find($id);

      $user->delete();

      return response()->json('successfully deleted');
    }
}