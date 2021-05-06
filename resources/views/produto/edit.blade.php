@extends('layouts.app', ['title' => __('Forncedor')])

@section('content')
    @include('users.partials.header', [
        'title' => __(''),
        'description' => __(''),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--4">
        <div class="row">
            
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Cadastro do Produto') }} {{$produto->nome}}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('produto.update',$produto->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Dados do Produto') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col">
                                    <div class="form-group{{ $errors->has('produto') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produto">{{ __('Produto') }}</label>
                                        <input type="text" name="nome" id="input-produto" class="form-control form-control-alternative{{ $errors->has('produto') ? ' is-invalid' : '' }}" placeholder="{{ __('Produto') }}" value="{{ old('Produto',$produto->nome) }}" required autofocus>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('categoria') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-categoria">{{ __('Categoria') }}</label>
                                        <select class="form-control{{ $errors->has('categoria') ? ' is-invalid' : '' }}" name="categoria"    required="true" aria-required="true">
                                            <option value="{{ old('tipo_conselho', $produto->categoria) }}">{{$produto->categorias->descricao}}</option>
                                            @foreach($categoria as $key=>$value)
                                            <option value="{{$key}}">
                                                {{ $value}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('codigo_barra') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-codigo_barra">{{ __('Código de Barra') }}</label>
                                        <input type="text" name="codigo_barra" id="input-codigo_barra" class="form-control form-control-alternative{{ $errors->has('codigo_barra') ? ' is-invalid' : '' }}" placeholder="{{ __('Código de Barras') }}" value="{{ old('codigo_barra',$produto->codigo_barra) }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('codigo_interno') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-codigo_interno">{{ __('Código Interno') }}</label>
                                        <input type="text" name="codigo_interno" id="input-codigo_interno" class="form-control form-control-alternative{{ $errors->has('codigo_interno') ? ' is-invalid' : '' }}" placeholder="{{ __('Código Interno') }}" value="{{ old('codigo_interno', $produto->codigo_interno) }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group{{ $errors->has('fornecedor') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-fornecedor">{{ __('Fornecedor') }}</label>
                                        <select class="form-control{{ $errors->has('fornecedor') ? ' is-invalid' : '' }}" name="fornecedor"    required="true" aria-required="true">
                                        <option value="{{ old('fornecedor', $produto->fornecedor) }}">{{$produto->fornecedores->razao_social}}</option>
                                            @foreach($fornecedor as $key=>$value)
                                            <option value="{{$key}}">
                                                {{ $value}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('qtde_embalagem') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-qtde_embalagem">{{ __('Quantidade na Embalagem') }}</label>
                                        <input type="number"  min="1" name="qtde_embalagem" id="input-qtde_embalagem" class="form-control form-control-alternative{{ $errors->has('qtde_embalagem') ? ' is-invalid' : '' }}" placeholder="{{ __('Quantidade na Embalagem') }}" value="{{ old('qtde_embalagem', $produto->qtde_embalagem) }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('observacao') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-observacao">{{ __('Observação') }}</label>
                                        <textarea id="story" name="observacao"rows="2" cols="33" class="form-control form-control-alternative{{ $errors->has('observacao') ? ' is-invalid' : '' }}" placeholder="{{ __('Observação') }}" value="{{ old('observacao', $produto->observacao) }}"></textarea>
                                    </div>
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4">{{ __('Dados do Estoque') }}</h6>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group{{ $errors->has('qtde_embalagem') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-qtde_embalagem">{{ __('Quantidade de Unidades') }}</label>
                                        <input type="number"  min="1" name="" id="input-qtde_embalagem" class="form-control form-control-alternative{{ $errors->has('qtde_embalagem') ? ' is-invalid' : '' }}" placeholder="{{ __('Quantidade na Embalagem') }}" value="{{ old('qtde_embalagem', $produto->estoque->unidade) }}" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('qtde_embalagem') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-qtde_embalagem">{{ __('Data Última Saida') }}</label>
                                        <input type="date"  min="1" name="" id="input-qtde_embalagem" class="form-control form-control-alternative{{ $errors->has('qtde_embalagem') ? ' is-invalid' : '' }}"  value="{{ old('qtde_embalagem', $produto->estoque->ultima_saida) }}" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('qtde_embalagem') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-qtde_embalagem">{{ __('Data Última Entrada') }}</label>
                                        <input type="date"  min="1" name="" id="input-qtde_embalagem" class="form-control form-control-alternative{{ $errors->has('qtde_embalagem') ? ' is-invalid' : '' }}"  value="{{ old('qtde_embalagem', $produto->estoque->ultima_entrada) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group{{ $errors->has('qtde_embalagem') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-qtde_embalagem">{{ __('Valor Unitario') }}</label>
                                        <input type="number"  min="1" name="" id="input-qtde_embalagem" class="form-control form-control-alternative{{ $errors->has('qtde_embalagem') ? ' is-invalid' : '' }}"  value="{{ old('qtde_embalagem', $produto->valor_unitario) }}" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('qtde_embalagem') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-qtde_embalagem">{{ __('Curva ABC') }}</label>
                                        <input type="text"  min="1" name="" id="input-qtde_embalagem" class="form-control form-control-alternative{{ $errors->has('qtde_embalagem') ? ' is-invalid' : '' }}"  value="{{ old('qtde_embalagem', $produto->curva_abc) }}" disabled>
                                    </div>
                                </div>
                            </div>
                                    <div class="text-left">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection