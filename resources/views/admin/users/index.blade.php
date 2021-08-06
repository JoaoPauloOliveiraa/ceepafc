    @extends('adminlte::page')
    
    @section('title', 'CEEPAFC')
    
    @section('title_prefix', ' Usuários - ')
    @section('css')
    <link href="/css/custom.css" rel="stylesheet">
    @stop
    
        
    @section('content')
    <main class="c-main">
         <div class="container-fluid">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if (session('fails'))
            <div class="alert alert-danger" role="alert">
                {{ session('fails') }}
            </div>
            @endif
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
            @if ($users->count()!=0)
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
                                    
                                    <th>Grupo</th>
                                
                                    <th>Ações</th>

                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($users as $user)       
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        @if ($user->block === 1)
                                        <td>Bloqueado</td>    
                                        @else
                                        <td></td>
                                        @endif
                                        @php
                                        @endphp
                                        <td>{{$user->group->groupname}}</td>
                                        <td class="text-center">
                                                <a href="{{route('historic', ['id' => $user->id] )}}" class="btn btn-sm btn-info">Histórico</a>
                                                @if ($user->block === 1)
                                                <a href="{{route('block', ['id' => $user->id])}}" class="btn btn-sm btn-danger">Desbloquear</a>
                                                @else
                                                <a href="{{route('block', ['id' => $user->id])}}" class="btn btn-sm btn-danger">Bloquear</a>
                                                @endif
                                                <a href="{{route('show', ['id' => $user->id])}}" class="btn btn-sm btn-secondary">Detalhes</a>
                                                <a href="{{route('approve', ['id' => $user->id])}}" class="btn btn-sm btn-success">Alterar Grupo</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>            
            </div>
            @else
            <div class="card">
                <div class="card-header"> <h1 class="m-0 text-dark font-weight-bold">Não existem usuários cadastrados</h1>
                    <div class="card-header-actions">
                    </div>
                </div>
                
            </div>            
            @endif
            
        </div>
    </main>
    @stop
