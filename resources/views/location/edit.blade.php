@extends('layouts.app')
@section('title', 'Adicionar um evento')

@section('content')

@if(count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

{{ Form::open(['route' => ['locations.update', $location->id], 'method' => 'PUT']) }}

	{{ Form::text('name', $location->name, ['class'=>'form-control', 'required', 'placeholder' => 'Nome do local - ex:"Sede Seduc" ']) }}
	<br>
	{{ Form::text('full_adress', $location->full_adress, ['class'=>'form-control', 'required', 'placeholder' => 'Endereço']) }}
	<br>
	{{ Form::text('adress_number', $location->adress_number, ['class'=>'form-control', 'required', 'placeholder' => 'Número']) }}
	<br>
	{{ Form::text('adress_complement', $location->adress_complement, ['class'=>'form-control', 'placeholder' => 'Complemento ']) }}
	<br>
	{{ Form::text('district', $location->district, ['class'=>'form-control', 'required', 'placeholder' => 'Bairro']) }}
	<br>
	{{ Form::text('city', $location->city, ['class'=>'form-control', 'required', 'placeholder' => 'Cidade']) }}
	<br>
	{{ Form::text('state', $location->state, ['class'=>'form-control', 'required', 'placeholder' => 'Estado']) }}
	<br>
	{{ Form::text('postal_code', $location->postal_code, ['class'=>'form-control', 'required', 'placeholder' => 'CEP']) }}
	<br>
	{{ Form::text('reference_point', $location->reference_point, ['class'=>'form-control', 'placeholder' => 'Ponto de Referência']) }}
	<br>
	{{ Form::text('work_days', $location->work_days, ['class'=>'form-control', 'placeholder' => 'Dias de funcionamento']) }}
	<br>
	{{ Form::time('open_hours', $location->open_hours, ['class'=>'form-control', 'placeholder' => 'Horário de Abertura']) }}
	<br>
	{{ Form::time('close_hour', $location->close_hour, ['class'=>'form-control', 'placeholder' => 'Horário de Fechamento']) }}
	<br>
	{{ Form::text('manager_name', $location->manager_name, ['class'=>'form-control', 'placeholder' => 'Nome Responsável pelo local']) }}
	<br>
	{{ Form::text('manager_phone_number', $location->manager_phone_number, ['class'=>'form-control', 'placeholder' => 'Telefone Responsável']) }}
	<br>
	{{ Form::text('manager_email', $location->manager_email, ['class'=>'form-control', 'placeholder' => 'Email Responsável']) }}
	<br>

{{ Form::submit('Alterar', ['class' => 'btn btn-outline-success']) }}

{{ Form::close() }}
<br>
{{ Form::open(['route'=>['locations.destroy',$location->id], 'method' => 'DELETE', 'onsubmit' => 'deleteConfirmation();']) }}
	{{ Form::submit('Excluir', ['class' => 'btn btn-outline-danger']) }}
{{ Form::close() }}
<br>
<a href="http://localhost:8080/locations" class="btn btn-outline-info"> Voltar</a>




@endsection