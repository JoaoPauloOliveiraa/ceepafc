    @extends('adminlte::page')
    
    @section('title', 'CEEPAFC')
    
    @section('title_prefix', ' Usuários - ')
    @section('css')
    <link href="/css/custom.css" rel="stylesheet">
    @stop
    
        
    @section('content')
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="card">
                    <div class="card-header"> <h1 class="m-0 text-dark font-weight-bold">Usuários do HotSpot</h1>
                        <div class="card-header-actions">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered no-footer table-hover">
                            <thead class="thead">
                                <tr role="row">
                                    <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" style="width: 370px;">Nome</th>
                                
                                    <th class="sorting"  rowspan="1" colspan="1"  style="width: 320px;">Email</th>
                                
                                    <th class="sorting"  rowspan="1" colspan="1"  style="width: 152px;">Status</th>
                                    
                                    <th class="sorting"  rowspan="1" colspan="1"  style="width: 152px;">Conexão</th>
                                
                                    <th class="sorting"  rowspan="1" colspan="1"  style="width: 322px;">Actions</th>
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
