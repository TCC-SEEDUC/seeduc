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

{{ Form::open(['action' => 'EventController@store']) }}

	{{ Form::text('name', '', ['class'=>'form-control', 'required', 'placeholder' => 'Título do Evento']) }}
	<br>
	{{ Form::textarea('description', '', ['rows'=> 3,'class'=>'form-control', 'required', 'placeholder' => 'Descrição do Evento']) }}
	<br>
	{{ Form::label('beginning_date', 'Data de início do evento') }}
	{{ Form::date('beginning_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
	<br>
	{{ Form::label('end_date', 'Data final do evento') }}
	{{ Form::date('end_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
	<br>
	{{ Form::submit('Cadastrar!', ['class' => 'btn btn-outline-success']) }}
	{{ Form::reset('Limpar Campos', ['class' => 'btn btn-outline-danger']) }}

{{ Form::close() }}




@endsection