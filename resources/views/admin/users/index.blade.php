    @extends('adminlte::page')
    
    @section('title', 'CEEPAFC')
    
    @section('title_prefix', ' Usuários - ')
    @section('css')
    <link href="/css/custom.css" rel="stylesheet">
    @stop
    
        
    @section('content')
    <main class="c-main">
         <div class="container-fluid">
            @if (session('blocked'))
                <div class="alert alert-danger" role="alert">
                    {{ session('blocked') }}
                </div>
            @endif
            
            @if (session('notblock'))
                <div class="alert alert-danger" role="alert">
                    {{ session('notblock') }}
                </div>
            @endif
            
            @if (session('unblocked'))
                <div class="alert alert-success" role="alert">
                    {{ session('unblocked') }}
                </div>
            @endif
            
            <div class="fade-in">
                <div class="card">
                    <div class="card-header"> <h1 class="m-0 text-dark font-weight-bold">Usuários do HotSpot</h1>
                        <div class="card-header-actions">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-bordered no-footer table-hover">
                            <thead class="thead">
                                <tr role="row">
                                    <th>Nome</th>
                                
                                    <th>Email</th>
                                
                                    <th>Status</th>
                                    
                                    <th>Conexão</th>
                                
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->confirmed}}</td>
                                        <td>{{$user->conection}}</td>
                                        <td>
                                            <a href="{{route('historic', ['id' => $user->id] )}}" class="btn btn-sm btn-info">Histórico</a>
                                            <a href="{{route('block', ['id' => $user->id])}}" class="btn btn-sm btn-danger">Bloquear</a>
                                            <a href="{{route('show', ['id' => $user->id])}}" class="btn btn-sm btn-primary">Detalhes</a>
                                            <a href=""></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @stop
