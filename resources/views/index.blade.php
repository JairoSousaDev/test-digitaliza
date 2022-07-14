@extends('layouts.main')

@section('title', 'Câmara Municipal')

@section('content')

@if (Auth::check())
    <div align="center">
      USUÁRIO: {{ Auth::user()->name }}
    </div>
  @endif

<div class="container mt-5">
  
  <h5 class="mb-3">Projetos</h5>
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