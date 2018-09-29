@extends('layouts.app')
@section('title', 'Painel de Controle - Restrito')

@section('content')

<h4>Atividades da {{$event[0]->name}}</h4>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Data </th>
      <th scope="col">Periodo</th>
      <th scope="col">Capacidade Máxima</th>
      <th scope="col">Total de Inscrições</th>
      <th scope="col">Vagas Disponiveis</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @forelse($activities as $activity)
    <tr>
      <th scope="row">{{ $activity->id }}</th>
      <td style="text-align: center;">{{ $activity->name }}</td>
      <td style="text-align: center;">{{ date("d/m/Y", strtotime($activity->beginning_date)) }}</td>
      <td style="text-align: center;">{{ $activity->schedule->name }}</td>
      <td style="text-align: center;">{{ $activity->maximum_capacity }}</td>
      <td style="text-align: center;">100</td>
      <td style="text-align: center;">0</td>
      <td style="text-align: center;"><a href="http://localhost:8080/subscriptions/{{$activity->id}}" >Lista de Inscritos</a></td>
      <td style="text-align: center;"><a href="">Avaliações Atividade</a></td>
    @empty
    @endforelse
  </tbody>
</table>

@endsection