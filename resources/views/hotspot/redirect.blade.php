@extends('adminlte::auth.auth-page')

@section('body')

        {{-- Logo --}}
        <div class="{{ $auth_type ?? 'login' }}-logo">
            <a href="">
                <img src="{{ asset('img/logo.png') }}" height="178">
            </a>
        </div>
    
        
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        <p>Clique no link abaixo para ser redirecionado para àrea de login.</p>
            <a href="{{ route('hotspotLogin') }}">Login</a>
        @else
            @php
                redirect(route('hotspotLogin'))->send();
            @endphp            
        @endif            
@stop