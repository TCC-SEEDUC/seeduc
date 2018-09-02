@extends('layouts.app')
@section('title', 'Ver Mais - Localização')

@section('content')
<h1>{{ $location->name }}</h1>
<h5>{{ $location->full_adress}}, {{ $location->adress_number}}</h5>

<ul>
	<li><b>Bairro: </b> {{ $location->district }}</li>
	<li><b>Cidade: </b> {{ $location->city }}</li>
	<li><b>Estado: </b> {{ $location->state }}</li>
	<li><b>CEP: </b> {{ $location->postal_code }}</li>
	<li><b>Complemento: </b> {{ $location->adress_complement }}</li>
	<li><b>Ponto de Referência: </b> {{ $location->reference_point }}</li>
	<li><b>Aberto: </b> {{ $location->work_days }}</li>
	<li><b>Horário de Abertura: </b> {{ $location->open_hours }}</li>
	<li><b>Horário de Fechamento: </b> {{ $location->close_hour }}</li>
	<li><b>Responsável: </b> {{ $location->manager_name }}</li>
	<li><b>Telefone Responsável: </b> {{ $location->manager_phone_number }}</li>
	<li><b>Email Responsável: </b> {{ $location->manager_email }}</li>
	<li><b style="color: red">Criado em: </b> {{ date("d/m/Y", strtotime($location->created_at)) }} </li>
</ul>

<p>{{ $location->description }}</p>
<a href="http://localhost:8080/locations" class="btn btn-outline-info"> Voltar</a>


@endsection