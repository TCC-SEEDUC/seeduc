@extends('layouts.app')
@section('title', 'Adicionar uma sala')

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

{{ Form::open(['route' => ['rooms.update', $room->id], 'method' => 'PUT']) }}

	{{ Form::text('name', $room->name, ['class'=>'form-control', 'required', 'placeholder' => 'Sala']) }}
	<br>
	{{ Form::text('description', $room->description, ['class'=>'form-control', 'required', 'placeholder' => 'Descrição']) }}
	<br>
	{{ Form::number('capacity', $room->capacity, ['class'=>'form-control', 'required', 'placeholder' => 'Capacidade']) }}
	<br>
	{{Form::label('available_video_projector', 'Possui Projetor? ')}}
	{{ Form::checkbox('available_video_projector', '1', ['class'=>'form-control', 'required']) }}
	<br>
	{{Form::label('available_video_projector', 'Possui Ar condicionado? ')}}
	{{ Form::checkbox('available_AC', '1', ['class'=>'form-control', 'required']) }}
	<br>
	{{ Form::number('available_seats', $room->available_seats, ['class'=>'form-control', 'required', 'placeholder' => 'Número de Assentos']) }}
	<br>
	{{ Form::text('seats_type', $room->seats_type, ['class'=>'form-control', 'required', 'placeholder' => 'Tipo de Assento']) }}
	<br>
	{{ Form::select('location_id', $locations , ['class'=>'form-control', 'required', 'placeholder' => 'Título do roomo']) }}
	<br><br>
	
	{{ Form::submit('Alterar', ['class' => 'btn btn-outline-success']) }}

{{ Form::close() }}
<br>
{{ Form::open(['route'=>['rooms.destroy',$room->id], 'method' => 'DELETE', 'onsubmit' => 'deleteConfirmation();']) }}
	{{ Form::submit('Excluir', ['class' => 'btn btn-outline-danger']) }}
{{ Form::close() }}
<br>
<a href="http://localhost:8080/rooms" class="btn btn-outline-info"> Voltar</a>




@endsection