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
                                        <a rel="tooltip" class="btn btn-success btn-link"  data-toggle="modal" data-target="#exampleModal{{$professor->id}}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a rel="tooltip" class="btn btn-info btn-link" href="{{ route('professor.edit', $professor->id) }}" data-original-title="" title="">
                                        <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Deseja excluir o professor $professor->nome?") }}') ? this.parentElement.submit() : ''">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$professor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Curriculum {{$professor->nome}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Formação Acadêmica:</label>
                                            <textarea class="form-control"  id="message-text" disabled>{{$professor->formacao_academica}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Resumo:</label>
                                            <textarea class="form-control"  id="message-text" disabled>{{$professor->resumo}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Trabalhos Desenvolvidos:</label>
                                            <textarea class="form-control"  id="message-text" disabled>{{$professor->trabalhos_desenvolvidos}}</textarea>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
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