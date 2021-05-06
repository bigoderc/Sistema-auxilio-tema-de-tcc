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
                            <h3 class="col-12 mb-0">{{ __('Cadastro do Fornecedor') }} {{$fornecedor->razao_social}}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('fornecedor.update', $fornecedor->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Dados do Fornecedor') }}</h6>
                            
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
                                    <div class="form-group{{ $errors->has('cnpj') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('CNPJ') }}</label>
                                        <input type="text" name="cnpj" id="input-cnpj" class="form-control form-control-alternative{{ $errors->has('cnpj') ? ' is-invalid' : '' }}" placeholder="{{ __('CNPJ') }}" value="{{ old('cnpj', $fornecedor->cnpj) }}" required autofocus>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('razao_social') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nome">{{ __('Razão Social') }}</label>
                                        <input type="text" name="razao_social" id="input-razao_social" class="form-control form-control-alternative{{ $errors->has('razao_social') ? ' is-invalid' : '' }}" placeholder="{{ __('Razão Social') }}" value="{{ old('razao_social',$fornecedor->razao_social) }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('fantasia') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nome">{{ __('Nome Fantasia') }}</label>
                                        <input type="text" name="fantasia" id="input-fantasia" class="form-control form-control-alternative{{ $errors->has('fantasia') ? ' is-invalid' : '' }}" placeholder="{{ __('Fantasia') }}" value="{{ old('fantasia',$fornecedor->fantasia) }}" required>
                                    </div>
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4">{{ __('Endereço do Fornecedor') }}</h6>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group{{ $errors->has('endereco') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-endereco">{{ __('Endereço') }}</label>
                                        <input type="text" name="endereco" id="input-endereco" class="form-control form-control-alternative{{ $errors->has('endereco') ? ' is-invalid' : '' }}" placeholder="{{ __('Endereço') }}" value="{{ old('endereco', $fornecedor->endereco) }}" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group{{ $errors->has('numero') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-numero">{{ __('Número') }}</label>
                                        <input type="text" name="numero" id="input-numero" class="form-control form-control-alternative{{ $errors->has('numero') ? ' is-invalid' : '' }}" placeholder="{{ __('Número') }}" value="{{ old('numero', $fornecedor->numero) }}" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group{{ $errors->has('cep') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cep">{{ __('CEP') }}</label>
                                        <input type="text" name="cep" id="input-cep" class="form-control form-control-alternative{{ $errors->has('cep') ? ' is-invalid' : '' }}" placeholder="{{ __('CEP') }}" value="{{ old('cep', $fornecedor->cep) }}" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('cidade') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cidade">{{ __('Cidade') }}</label>
                                        <input type="text" name="cidade" id="input-cidade" class="form-control form-control-alternative{{ $errors->has('cidade') ? ' is-invalid' : '' }}" placeholder="{{ __('Cidade') }}" value="{{ old('cidade', $fornecedor->cidade) }}" >
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group{{ $errors->has('uf') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-uf">{{ __('UF') }}</label>
                                        <input type="text" name="uf" id="input-uf" class="form-control form-control-alternative{{ $errors->has('uf') ? ' is-invalid' : '' }}" placeholder="{{ __('UF') }}" value="{{ old('uf', $fornecedor->uf) }}" >
                                    </div>
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4">{{ __('Contato do Fornecedor') }}</h6>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group{{ $errors->has('telefone') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-telefone">{{ __('Telefone') }}</label>
                                        <input type="telefone" name="telefone" id="input-telefone" class="form-control form-control-alternative{{ $errors->has('telefone') ? ' is-invalid' : '' }}" placeholder="{{ __('Telefone') }}" value="{{ old('telefone',$fornecedor->telefone) }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('celular') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nome">{{ __('Celular') }}</label>
                                        <input type="celular" name="celular" id="input-celular" class="form-control form-control-alternative{{ $errors->has('celular') ? ' is-invalid' : '' }}" placeholder="{{ __('Celular') }}" value="{{ old('celular', $fornecedor->celular) }}" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $fornecedor->email) }}" >
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