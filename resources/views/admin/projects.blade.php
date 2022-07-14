@extends('layouts.main')

@section('title', 'Meus Projetos')
    
@section('content')
<div class="container mt-5">
  <h5>Meus Projetos</h5>
  <div class="mt-3 mb-3">
    <a type="button" class="btn btn-primary" href="{{route('newProject')}}">Cadastrar Projeto</a>
  </div>
  @foreach ($projects as $project)
    <div class="card mb-3">
        <h5 class="card-header">NÚMERO: {{$project->number}} --- ANO: {{$project->year}} --- TIPO: {{$project->type}} ---
        AUTORIA: {{$project->author}} ---  DATA: "{{\Carbon\Carbon::parse($project->date)->format('d/m/Y')}}"
        </h5>
        <div class="card-body">
          <p>{{$project->summary}}</p>
            <a target="_blank" href="{{ url("storage/projects/".$project->number.".pdf")}}">Visualizar Projeto</a>
        </div>
    </div>    
  @endforeach
  @if (isset($filters))
    {{$projects->appends($filters)->links()}}             
  @else
    {{$projects->links()}} 
  @endif
</div>
@endsection