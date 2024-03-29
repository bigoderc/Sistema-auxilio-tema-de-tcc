@extends('layouts.app', ['title' => __('projetos')])

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
                            <h3 class="col-12 mb-0">{{ __('Cadastro do Projeto') }} {{$projeto->nome}}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('projeto.update', $projeto->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Dados do projeto') }}</h6>
                            
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
                                        <label class="form-control-label" for="input-nome">{{ __('Nome') }}</label>
                                        <input type="text" name="nome" id="input-razao_social" class="form-control form-control-alternative{{ $errors->has('razao_social') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" value="{{ old('razao_social',$projeto->nome) }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('categoria') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-categoria">{{ __('Áreas') }}</label>
                                        <select class="form-control{{ $errors->has('categoria') ? ' is-invalid' : '' }}" name="fk_area_id"    required="true" aria-required="true">
                                        <option value="{{ old('qtde_embalagem', $projeto->fk_area_id) }}">{{$projeto->areas->nome}}</option>
                                            @foreach($areas as $key=>$value)
                                            <option value="{{$key}}">
                                                {{ $value}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('categoria') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-categoria">{{ __('Professores') }}</label>
                                        <select class="form-control{{ $errors->has('categoria') ? ' is-invalid' : '' }}" name="fk_areas_id"    required="true" aria-required="true">
                                        <option value="{{ old('qtde_embalagem', $projeto->fk_professor_id) }}">{{$projeto->professor->nome}}</option>
                                            @foreach($areas as $key=>$value)
                                            <option value="{{$key}}">
                                                {{ $value}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group{{ $errors->has('razao_social') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nome">{{ __('Nome') }}</label>
                                        <input type="date" name="data" id="input-razao_social" class="form-control form-control-alternative{{ $errors->has('razao_social') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" value="{{ old('razao_social',$projeto->data) }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('observacao') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-observacao">{{ __('Projeto Em PDF') }}</label>
                                        <input type="file" class="form-control form-control-alternative{{ $errors->has('observacao') ? ' is-invalid' : '' }}" placeholder="{{ __('Projeto') }}" name="file" accept=".pdf" value="{{ old('Descrição',$projeto->arquivo) }}"></textarea>
                                    </div>
                                    <iframe src="{{ asset('storage') }}/uploads/{{$projeto->arquivo}}" width="100%" height="300" style="border:1px solid black;">
                                    </iframe>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group{{ $errors->has('observacao') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-observacao">{{ __('Descrição') }}</label>
                                        <textarea id="story" name="descricao"rows="10" cols="20" class="form-control form-control-alternative{{ $errors->has('observacao') ? ' is-invalid' : '' }}" placeholder="{{ __('Descrição') }}" value="{{ old('Descrição',$projeto->data) }}">{{$projeto->descricao}}</textarea>
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