<?php

namespace App\Http\Controllers;
use App\Projeto;
use App\Area;
use App\Professor;
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
        //dd($model->get());
        return view('projeto.index', ['projetos' => $model->paginate(15)]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //dd($model);
        $areas= Area::all()->pluck('nome','id');
        $professores= Professor::all()->pluck('nome','id');
        return view('projeto.create',compact('areas','professores'));
    }
    public function store(Request $req)
    {
       $req->validate([
        'file' => 'required|mimes:pdf|max:4048'
        ]);
        if($req->file()) {
            $fileName = $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $req['arquivo']=$req->file->getClientOriginalName();
            //dd($req->all());
            Projeto::create($req->all());
            return back()->with('success','File has been uploaded.');
        }
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projeto=Projeto::findOrFail($id);
        $areas= Area::all()->pluck('nome','id');
        $professores= Professor::all()->pluck('nome','id');
        return view('projeto.edit', compact('projeto','areas','professores'));
    }
    public function update(Request $req, $id)
    {
        $req->validate([
        'file' => 'required|mimes:pdf|max:4048'
        ]);
        if($req->file()) {
            $fileName = $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $req['arquivo']=$req->file->getClientOriginalName();
        }
        $obj    = Projeto::where('id',$id)->first();
        $obj->update($req->all());
        return redirect()->route('projeto.index')->withStatus(__('Projeto Alterado Com Sucesso.'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projeto=Projeto::findOrFail($id);
        $projeto->delete();
        return redirect()->route('projeto.index')->withStatus(__('Projeto excluido com sucesso.'));
    }
}
