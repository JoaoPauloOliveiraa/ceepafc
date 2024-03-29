@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')
    <form action="{{ $register_url }}" method="post">
        {{ csrf_field() }}

        {{-- Name field --}}
        <div class="input mb-3">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>
           
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>

        {{-- Email field --}}
        <div class="input mb-3">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
           
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>
        
         <div class="input mb-3">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf"
                   class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('adminlte::adminlte.cpf') }}">
            @if($errors->has('cpf'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('cpf') }}</strong>
                </div>
            @endif
        </div>

         <div class="input mb-3">
             <label for="birthdate">Data de nascimento</label>
            <input type="date" name="birthdate"
                   class="form-control {{ $errors->has('birthdate') ? 'is-invalid' : '' }}"
                   placeholder="Data de nascimento">
            @if($errors->has('birthdate'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('birthdate') }}</strong>
                </div>
            @endif
        </div>


        {{-- Password field --}}
        <div class="input mb-3">
            <label for="password">Senha</label>
            <input type="password" name="password"
                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('adminlte::adminlte.password') }}">
            
            @if($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>

        {{-- Confirm password field --}}
        <label for="password_confirmation">Confirme sua senha</label>
        <div class="input mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('adminlte::adminlte.retype_password')}}">
            @if($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
            @endif
        </div>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>

    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ route('hotspotLogin') }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop
