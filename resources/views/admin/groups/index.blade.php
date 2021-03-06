    @extends('adminlte::page')
    
    @section('title', 'CEEPAFC')
    
    @section('title_prefix', 'Routerboards - ')
    @section('css')
    <link href="/css/custom.css" rel="stylesheet">
    @stop
    
        
    @section('content')
    <main class="c-main">
        
        <div class="container-fluid">
            @if (session('deleted'))
                <div class="alert alert-danger" role="alert">
                    {{ session('deleted') }}
                </div>
            @endif
            
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="fade-in">
                <div class="card">
                    <div class="card-header"> <h1 class="m-0 text-dark font-weight-bold">Grupos de Usuários</h1>
                        <div class="card-header-actions">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered no-footer table-hover">
                            <thead class="thead">
                                <tr role="row">
                                    <th>Nome</th>
                                    <th>Velocidade de Download</th>
                                    <th>Velocidade de Upload</th>
                                    <th>Ação</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody>
                                
                                @foreach($groups as $key => $group)
                                <tr>
                                    <td>{{$group->GroupName}}</td>
                                    <td>{{$group->value["download"]}}</td>
                                    <td>{{$group->value["upload"]}}</td>
                                    <td class="text-center">
                                        <a href="{{route(('editGroup'), ['id' => $group->id])}}" class="btn btn-sm col-md-10 btn-primary">Editar</a>
                                        <a href=""></a>
                                    </td>
                                </tr>
                                @endforeach
                                        
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{route('registerGroup')}}" class="btn btn-sm btn-success">Novo Grupo</a>
                
            </div>
        </div>
    </main>
    @stop
