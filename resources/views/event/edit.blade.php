@extends('layouts.app')
@section('title', 'Alterar evento')

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

{{ Form::open(['route' => ['events.update', $event->id], 'method' => 'PUT']) }}

	{{ Form::text('name', $event->name, ['class'=>'form-control', 'required', 'placeholder' => 'Título do Evento']) }}
	<br>
	{{ Form::textarea('description', $event->description, ['rows'=> 3,'class'=>'form-control', 'required', 'placeholder' => 'Descrição do Evento']) }}
	<br>
	{{ Form::label('beginning_date', 'Data de início do evento') }}
	{{ Form::date('beginning_date', $event->beginning_date, ['class' => 'form-control']) }}
	<br>
	{{ Form::label('end_date', 'Data final do evento') }}
	{{ Form::date('end_date', $event->end_date, ['class' => 'form-control']) }}
	<br>
	{{ Form::submit('Alterar', ['class' => 'btn btn-outline-success']) }}

{{ Form::close() }}
<br>
{{ Form::open(['route'=>['events.destroy',$event->id], 'method' => 'DELETE', 'onsubmit' => 'deleteConfirmation();']) }}
	{{ Form::submit('Excluir', ['class' => 'btn btn-outline-danger']) }}
{{ Form::close() }}
<br>
<a href="http://localhost:8080/events" class="btn btn-outline-info"> Voltar</a>





@endsection