<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;


class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Area $model)
    {
       //dd($model);
        return view('area.index', ['areas' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
       
        return view('area.create');
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
        Area::create($filler);

        return redirect()->route('area.index')->withStatus(__('area Cadastrado.'));
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
        $area=Area::findOrFail($id);
        return view('area.edit', compact('area'));
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
        $obj    = Area::where('id',$id)->first();
        $obj->update($request->all());

        return redirect()->route('area.index')->withStatus(__('area Alterado Com Sucesso.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area=Area::findOrFail($id);
        $area->delete();
        return redirect()->route('area.index')->withStatus(__('area excluido com sucesso.'));
    }
}
