@extends('layouts.app')
@section('title', '{{ $room->name }}')

@section('content')
<h1>{{ $room->name }} - {{ $room->location_id }}</h1>

<ul>
	<li><b>Capacidade</b> {{ $room->capacity }}</li>
	<li><b>Projetor?</b> {{ $room->available_video_projector == 1 ? 'Sim' : 'Não' }}</li>
	<li><b>Ar Condicionado?</b> {{ $room->available_AC == 1 ? 'Sim' : 'Não' }}</li>
	<li><b>Quantos Assentos?</b> {{ $room->available_seats }}</li>
	<li><b>Tipo de Assento</b> {{ $room->seats_type }}</li>
	<li><b style="color: red">Criado em: </b> {{ date("d/m/Y", strtotime($room->created_at)) }} </li>
</ul>

<p>{{ $room->description }}</p>
<a href="http://localhost:8080/rooms" class="btn btn-outline-info"> Voltar</a>


@endsection