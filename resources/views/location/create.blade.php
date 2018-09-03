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

{{ Form::open(['action' => 'LocationController@store']) }}

	{{ Form::text('name', '', ['class'=>'form-control', 'required', 'placeholder' => 'Nome do local - ex:"Sede Seduc" ']) }}
	<br>
	{{ Form::text('full_adress', '', ['class'=>'form-control', 'required', 'placeholder' => 'Endereço']) }}
	<br>
	{{ Form::text('adress_number', '', ['class'=>'form-control', 'required', 'placeholder' => 'Número']) }}
	<br>
	{{ Form::text('adress_complement', '', ['class'=>'form-control', 'placeholder' => 'Complemento ']) }}
	<br>
	{{ Form::text('district', '', ['class'=>'form-control', 'required', 'placeholder' => 'Bairro']) }}
	<br>
	{{ Form::text('city', '', ['class'=>'form-control', 'required', 'placeholder' => 'Cidade']) }}
	<br>
	{{ Form::text('state', '', ['class'=>'form-control', 'required', 'placeholder' => 'Estado']) }}
	<br>
	{{ Form::text('postal_code', '', ['class'=>'form-control', 'required', 'placeholder' => 'CEP']) }}
	<br>
	{{ Form::text('reference_point', '', ['class'=>'form-control', 'placeholder' => 'Ponto de Referência']) }}
	<br>
	{{ Form::text('work_days', '', ['class'=>'form-control', 'placeholder' => 'Dias de funcionamento']) }}
	<br>
	{{ Form::time('open_hours', '', ['class'=>'form-control', 'placeholder' => 'Horário de Abertura']) }}
	<br>
	{{ Form::time('close_hour', '', ['class'=>'form-control', 'placeholder' => 'Horário de Fechamento']) }}
	<br>
	{{ Form::text('manager_name', '', ['class'=>'form-control', 'placeholder' => 'Nome Responsável pelo local']) }}
	<br>
	{{ Form::text('manager_phone_number', '', ['class'=>'form-control', 'placeholder' => 'Telefone Responsável']) }}
	<br>
	{{ Form::text('manager_email', '', ['class'=>'form-control', 'placeholder' => 'Email Responsável']) }}
	<br>

{{ Form::submit('Cadastrar', ['class' => 'btn btn-outline-success']) }}
{{ Form::reset('Limpar Campos', ['class' => 'btn btn-outline-danger']) }}

{{ Form::close() }}




@endsection