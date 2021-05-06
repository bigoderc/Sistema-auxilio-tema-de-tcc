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
                            <h3 class="col-12 mb-0">{{ __('Cadastro de Usuário') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.store') }}" autocomplete="off">
                            @csrf
                            @method('post')

                            <h6 class="heading-small text-muted mb-4">{{ __('Dados do Usuário') }}</h6>
                            
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
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-produto">{{ __('Nome') }}</label>
                                        <input type="text" name="name" id="input-produto" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" value="{{ old('name') }}" required autofocus>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-password">{{ __('Senha') }}</label>
                                        <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Nova Senha') }}" value="" required>
                                        
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-password-confirmation">{{ __('Confirmar Senha') }}</label>
                                        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirmar Senha') }}" value="" required>
                                    </div>
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4">{{ __('Endereço do Usuário') }}</h6>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group{{ $errors->has('endereco') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-endereco">{{ __('Endereço') }}</label>
                                        <input type="text" name="endereco" id="input-endereco" class="form-control form-control-alternative{{ $errors->has('endereco') ? ' is-invalid' : '' }}" placeholder="{{ __('Endereço') }}" value="{{ old('endereco') }}" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group{{ $errors->has('numero') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-numero">{{ __('Número') }}</label>
                                        <input type="text" name="numero" id="input-numero" class="form-control form-control-alternative{{ $errors->has('numero') ? ' is-invalid' : '' }}" placeholder="{{ __('Número') }}" value="{{ old('numero') }}" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group{{ $errors->has('cep') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cep">{{ __('CEP') }}</label>
                                        <input type="text" name="cep" id="input-cep" class="form-control form-control-alternative{{ $errors->has('cep') ? ' is-invalid' : '' }}" placeholder="{{ __('CEP') }}" value="{{ old('cep') }}" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('cidade') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cidade">{{ __('Cidade') }}</label>
                                        <input type="text" name="cidade" id="input-cidade" class="form-control form-control-alternative{{ $errors->has('cidade') ? ' is-invalid' : '' }}" placeholder="{{ __('Cidade') }}" value="{{ old('cidade') }}" >
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group{{ $errors->has('uf') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-uf">{{ __('UF') }}</label>
                                        <input type="text" name="uf" id="input-uf" class="form-control form-control-alternative{{ $errors->has('uf') ? ' is-invalid' : '' }}" placeholder="{{ __('UF') }}" value="{{ old('uf') }}" >
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