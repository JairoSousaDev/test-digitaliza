@extends('layouts.main')

@section('title', 'Cadastrar Vereador')

@section('content')
<div class="container mt-5 border">
    <h5>Cadastrar Vereador</h5>
    <form method="POST" action="{{route('storeCouncilor')}}" autocomplete="off">
      @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="number">Nome:*</label>
                <input type="text" class="form-control" name="name" id="name"  required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="year">CPF:*</label>
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="00000000000"  required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="year">E-Mail:*</label>
                <input type="email" class="form-control" name="email" id="email" required>
              </div>
        </div>
        <div>
            <button class="btn btn-primary mt-3 mb-3" type="submit">Cadastrar Vereador</button>
        </div>
        
      </form>
      @if ($errors->any())
            <div class="alert alert-danger mx-auto mt-3">
                @foreach ($errors->all() as $error)
                    <label>{{$error}}</label> 
                @endforeach
            </div>
        @endif
</div>
@endsection