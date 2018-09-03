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

{{ Form::open(['route' => ['schedules.update', $schedule->id], 'method' => 'PUT']) }}

	{{ Form::text('name', $schedule->name, ['class'=>'form-control', 'required', 'placeholder' => 'Nome do horário - Ex: "Tarde"']) }}
	<br>
	{{ Form::label('begin_at', 'Horário de Início') }}
	{{ Form::time('begin_at', $schedule->begin_at, ['class' => 'form-control', 'required']) }}
	<br>
	{{ Form::label('finish_at', 'Horário de Término') }}
	{{ Form::time('finish_at', $schedule->finish_at, ['class' => 'form-control', 'required']) }}
	<br>
	{{ Form::submit('Alterar', ['class' => 'btn btn-outline-success']) }}
	
{{ Form::close() }}
<br>
{{ Form::open(['route'=>['schedules.destroy',$schedule->id], 'method' => 'DELETE', 'onsubmit' => 'deleteConfirmation();']) }}
	{{ Form::submit('Excluir', ['class' => 'btn btn-outline-danger']) }}
{{ Form::close() }}
<br>
<a href="http://localhost:8080/schedules" class="btn btn-outline-info"> Voltar</a>




@endsection