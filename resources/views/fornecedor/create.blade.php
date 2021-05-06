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
                            <h3 class="col-12 mb-0">{{ __('Cadastro Fornecedor') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('fornecedor.store') }}" autocomplete="off">
                            @csrf
                            @method('post')

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
                                    <label class="form-control-label" for="input-cnpj">{{ __('CNPJ') }}</label><br>
                                    <input type="text" name="cnpj" id="cnpj" class="form-control form-control-alternative{{ $errors->has('cnpj') ? ' is-invalid' : '' }}" onblur="cnpjCheck(this)" maxlength="18" onkeydown="javascript: fMasc( this, mCNPJ );"placeholder="{{ __('CNPJ') }}" value="{{ old('CNPJ') }}" required autofocus>
                                    <span id="cnpjResponse"></span>
                                </div>
                            </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('razao_social') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nome">{{ __('Razão Social') }}</label>
                                        <input type="text" name="razao_social" id="input-razao_social" class="form-control form-control-alternative{{ $errors->has('razao_social') ? ' is-invalid' : '' }}" placeholder="{{ __('Razão Social') }}" value="{{ old('razao_social') }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('fantasia') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nome">{{ __('Nome Fantasia') }}</label>
                                        <input type="text" name="fantasia" id="input-fantasia" class="form-control form-control-alternative{{ $errors->has('fantasia') ? ' is-invalid' : '' }}" placeholder="{{ __('Fantasia') }}" value="{{ old('fantasia') }}" required>
                                    </div>
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4">{{ __('Endereço do Fornecedor') }}</h6>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group{{ $errors->has('cep') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cep">{{ __('CEP') }}</label>
                                        <input type="text" name="cep" id="cep" maxlength="8" onblur="pesquisacep(this.value);" class="form-control mascCEP  form-control-alternative{{ $errors->has('cep') ? ' is-invalid' : '' }}" placeholder="{{ __('CEP') }}" value="{{ old('cep') }}" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('endereco') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-endereco">{{ __('Endereço') }}</label>
                                        <input type="text" name="endereco" id="endereco" class="form-control form-control-alternative{{ $errors->has('endereco') ? ' is-invalid' : '' }}" placeholder="{{ __('Endereço') }}" value="{{ old('endereco') }}" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('endereco') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-endereco">{{ __('Bairro') }}</label>
                                        <input type="text" name="bairro" id="Bairro" class="form-control form-control-alternative{{ $errors->has('endereco') ? ' is-invalid' : '' }}" placeholder="{{ __('Bairro') }}" value="{{ old('bairro') }}" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group{{ $errors->has('numero') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-numero">{{ __('Número') }}</label>
                                        <input type="text" name="numero" id="numero" class="form-control form-control-alternative{{ $errors->has('numero') ? ' is-invalid' : '' }}" placeholder="{{ __('Número') }}" value="{{ old('numero') }}" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('cidade') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cidade">{{ __('Cidade') }}</label>
                                        <input type="text" name="cidade" id="cidade" class="form-control form-control-alternative{{ $errors->has('cidade') ? ' is-invalid' : '' }}" placeholder="{{ __('Cidade') }}" value="{{ old('cidade') }}" >
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group{{ $errors->has('uf') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-uf">{{ __('UF') }}</label>
                                        <input type="text" name="uf" id="uf" class="form-control form-control-alternative{{ $errors->has('uf') ? ' is-invalid' : '' }}" placeholder="{{ __('UF') }}" value="{{ old('uf') }}" >
                                    </div>
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4">{{ __('Contato do Fornecedor') }}</h6>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group{{ $errors->has('telefone') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-telefone">{{ __('Telefone') }}</label>
                                        <input type="telefone" name="telefone" id="input-telefone" class="form-control form-control-alternative{{ $errors->has('telefone') ? ' is-invalid' : '' }}" placeholder="{{ __('Telefone') }}" value="{{ old('telefone') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('celular') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nome">{{ __('Celular') }}</label>
                                        <input type="celular" name="celular" id="input-celular" class="form-control form-control-alternative{{ $errors->has('celular') ? ' is-invalid' : '' }}" placeholder="{{ __('Celular') }}" value="{{ old('celular') }}" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" >
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