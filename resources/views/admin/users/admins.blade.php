@extends('adminlte::page')
    
@section('title', 'CEEPAFC')

@section('title_prefix', ' Administradores - ')
@section('css')
<link href="/css/custom.css" rel="stylesheet">
@stop

    
@section('content')
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header"> <h1 class="m-0 text-dark font-weight-bold">Administradores</h1>
                    <div class="card-header-actions">
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-bordered no-footer table-hover">
                        <thead class="thead">
                            <tr role="row">
                                <th class="sorting_asc"  rowspan="1" colspan="1" aria-sort="ascending" style="width: 370px;">Nome</th>
                            
                                <th class="sorting"  rowspan="1" colspan="1"  style="width: 320px;">Email</th>
                            
                                <th class="sorting"  rowspan="1" colspan="1"  style="width: 322px;">Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>
                                        <a href="{{route('remove', ['id' => $admin->id])}}" class="btn btn-sm btn-danger">Remover</a>
                                        <a href=""></a>    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('registerAdmin')}}" class="btn btn-sm btn-success">Novo Administrador</a>
                </div>
            </div>
        </div>
    </div>
</main>
@stop
