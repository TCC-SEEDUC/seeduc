@extends('layouts.app')
@section('title', '{{ $schedules->name }}')

@section('content')
<h1>{{ $schedules->name }}</h1>

<ul>
	<li><b>Horário de Início: </b> {{ $schedules->begin_at }}</li>
	<li><b>Horário de Término:</b> {{ $schedules->finish_at }}</li>
	<li><b style="color: red">Criado em: </b> {{ date("d/m/Y", strtotime($schedules->created_at)) }} </li>
</ul>

<a href="http://localhost:8080/schedules" class="btn btn-outline-info"> Voltar</a>


@endsection