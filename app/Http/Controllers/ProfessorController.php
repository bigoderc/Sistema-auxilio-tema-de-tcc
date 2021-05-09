<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Area;
class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Professor $model)
    {
       //dd($model);
        return view('professor.index', ['professores' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas= Area::all()->pluck('nome','id');
        return view('professor.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Professor::create($request->all());
        return redirect()->route('professor.index')->withStatus(__('Produto Cadastrado.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professor=Professor::findOrFail($id);
        $areas= Area::all()->pluck('nome','id');
        return view('professor.edit', compact('professor','areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obj    = Professor::where('id',$id)->first();
        $obj->update($request->all());

        return redirect()->route('professor.index')->withStatus(__('area Alterado Com Sucesso.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professor=Professor::findOrFail($id);
        $professor->delete();
        return redirect()->route('professor.index')->withStatus(__('area excluido com sucesso.'));
    }
}
