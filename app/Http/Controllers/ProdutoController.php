<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;
use App\Estoque;
use App\Fornecedor;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produto $model)
    {
       // dd($model);
        return view('produto.index', ['produtos' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria= Categoria::all()->pluck('descricao','id');
        $fornecedor = Fornecedor::all()->pluck('razao_social','id');
       
        return view('produto.create', compact('categoria','fornecedor'));
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
        $produtos = Produto::create($filler);
        $filler['produto'] =  $produtos['id'];
        Estoque::create($filler);
        return redirect()->route('produto.index')->withStatus(__('Produto Cadastrado.'));
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
        $produto=Produto::findOrFail($id);
        $categoria= Categoria::all()->pluck('descricao','id');
        $fornecedor = Fornecedor::all()->pluck('razao_social','id');
        return view('produto.edit', compact('categoria','fornecedor','produto'));
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
        $obj    = Produto::where('id',$id)->first();
        $obj->update($request->all());

        return redirect()->route('produto.index')->withStatus(__('Produto Alterado Com Sucesso.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto=Fornecedor::findOrFail($id);
        $produto->delete();
        return redirect()->route('produto.index')->withStatus(__('Produto excluido com sucesso.'));
    }
}
