@extends('layouts.app')
@section('title', 'Adicionar um evento')

@section('content')
<a href="http://localhost:8080/dashboards">Gestão de Eventos</a>
<br>
<!--Eventos que estão disponíveis para selecionar atividades-->
<h4>Eventos Disponíveis</h4>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Data de Início</th>
      <th scope="col">Data Término</th>
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
      <td><a href="http://localhost:8080/feeds/{{$event->id}}" >Inscrições Abertas</a></td>
    </tr>
    @empty
    <h5 style="color: red;">Não Possui Registros Cadastrados!</h5>
    @endforelse
  </tbody>
</table>

{!! $events->links() !!}

<hr>
<!--Atividade em que o usuário estará inscrito-->

<h4>Minhas Atividades</h4>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Data </th>
      <th scope="col">Horário</th>
      <th scope="col">Check-in</th>
      <th scope="col">Nos dê sua opinião</th>
      <th scope="col">Certificado</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @forelse($userActivities as $userActivitie)
      @forelse($userActivitie->activities  as $userActivitie->activitie)
    <tr>
      <th scope="row">{{ $userActivitie->activitie->id }}</th>
      <td>{{ $userActivitie->activitie->name }}</td>
      <td>{{ $userActivitie->activitie->name }}</td>
      <td>{{ date("d/m/Y", strtotime($userActivitie->activitie->beginning_date)) }}</td>
      <td>{{ $userActivitie->activitie->schedule_id }}</td>
      <!--Cancelar Atividade em que está inscrito-->
      @foreach($userActivitie->subscriptions as $userActivitie->subscription)
      @if( $userActivitie->subscription->activity_id == $userActivitie->activitie->id )
        <td align="center">{{ $userActivitie->subscription->check_in == 1 ? "Sim" : "Não" }}</td>
        @if( $userActivitie->subscription->check_in == 1 )
          <td align="center"><a href="">Link Formulário</a></td>
          
          {{ Form::open(['action' => 'CertificateController@store']) }}
            {{ Form::hidden('activity_id', $userActivitie->activitie->id) }}
            {{ Form::hidden('user_id', 3) }}
            {{ Form::hidden('subscription_id', $userActivitie->subscription->activity_id) }}
            <td align="center">{{ Form::submit('Gerar', ['class' => 'btn btn-outline-info']) }}</td>
          {{ Form::close() }}

        @else
          <td align="center">-</td>
          <td align="center"><button class="btn btn-outline-info" disabled>Gerar</button></td>
        @endif
      @endif

      {{ Form::open(['route'=>['subscriptions.destroy',$userActivitie->subscription->id], 'method' => 'DELETE', 'onsubmit' => 'deleteConfirmation();']) }}
        @if($userActivitie->subscription->activity_id == $userActivitie->activitie->id  )
            <td>{{ Form::submit('Cancelar', ['class' => 'btn btn-outline-danger']) }}</td>
        @endif
      {{ Form::close() }}
      
      @endforeach
      <td><a href="http://localhost:8080/feeds/{{$event->id}}" >Ver mais</a></td>
    </tr>
      @empty
        <h5 style="color: red;">Não Possui Registros Cadastrados!</h5>
      @endforelse
    @empty
    @endforelse
  </tbody>
</table>

{!! $userActivities->links() !!}

@endsection