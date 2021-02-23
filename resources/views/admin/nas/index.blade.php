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
                    <div class="card-header"> <h1 class="m-0 text-dark font-weight-bold">Routerboards cadastradas</h1>
                        <div class="card-header-actions">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered no-footer table-hover">
                            <thead class="thead">
                                <tr role="row">
                                    <th>Nome</th>
                                
                                    <th>IP</th>
                                    
                                    <th>Tipo</th>
                                    
                                    <th>Descrição</th>
                                    
                                    <th>Acões</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($nas as $rb)
                                    <tr>
                                        <td>{{$rb->shortname}}</td>
                                        <td>{{$rb->nasname}}</td>
                                        <td>{{$rb->type}}</td>
                                        <td>{{$rb->description}}</td>
                                         <td>
                                            <a href="{{route('removeNas', ['id' => $rb->id])}}" class="btn btn-sm btn-danger">Excluir</a>
                                            <a href=""></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{route('registerNas')}}" class="btn btn-sm btn-success">Nova Routerboard</a>
                
            </div>
        </div>
    </main>
    @stop
