<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
use App\Area;

class temaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tema $model)
    {
       //dd($model);
        return view('tema.index', ['temas' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas= Area::all()->pluck('nome','id');
        return view('tema.create',compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filler = $request->all();
        tema::create($filler);

        return redirect()->route('tema.index')->withStatus(__('tema Cadastrado.'));
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
        $tema=tema::findOrFail($id);
        $areas= Area::all()->pluck('nome','id');
        return view('tema.edit', compact('tema','areas'));
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
        $obj    = tema::where('id',$id)->first();
        $obj->update($request->all());

        return redirect()->route('tema.index')->withStatus(__('tema Alterado Com Sucesso.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tema=tema::findOrFail($id);
        $tema->delete();
        return redirect()->route('tema.index')->withStatus(__('tema excluido com sucesso.'));
    }
}
