@extends('layouts.app', ['title' => __('Alunos')])

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
                            <h3 class="col-12 mb-0">{{ __('Cadastro do aluno') }} {{$aluno->matricula}}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('aluno.update', $aluno->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Dados do aluno') }}</h6>
                            
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
                                    <div class="form-group{{ $errors->has('razao_social') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nome">{{ __('Razão Social') }}</label>
                                        <input type="text" name="nome" id="input-razao_social" class="form-control form-control-alternative{{ $errors->has('razao_social') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" value="{{ old('razao_social',$aluno->nome) }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('fantasia') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nome">{{ __('Matricula') }}</label>
                                        <input type="text" name="matricula" id="input-fantasia" class="form-control form-control-alternative{{ $errors->has('fantasia') ? ' is-invalid' : '' }}" placeholder="{{ __('Matricula') }}" value="{{ old('fantasia',$aluno->matricula) }}" required>
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