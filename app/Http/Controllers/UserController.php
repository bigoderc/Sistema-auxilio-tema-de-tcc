<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['usuarios' => $model->paginate(15)]);
    }
    public function create(){
        return view('users.create');
    }
    public function store(Request $request){
        //dd($request->all());
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->endereco = $request['endereco'];
        $user->cidade = $request['cidade'];
        $user->uf = $request['uf'];
        $user->cep = $request['cep'];
        $user->numero = $request['numero'];
        $user->save();
        return redirect()->route('user.index')->withStatus(__('Usuário Cadastrado.'));
    }
}
