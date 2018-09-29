@extends('layouts.app')
@section('title', 'Painel de Controle - Restrito')

@section('content')
<h3 style="text-align: center;">Gestão de Eventos</h3>
<hr>
<div>
	<ul class="nav justify-content-center">
		<li class="nav-item">
			<a class="nav-link active" href="http://localhost:8080/events">Eventos</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="http://localhost:8080/activities">Atividades</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="http://localhost:8080/speakers">Palestrantes</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="http://localhost:8080/locations">Locais</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="http://localhost:8080/rooms">Salas</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="http://localhost:8080/schedules">Horários</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="http://localhost:8080/infos">Internos</a>
		</li>
	</ul>
</div>
<a href="http://localhost:8080/feeds">Voltar Feed</a>
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
			<td><a href="http://localhost:8080/dashboards/{{$event->id}}" >Gerir Evento</a></td>
		</tr>
		@empty
		<h5 style="color: red;">Não Possui Registros Cadastrados!</h5>
		@endforelse
	</tbody>
</table>

{!! $events->links() !!}
@endsection