@extends('layouts.app')
@section('title', 'Adicionar uma Atividade')

@section('content')

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Data da Atividade</th>
      <th scope="col">Quórum</th>
      <th scope="col">Capacidade</th>
      <th scope="col">Horário</th>
      <th scope="col">Evento</th>
      <th scope="col">Local</th>
      <th scope="col">Sala</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($activities as $activity)
    <tr>
      <th scope="row">{{ $activity->id }}</th>
      <td>{{ $activity->name }}</td>
      <td>{{ $activity->beginning_date }}</td>
      <td>{{ $activity->minimum_quorum }}</td>
      <td>{{ $activity->maximum_capacity }}</td>
      <td>{{ $activity->schedule->begin_at }} - {{ $activity->schedule->finish_at }}</td>
      <td>{{ $activity->event->name }}</td>
      <td>{{ $activity->location->name }}</td>
      <td>{{ isset($activity->room) ? $activity->room->name : 'Não Possui' }}</td>    
      <td><a href="http://localhost:8080/feed/{{$activity->id}}" >Ver Mais</a></td>
      <!-- Botão Inscrever-se-->
      {{ Form::open(['action' => 'SubscriptionController@store']) }}
        {{ Form::hidden('user_id', '3') }}
        {{ Form::hidden('activity_id', $activity->id) }}
        <td>{{ Form::submit('Inscreva-se', ['class' => 'btn btn-outline-success']) }}</td>
      {{ Form::close() }}
      <!-- Botão Cancelar Inscrição -->
      @forelse ($subscriptions as $subscription)
        @if($subscription->activity_id == $activity->id)
          {{ Form::open(['route'=>['subscriptions.destroy',$subscription->id], 'method' => 'DELETE', 'onsubmit' => 'deleteConfirmation();']) }}
            <td>{{ Form::submit('Cancelar', ['class' => 'btn btn-outline-danger']) }}</td>
          {{ Form::close() }}
        @endif
      @empty
      <td>-</td>
      @endforelse
    </tr>
    @empty
    <h5 style="color: red;">Não Possui Registros Cadastrados!</h5>
    @endforelse
  </tbody>
</table>

{!! $activities->links() !!}

@endsection

