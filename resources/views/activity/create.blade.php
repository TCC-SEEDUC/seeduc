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
{{ Form::open(['action' => 'ActivityController@store']) }}

{{ Form::label('event_id', 'Essa atividade pertence a qual evento?') }}
<br>
{{ Form::select('event_id', $events , ['class'=>'form-control', 'required']) }}
<br><br>
{{ Form::text('name', '', ['class'=>'form-control', 'required', 'placeholder' => 'Nome da Atividade']) }}
<br>
{{ Form::textarea('description', '', ['rows'=> 3,'class'=>'form-control', 'required', 'placeholder' => 'Descrição sobre a atividade']) }}
<br>

<div class="row">
	<div class="col-4">
		{{ Form::number('minimum_quorum', '', ['class'=>'form-control', 'required', 'placeholder' => 'Quorum']) }}
	</div>
	<div class="col-4">
		{{ Form::number('maximum_capacity', '', ['class'=>'form-control', 'required', 'placeholder' => 'Capacidade Máxima']) }}
	</div>
</div>

<br>
{{ Form::label('beginning_date', 'Data da atividade') }}
{{ Form::date('beginning_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
<br>
{{ Form::label('schedule_id', 'Periodo da atividade: ') }}
{{ Form::select('schedule_id', $schedules , ['class'=>'form-control', 'required']) }}
<br><br>

{{ Form::label('speaker_id', 'Informações Extras ') }}
<div class="row">
	<div class="col-4">
		{{ Form::select('speaker_id', $speakers , ['class'=>'form-control', 'required']) }}
	</div>
	<div class="col-4">
		{{ Form::select('bond_id', $bonds , ['class'=>'form-control']) }}
	</div>
</div>

<br><br>

{{ Form::label('location_id', 'Localização ') }}
<div class="row">
	<div class="col-4">
		{{ Form::select('location_id', $locations , ['class'=>'form-control', 'required']) }}
	</div>
	<div class="col-4">
		{{ Form::select('room_id', $rooms , ['class'=>'form-control', 'required']) }}
	</div>
</div>

<br>
{{ Form::submit('Cadastrar!', ['class' => 'btn btn-outline-success']) }}
{{ Form::reset('Limpar Campos', ['class' => 'btn btn-outline-danger']) }}

{{ Form::close() }}




@endsection