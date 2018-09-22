@extends('layouts.app')
@section('title', 'Adicionar um evento')

@section('content')
<a class="nav-link active" href="http://localhost:8080/events/create">Cadastrar</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Data de Início</th>
      <th scope="col">Data Término</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($events as $event)
    <tr>
      <th scope="row">{{ $event->id }}</th>
      <td>{{ $event->name }}</td>
      <td>{{ $event->description }}</td>
      <td>{{ date("d/m/Y", strtotime($event->beginning_date)) }}</td>
      <td>{{ date("d/m/Y", strtotime($event->end_date)) }}</td>
      <td><a href="http://localhost:8080/events/{{$event->id}}" >Ver Mais</a></td>
      <td><a href="http://localhost:8080/events/{{$event->id}}/edit">Alterar</a></td>
    </tr>
    @empty
    <h5 style="color: red;">Não Possui Registros Cadastrados!</h5>
    @endforelse
  </tbody>
</table>

{!! $events->links() !!}

@endsection