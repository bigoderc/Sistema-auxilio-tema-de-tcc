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
                            <h3 class="col-12 mb-0">{{ __('Cadastro Produto') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('produto.store') }}" autocomplete="off">
                            @csrf
                            @method('post')

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
                                        <input type="text" name="nome" id="input-produto" class="form-control form-control-alternative{{ $errors->has('produto') ? ' is-invalid' : '' }}" placeholder="{{ __('Produto') }}" value="{{ old('Produto') }}" required autofocus>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('categoria') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-categoria">{{ __('Categoria') }}</label>
                                        <select class="form-control{{ $errors->has('categoria') ? ' is-invalid' : '' }}" name="categoria"    required="true" aria-required="true">
                                            <option value="">{{'Selecione a Categoria'}}</option>
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
                                        <input type="text" name="codigo_barra" id="input-codigo_barra" class="form-control form-control-alternative{{ $errors->has('codigo_barra') ? ' is-invalid' : '' }}" placeholder="{{ __('Código de Barras') }}" value="{{ old('codigo_barra') }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('codigo_interno') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-codigo_interno">{{ __('Código Interno') }}</label>
                                        <input type="text" name="codigo_interno" id="input-codigo_interno" class="form-control form-control-alternative{{ $errors->has('codigo_interno') ? ' is-invalid' : '' }}" placeholder="{{ __('Código Interno') }}" value="{{ old('codigo_interno') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group{{ $errors->has('fornecedor') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-fornecedor">{{ __('Fornecedor') }}</label>
                                        <select class="form-control{{ $errors->has('fornecedor') ? ' is-invalid' : '' }}" name="fornecedor"    required="true" aria-required="true">
                                            <option value="">{{'Selecione o Forncedor'}}</option>
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
                                        <input type="number"  min="1" name="qtde_embalagem" id="input-qtde_embalagem" class="form-control form-control-alternative{{ $errors->has('qtde_embalagem') ? ' is-invalid' : '' }}" placeholder="{{ __('Quantidade na Embalagem') }}" value="{{ old('qtde_embalagem') }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('observacao') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-observacao">{{ __('Observação') }}</label>
                                        <textarea id="story" name="story"rows="2" cols="33" class="form-control form-control-alternative{{ $errors->has('observacao') ? ' is-invalid' : '' }}" placeholder="{{ __('Observação') }}" value="{{ old('observacao') }}"></textarea>
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