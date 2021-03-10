@extends('adminlte::page')

    @section('title', 'CEEPAFC')
    
    @section('title_prefix', 'Detalhes - ')
    
    @section('css')
    <link href="/css/custom.css" rel="stylesheet">
    @stop
    
     @section('content')
    <main class="c-main">
        <div class="container-fluid col-6">
            <div class="fade-in">
                <div class="card">
                    <div class="card-header"> <h1 class="m-0 text-dark font-weight-bold">Detalhes</h1>
                        <div class="card-header-actions">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-responsive table-hover">
                             <tbody>
                                <tr>
                                    <th style="">Nome:</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th style="">Email:</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th style="">CPF:</th>
                                    <td>{{$user->cpf}}</td>
                                </tr>
                                <tr>
                                    <th style="">Idade:</th>
                                    <td>{{$user->age}} Anos</td>
                                </tr>
                                <tr>
                                    <th style="">Data de Registro:</th>
                                    <td>{{$user->created_at->formatLocalized('%d/%m/%Y %H:%M')}}</td>
                                </tr>                   
                                <tr>
                                    <th style="">Grupo</th>
                                    <td>
                                        <select class="form-control">
                                            <option value="V">Visitantes</option>
                                        </select>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer rounded-bottom text-center">
                        
                          <a href="{{route('users')}}" class="btn p-10  bg-primary">Voltar</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
    @stop
