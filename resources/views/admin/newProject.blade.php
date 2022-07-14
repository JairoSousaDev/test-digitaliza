@extends('layouts.main')

@section('title', 'Novo Projeto')
    
@section('content')

<div class="container mt-5 border">
    <h5>Cadastrar Projeto</h5>
    <form method="POST" action="{{route('storeProject')}}" autocomplete="off" enctype="multipart/form-data">
      @csrf
        <div class="row">
            <div class="col-md-2 mb-3">
                <label for="number">Número:*</label>
                <input type="text" class="form-control" name="number" id="number"  placeholder="00" required>
              </div>
              <div class="col-md-2 mb-3">
                <label for="year">Ano:*</label>
                <input type="text" class="form-control" name="year" id="year" placeholder="0000" required>
              </div>
              <div class="col-md-2 mb-3">
                <label for="year">Data:*</label>
                <input type="text" class="form-control" name="date" id="date" placeholder="00/00/0000" required>
              </div>
              <div class="col-md-3 mb-3">
                <label for="year">Autoria :*</label>
                <select class="form-select" id="author" name="author">
                    <option selected value="Poder Executivo">Poder Executivo</option>
                    <option value="Poder Legislativo">Poder Legislativo</option>
                    <option value="Iniciativa Popular">Iniciativa Popular</option>
                    <option value="Câmara">Câmara</option>
                  </select>
              </div>
              <div class="col-md-3 mb-3">
                <label for="year">Tipo:*</label>
                <select class="form-select" id="type" name="type">
                    <option selected value="Decisão">Decisão</option>
                    <option value="Decreto">Decreto</option>
                    <option value="Lei">Lei</option>
                    <option value="Proposição de Lei">Proposição de Lei</option>
                    <option value="Emenda">Emenda</option>
                    <option value="Veto">Veto</option>
                  </select>
              </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="year">Ementa:*</label>
                <textarea class="form-control" id="summary" name="summary" rows="2"></textarea>
              </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="year">Comissão:*</label>
                <select class="form-select" id="commission" name="commission">
                    <option selected>...</option>
                    @foreach ($commisions as $commision)
                        <option value = {{$commision->id}}> {{$commision->name}} </option>
                    @endforeach
                  </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="year">Arquivo:*</label>
                <input class="form-control" type="file" id="file" name="file">
              </div>
        </div>
        <button class="btn btn-primary mb-3" type="submit">Enviar Projeto</button>
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