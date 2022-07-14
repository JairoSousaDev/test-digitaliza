@extends('layouts.main')

@section('title', 'Cadastro de Comissão')

@section('content')
<div class="container mt-5 border">
    <h5>Cadastrar Comissão</h5>
    <form method="POST" action="{{route('storeCommission')}}" autocomplete="off">
      @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="number">Nome:*</label>
                <input type="text" class="form-control" name="name" id="name"  required>
              </div>
              <div class="col-md-3 mb-3">
                <label for="year">Abertura:*</label>
                <input type="text" class="form-control" name="opening" id="opening" placeholder="00/00/0000"  required>
              </div>
              <div class="col-md-3 mb-3">
                <label for="year">Fechamento:*</label>
                <input type="text" class="form-control" name="closure" id="closure" placeholder="00/00/0000" required>
              </div>
        </div>
        <div class="mb-3">
            <label for="">ESCOLHA OS VEREADORES:</label>
        </div>
            @foreach ($councilors as $councilor)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="councilors[]" value="{{$councilor->id}}">
                <label class="form-check-label">
                    {{$councilor->name}}
                </label>
              </div>
        @endforeach
        <div>
            <button class="btn btn-primary mt-3 mb-3" type="submit">Cadastrar Comissão</button>
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