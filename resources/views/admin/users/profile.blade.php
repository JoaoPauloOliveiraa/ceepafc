@extends('adminlte::page')
    
@section('title', 'CEEPAFC')

@section('title_prefix', 'Perfil - ')
@section('css')
<link href="/css/custom.css" rel="stylesheet">
@stop

    
@section('content')
<main class="c-main">
    <div class="container col-sm-8 ">
        <div class="fade-in">
            <div class="card">
                <div class="card-header" onload="showButton"> <h1 class="text-center text-dark font-weight-bold">Administrador</h1>
                    <div class="card-header-actions">
                    </div>
                </div>
                <div class="card-body col-sm-8 align-self-center">
                    <form method="POST" action="{{route('updateAdmin', $admin->id)}}">
                        @method('PUT')
                        @csrf
                       
                        <div class="input mb-3 ">
                            <label>Nome</label>
                            <input type="text" name="name"  class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} " 
                            value="{{$admin->name}}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="input mb-3">
                            <label>Senha</label>
                            <input type="password" name="password"
                                   class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                   placeholder="{{ __('adminlte::adminlte.password') }}">
                            
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                            @endif
                        </div>
                
                        {{-- Confirm password field --}}
                        <div class="input mb-3">
                            <label>Confirme a senha</label>
                            <input type="password" name="password_confirmation"
                                   class="form-control  {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">
                            @if($errors->has('password_confirmation'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </div>
                            @endif
                        </div>        
                    <noscript>
                    <div class="row">
                        <div class="col col-6 col-md-10 align-self-center">
                        <a href="{{route('profileAdmin')}}" class="btn btn-sm  mr-sm-2 btn-secondary" >Voltar</a>
                            <button type="submit" class="btn btn-sm  btn-primary" onclick="validatorEdit()" name="buttonconfirmEdit" id="buttonconfirmEdit"  data-toggle="modal" data-target="#ConfirmEdit">
                                <span class="">Salvar</span>
                            </button>
                        </div>                        
                    </div>
                    </noscript>
                    
                    <div class="row " id="buttonSaveEdit">
                        <div class="col col-6 col-md-10 align-self-center">
                        <a href="{{route('profileAdmin')}}" class="btn btn-sm  mr-sm-2 btn-secondary" >Voltar</a>
                            <button type="button" class="btn btn-sm  btn-primary" onclick="validatorEdit()" name="buttonconfirmEdit" id="buttonconfirmEdit"  data-toggle="modal" data-target="#ConfirmEdit">
                                <span class="">Salvar</span>
                            </button>
                        </div>                        
                    </div>
                        <div class="modal fade" id="ConfirmEdit" tabindex="-1" role="dialog" aria-labelledby="Confirm" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Tem certeza que deseja alterar os dados do Administrador {{$admin->name}}?</h5>
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