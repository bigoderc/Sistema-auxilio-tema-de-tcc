@extends('layouts.app', ['title' => __('professores')])

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
                            <h3 class="mb-0">Professores</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('professor.create') }}" class="btn btn-sm btn-primary">Adicionar Professor</a>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Matrícula</th>
                                <th scope="col">Área</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($professores as $professor)
                            <tr>
                                <td>{{$professor->id}}</td>
                                <td>{{$professor->nome}}</td>
                                <td>
                                    {{$professor->matricula}}
                                </td>
                                <td>
                                    {{$professor->areas->nome}}
                                </td>
                                <td class="td-actions text-right">   
                                    <form action="{{ route('professor.destroy', $professor->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    
                                        <a rel="tooltip" class="btn btn-info btn-link" href="{{ route('professor.edit', $professor->id) }}" data-original-title="" title="">
                                        <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Deseja excluir o professor $professor->nome?") }}') ? this.parentElement.submit() : ''">
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