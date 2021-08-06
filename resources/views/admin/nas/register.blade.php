 @extends('adminlte::page')
    
    @section('title', 'CEEPAFC')
    
    @section('title_prefix', 'Adicionar RB - ')
    @section('css')
    <link href="/css/custom.css" rel="stylesheet">
    @stop
    
        
    @section('content')
    <main class="c-main  ">
        <div class="container col-4">
            <div class="fade-in">
                <div class="card">
                    <div class="card-header"> <h1 class="m-0 text-dark font-weight-bold">Routerboards</h1>
                        <div class="card-header-actions">
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('createNas')}}">
                            @csrf
                            <div class="input mb-3">
                            <label>Endereço IP</label>
                            <input type="text" name="nasname" class="form-control {{ $errors->has('nasname') ? 'is-invalid' : '' }} " 
                            value="{{ old('nasname') }}" placeholder="IP da Routerboard" autofocus>
           
                            @if($errors->has('nasname'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('nasname') }}</strong>
                                </div>
                            @endif
                        </div>
                        
                        <div class="input mb-3">
                            <label>Nome</label>
                            <input type="text" name="shortname" class="form-control {{ $errors->has('shortname') ? 'is-invalid' : '' }} " 
                            value="{{ old('shortname') }}" placeholder="Nome da Routerboard" autofocus>
           
                            @if($errors->has('shortname'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('shortname') }}</strong>
                                </div>
                            @endif
                        </div>
                        
                        <div class="input mb-3">
                            <label>Senha</label>
                            <input type="password" name="secret" class="form-control {{ $errors->has('secret') ? 'is-invalid' : '' }} " 
                            value="{{ old('secret') }}" placeholder="Senha do servidor RADIUS" autofocus>
           
                            @if($errors->has('secret'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('secret') }}</strong>
                                </div>
                            @endif
                        </div>
                        
                        <div class="input mb-3">
                            <label>Descrição</label>
                            <textarea rows="2" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }} " 
                            value="{{ old('description') }}" placeholder="Descrição da Routerboard" autofocus></textarea>
                            
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </div>
                            @endif
                        </div>
                        
                           <button type="submit" class="btn btn-block btn-primary">
                                <span class="">Cadastrar</span>
                           </button>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @stop