@extends('layouts.app')
@section('title', 'Adicionar um horário')

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

{{ Form::open(['action' => 'ScheduleController@store']) }}

	{{ Form::text('name', '', ['class'=>'form-control', 'required', 'placeholder' => 'Nome do horário - Ex: "Tarde"']) }}
	<br>
	{{ Form::label('begin_at', 'Horário de Início') }}
	{{ Form::time('begin_at', '', ['class' => 'form-control', 'required']) }}
	<br>
	{{ Form::label('finish_at', 'Horário de Término') }}
	{{ Form::time('finish_at', '', ['class' => 'form-control', 'required']) }}
	<br>
	{{ Form::submit('Cadastrar!', ['class' => 'btn btn-outline-success']) }}
	{{ Form::reset('Limpar Campos', ['class' => 'btn btn-outline-danger']) }}

{{ Form::close() }}




@endsection