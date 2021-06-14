<?php

namespace App\Http\Controllers;
use App\Projeto;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Projeto $model)
    {
       //dd($model);
        return view('projeto.index', ['projetos' => $model->paginate(15)]);
    }
}
