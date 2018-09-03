@extends('layouts.app')
@section('title', '{{ $event->name }}')

@section('content')
<h1>{{ $event->name }}</h1>

<ul>
	<li><b>Data de início do evento:</b> {{ date("d/m/Y", strtotime($event->beginning_date)) }}</li>
	<li><b>Data de término do evento:</b> {{ date("d/m/Y", strtotime($event->end_date)) }}</li>
	<li><b style="color: red">Criado em: </b> {{ date("d/m/Y", strtotime($event->created_at)) }} </li>
</ul>

<p>{{ $event->description }}</p>
<a href="http://localhost:8080/events" class="btn btn-outline-info"> Voltar</a>


@endsection