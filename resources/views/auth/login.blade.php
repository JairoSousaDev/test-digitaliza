@extends('layouts.main')

@section('title', 'Login')

@section('content')

<div class="container mt-5">
    <div class="alert alert-secondary mx-auto mb-3" style="max-width: 30rem;">
        <div align="center">
            CÂMARA MUNICIPAL
        </div>
      </div>
    <div class="card mx-auto" style="max-width: 30rem;">
        <div class="card-header">
            LOGIN
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('postLogin')}}" autocomplete="off">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-sm" name="user" id="user" placeholder="Usuário">
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Senha">
                </div>
                <div align="center">
                    <button type="submit" class="btn btn-success">
                        Entrar
                    </button>
                </div>
            </form>
        </div>
      </div>
      @if ($errors->any())
            <div class="alert alert-danger mx-auto mt-3">
                @foreach ($errors->all() as $error)
                    <label>{{$error}}</label> 
                @endforeach
            </div>
        @endif
</div>

@endsection