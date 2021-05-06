@extends('layouts.app', ['title' => __('Produtos')])

@section('content')
@include('users.partials.header', [
'title' => __(''),

])
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Produtos</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('produto.create') }}" class="btn btn-sm btn-primary">Adicionar Produto</a>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Produto</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Unidade</th>
                                <th scope="col">Valor Unitário</th>
                                <th scope="col">Última Saída</th>
                                <th scope="col">Última Entrada</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($produtos as $produto)
                            <tr>
                                <td>{{$produto->nome}}</td>
                                <td>
                                    {{$produto->categorias->descricao}}
                                </td>
                                <td>{{$produto->estoque->unidade}}</td>
                                <td>{{$produto->valor_unitario}}</td>
                                <td>{{$produto->estoque->ultima_saida}}</td>
                                <td>{{$produto->estoque->ultima_entrada}}</td>
                                <td class="td-actions text-right">   
                                    <form action="{{ route('produto.destroy', $produto->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    
                                        <a rel="tooltip" class="btn btn-info btn-link" href="{{ route('produto.edit', $produto->id) }}" data-original-title="" title="">
                                        <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Deseja excluir o produto $produto->nome?") }}') ? this.parentElement.submit() : ''">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">

                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
</div>
@endsection