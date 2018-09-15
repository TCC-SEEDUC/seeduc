@extends('layouts.app')
@section('title', 'Adicionar uma atração')

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

{{ Form::open(['action' => 'SpeakerController@store']) }}

	{{ Form::text('name', '', ['class'=>'form-control', 'required', 'placeholder' => 'Nome da Atração']) }}
	<br>
	{{ Form::text('type', '', ['class'=>'form-control', 'required', 'placeholder' => 'Tipo da Atração']) }}
	<br>
	{{ Form::textarea('small_desc', '', ['rows'=> 3,'class'=>'form-control', 'required', 'placeholder' => 'Pequena Descrição sobre a atração']) }}
	<br>
	{{ Form::text('linkedin', '', ['class'=>'form-control', 'placeholder' => 'Linkedin - URL']) }}
	<br>
	{{ Form::text('facebook', '', ['class'=>'form-control', 'placeholder' => 'Facebook - URL']) }}
	<br>
	{{ Form::text('twitter', '', ['class'=>'form-control', 'placeholder' => 'Twitter - URL']) }}
	<br>
	{{ Form::text('website', '', ['class'=>'form-control', 'placeholder' => 'Website - URL']) }}
	<br>
	{{ Form::submit('Cadastrar', ['class' => 'btn btn-outline-success']) }}
	{{ Form::reset('Limpar Campos', ['class' => 'btn btn-outline-danger']) }}

{{ Form::close() }}




@endsection