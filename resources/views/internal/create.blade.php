@extends('layouts.app')
@section('title', 'Adicionar um interno')

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

{{ Form::open(['action' => 'InternalInfoController@store']) }}

	{{ Form::text('name', '', ['class'=>'form-control', 'required', 'placeholder' => 'Nome do interno']) }}
	<br>
	{{ Form::text('cpf', '', ['class'=>'form-control', 'required', 'placeholder' => 'CPF']) }}
	<br>
	{{ Form::text('register_id', '', ['class'=>'form-control', 'required', 'placeholder' => 'Número de Registro']) }}
	<br>
	{{ Form::submit('Cadastrar!', ['class' => 'btn btn-outline-success']) }}
	{{ Form::reset('Limpar Campos', ['class' => 'btn btn-outline-danger']) }}

{{ Form::close() }}




@endsection