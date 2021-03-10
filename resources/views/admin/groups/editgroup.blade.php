 @extends('adminlte::page')
    
    @section('title', 'CEEPAFC')
    
    @section('title_prefix', 'Editar Grupo - ')
    @section('css')
    <link href="/css/custom.css" rel="stylesheet">
    @stop
    
        
    @section('content')
    <main class="c-main">
        <div class="container col-12 col-md-8 ">
            <div class="fade-in">
                <div class="card">
                    <div class="card-header" onload="showButton"> <h1 class="m-0 text-dark font-weight-bold">Editar Grupo</h1>
                        <div class="card-header-actions">
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('updateGroup', $group->id)}}">
                            @method('PUT')
                            @csrf
                           
                            <div class="input mb-3">
                            <label>Nome do grupo</label>
                            <input type="text" name="name"  class="form-control col-6 {{ $errors->has('name') ? 'is-invalid' : '' }} " 
                            value="{{$group->GroupName}}" disabled>
                          
                        </div>
                        
                        <div class="input mb-3">
                            <label>Velocidade de Download</label><br>
                            <div class="form-inline">
                                <input type="number" min="0" max="999" name="down" id="downEdit" class="form-control col-4 col-md-6 {{ $errors->has('down') ? 'is-invalid' : '' }} " value="{{$group->velocidade["download"]}}" placeholder="Velocidade de Download" autofocus>
                                <select id="downvelEdit" name="downvel" class="form-control select col-3 col-lg-1 {{ $errors->has('downvel') ? 'is-invalid' : '' }} ">
                                    <option value="K">Kbps</option>
                                    <option value="M" selected>Mbps</option>
                                    <p id="downvelErrorEdit" class="text-danger">O campo deve conter o valor Kbps ou Mbps!</p>
                                </select>
                                 @if($errors->has('down'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('down') }}</strong>
                                    </div>
                                @endif
                                @if($errors->has('downvel'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('downvel') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <p id="downErrorEdit" class="text-danger">Insira uma velocidade de download válida</p>
                           
                        </div>
                        
                        <div class="input mb-3">
                             <label>Velocidade de Upload</label>
                             <div class="form-inline">
                                <input type="number"  min="0" max="999" name="up" id="upEdit" class="form-control col-4 col-md-6 {{ $errors->has('up') ? 'is-invalid' : '' }} " value="{{$group->velocidade["upload"]}}" placeholder="Velocidade de Upload" autofocus>
                                
                                <select id="upvelEdit" name="upvel" class="form-control select col-3 col-lg-1 {{ $errors->has('upvel') ? 'is-invalid' : '' }}">
                                    <option value="K">Kbps</option>
                                    <option value="M" selected>Mbps</option>
                                </select>
                                 @if($errors->has('up'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('up') }}</strong>
                                    </div>
                                @endif
                                @if($errors->has('up'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('upvel') }}</strong>
                                </div>
                                @endif
                                <p id="upvelErrorEdit" class="text-danger">O campo deve conter o valor Kbps ou Mbps!</p>
                               
                            </div>
                            <p id="upErrorEdit" class="text-danger">Insira uma velocidade de upload valida</p>
                           
                        </div>
                        
                        <noscript>
                        <div class="row">
                            <div class="col col-6 col-md-10 align-self-center">
                            <a href="{{route('groups')}}" class="btn btn-sm col-sm-3 mr-sm-2 btn-secondary" >Voltar</a>
                                <button type="submit" class="btn btn-sm col-sm-3 btn-primary" onclick="validatorEdit()" name="buttonconfirmEdit" id="buttonconfirmEdit"  data-toggle="modal" data-target="#ConfirmEdit">
                                    <span class="">Salvar</span>
                                </button>
                            </div>                        
                        </div>
                        </noscript>
                        
                        <div class="row " id="buttonSaveEdit">
                            <div class="col col-6 col-md-10 align-self-center">
                            <a href="{{route('groups')}}" class="btn btn-sm col-sm-3 mr-sm-2 btn-secondary" >Voltar</a>
                                <button type="button" class="btn btn-sm col-sm-3 btn-primary" onclick="validatorEdit()" name="buttonconfirmEdit" id="buttonconfirmEdit"  data-toggle="modal" data-target="#ConfirmEdit">
                                    <span class="">Salvar</span>
                                </button>
                            </div>                        
                        </div>
                            <div class="modal fade" id="ConfirmEdit" tabindex="-1" role="dialog" aria-labelledby="Confirm" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Tem certeza que deseja alterar o grupo {{$group->GroupName}}?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                    <div class="modal-body" id="tableEdit">
                                        
                                    </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar alterações</button>
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
    <script src="/js/editgroup.js"></script>
    @stop
    @stop