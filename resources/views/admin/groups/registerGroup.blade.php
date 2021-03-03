 @extends('adminlte::page')
    
    @section('title', 'CEEPAFC')
    
    @section('title_prefix', 'Adicionar RB - ')
    @section('css')
    <link href="/css/custom.css" rel="stylesheet">
    @stop
    
        
    @section('content')
    <main class="c-main">
        <div class="container col-4">
            <div class="fade-in">
                <div class="card">
                    <div class="card-header"> <h1 class="m-0 text-dark font-weight-bold">Criar Grupo</h1>
                        <div class="card-header-actions">
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('createGroup')}}">
                            @csrf
                            <div class="input mb-3">
                            <label>Nome do grupo</label>
                            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} " 
                            value="{{ old('name') }}" placeholder="Dê um nome para o grupo" autofocus>
                            <p id="nameError" class="text-danger">Nome do grupo não pode ser vazio</p>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>
                        
                        <div class="input mb-3">
                            <label>Velocidade de Download</label><br>
                            <div class="form-inline">
                                <input type="number" min="0" max="999" name="down" id="down" class="form-control col-6 {{ $errors->has('down') ? 'is-invalid' : '' }} " value="{{ old('down') }}" placeholder="Velocidade de Download" autofocus>
                                <select id="downvel" name="downvel" class="form-control">
                                    <option value="K">Kbps</option>
                                    <option value="M">Mbps</option>
                                    <p id="downvelError" class="text-danger">O campo deve conter o valor Kbps ou Mbps!</p>
                                </select>
                            </div>
                            <p id="downError" class="text-danger">Insira uma velocidade de download válida</p>
                            @if($errors->has('down'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('down') }}</strong>
                                </div>
                            @endif
                        </div>
                        
                        <div class="input mb-3">
                             <label>Velocidade de Upload</label>
                             <div class="form-inline">
                                <input type="number" min="0" max="999" name="up" id="up" class="form-control col-6 {{ $errors->has('up') ? 'is-invalid' : '' }} " value="{{ old('up') }}" placeholder="Velocidade de Upload" autofocus>
                                
                                <select id="upvel" name="upvel" class="form-control">
                                    <option value="K">Kbps</option>
                                    <option value="M">Mbps</option>
                                </select>
                                <p id="upvelError" class="text-danger">O campo deve conter o valor Kbps ou Mbps!</p>
                            </div>
                            <p id="upError" class="text-danger">Insira uma velocidade de upload valida</p>
                            @if($errors->has('up'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('up') }}</strong>
                                </div>
                            @endif
                        </div>
                        
                        <noscript>
                            <button type="submit" class="btn btn-block btn-primary">
                                <span class="">Cadastrar</span>
                            </button>
                        </noscript>
                        
                            
                            <button type="button" class="btn btn-block btn-primary" onclick="validator()" name="buttonconfirm" id="buttonconfirm" data-toggle="modal" data-target="#Confirm">
                                <span class="">Cadastrar</span>
                            </button>
                        
                            <div class="modal fade" id="Confirm" tabindex="-1" role="dialog" aria-labelledby="Confirm" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Tem certeza que deseja criar o grupo com essas configurações?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                    <div class="modal-body" id="table">
                                        
                                    </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @section('js')
    <script src="/js/functions.js"></script>
    @stop
    @stop
    
    
    
    