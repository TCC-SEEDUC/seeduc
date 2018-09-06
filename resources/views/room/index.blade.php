@extends('layouts.app')
@section('title', 'Adicionar uma sala')

@section('content')

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Capacidade</th>
      <th scope="col">Possui Projetor?</th>
      <th scope="col">Possui Ar Condicionado?</th>
      <th scope="col">Quantos Assentos?</th>
      <th scope="col">Tipo de Assento?</th>
      <th scope="col">Localização</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($rooms as $room)
    <tr>
      <th scope="row">{{ $room->id }}</th>
      <td>{{ $room->name }}</td>
      <td>{{ $room->capacity }}</td>
      <td>{{ $room->available_video_projector == 1 ? 'Sim' : 'Não' }}</td>
      <td>{{ $room->available_AC == 1 ? 'Sim' : 'Não'  }}</td>
      <td>{{ $room->available_seats }}</td>
      <td>{{ $room->seats_type }}</td>
      <td>{{ $room->location_id }}</td>
      <td><a href="http://localhost:8080/rooms/{{$room->id}}" >Ver Mais</a></td>
      <td><a href="http://localhost:8080/rooms/{{$room->id}}/edit">Alterar</a></td>
    </tr>
    @empty
    <h5 style="color: red;">Não Possui Registros Cadastrados!</h5>
    @endforelse
  </tbody>
</table>

{!! $rooms->links() !!}

@endsection