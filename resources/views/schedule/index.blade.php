@extends('layouts.app')
@section('title', 'Listar Horários')

@section('content')

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Horário de Início</th>
      <th scope="col">Horário de Término</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($schedules as $schedule)
    <tr>
      <th scope="row">{{ $schedule->id }}</th>
      <td>{{ $schedule->name }}</td>
      <td>{{ $schedule->begin_at  }}</td>
      <td>{{ $schedule->finish_at }}</td>
      <td><a href="http://localhost:8080/schedules/{{$schedule->id}}" >Ver Mais</a></td>
      <td><a href="http://localhost:8080/schedules/{{$schedule->id}}/edit">Alterar</a></td>
    </tr>
    @empty
    <h5 style="color: red;">Não Possui Registros Cadastrados!</h5>
    @endforelse
  </tbody>
</table>

{!! $schedules->links() !!}

@endsection