@extends('template.template-colaborador')

@section('content')
    <script>

    </script>
    <div class="container">
        <div class="row" style="margin-top: 1em;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-new-colab">Adicionar Colaborador</button>
        </div>
        <div class="row" style="margin-top: 1em;">
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Função</th>
                    <th>Empresa</th>
                    <th colspan="2">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($colaboradores as $colaborador)
                    <tr>
                        <th>#{{$colaborador->id}}</th>
                        <td>{{$colaborador->fristname}}</td>
                        <td>{{$colaborador->lastname}}</td>
                        <td>{{$colaborador->role}}</td>
                        <td>{{$colaborador->empresa}}</td>
                        <td>
                            <button type="button" class="btn btn-primary edit-colab" id="{{$colaborador->id}}">
                                <i class="fas fa-user-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger del-colab" id="{{$colaborador->id}}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal New Colaborador -->
        <div class="modal fade" id="modal-new-colab" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Novo Colaborador</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="post" action="" id="form-new-colab">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fristname">Nome</label>
                                    <input type="text" class="form-control" id="fristname" name="fristname" placeholder="Nome">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="lastname">Sobrenome</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Sobrenome">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="role">Função</label>
                                    <input type="text" class="form-control" id="role" name="role" placeholder="Função">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="empresa">Empresa</label>
                                    <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa">
                                </div>
                            </div>

                            <button class="btn btn-primary float-right">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal EDIT Colaborador -->
        <div class="modal fade" id="modal-edit-colab" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Editar Colaborador</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="post" action="/update" id="form-edit-colab">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" id="idedit">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fristname">Nome</label>
                                    <input type="text" class="form-control" id="fristnameedit" name="fristname" placeholder="Nome">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="lastname">Sobrenome</label>
                                    <input type="text" class="form-control" id="lastnameedit" name="lastname" placeholder="Sobrenome">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="role">Função</label>
                                    <input type="text" class="form-control" id="roleedit" name="role" placeholder="Função">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="empresa">Empresa</label>
                                    <input type="text" class="form-control" id="empresaedit" name="empresa" placeholder="Empresa">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection