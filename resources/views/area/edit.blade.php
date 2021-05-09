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
                            <h3 class="col-12 mb-0">{{ __('Cadastro do area') }} {{$area->nome}}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('area.update',$area->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Dados do area') }}</h6>
                            
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
                                    <div class="form-group{{ $errors->has('qtde_embalagem') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-qtde_embalagem">{{ __('Quantidade na Embalagem') }}</label>
                                        <input type="number"  min="1" name="qtde_embalagem" id="input-qtde_embalagem" class="form-control form-control-alternative{{ $errors->has('qtde_embalagem') ? ' is-invalid' : '' }}" placeholder="{{ __('Nomea') }}" value="{{ old('qtde_embalagem', $area->nome) }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group{{ $errors->has('observacao') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-observacao">{{ __('Descrição') }}</label>
                                        <textarea id="story" name="descricao"rows="2" cols="33" class="form-control form-control-alternative{{ $errors->has('observacao') ? ' is-invalid' : '' }}" placeholder="{{ __('Descrição') }}" value="{{ old('observacao', $area->descricao) }}"></textarea>
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