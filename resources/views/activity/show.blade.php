@extends('layouts.app')
@section('title', '{{ $activity->name }}')

@section('content')
<h1>{{ $activity->name }} - {{$activity->event->name}}</h1>

<ul>
	<li><b>Data da Atividade: </b> {{ date("d/m/Y", strtotime($activity->beginning_date)) }}</li>
	<li><b>Quórum: </b> {{ $activity->minimum_quorum  }}</li>
	<li><b>Capacidade: </b> {{ $activity->maximum_capacity }}</li>
	<li><b>Horário: </b>{{ $activity->schedule->begin_at }} - {{ $activity->schedule->finish_at }}</li>
	<li><b>Local: </b> {{ $activity->location->name }}</li>
	<li><b>Sala: </b> {{ isset($activity->room) ? $activity->room->name : 'Não Possui' }}</li>
	<li><b style="color: red">Criado em: </b> {{ date("d/m/Y", strtotime($activity->created_at)) }} </li>
</ul>

<p>{{ $activity->description }}</p>
<a href="http://localhost:8080/activities" class="btn btn-outline-info"> Voltar</a>


@endsection
