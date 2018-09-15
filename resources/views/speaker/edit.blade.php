@extends('layouts.app')
@section('title', 'Alterar atração')

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

{{ Form::open(['route' => ['speakers.update', $speaker->id], 'method' => 'PUT']) }}

	{{ Form::text('name', $speaker->name, ['class'=>'form-control', 'required', 'placeholder' => 'Nome da Atração']) }}
	<br>
	{{ Form::text('type', $speaker->type, ['class'=>'form-control', 'required', 'placeholder' => 'Tipo da Atração']) }}
	<br>
	{{ Form::textarea('small_desc', $speaker->small_desc, ['rows'=> 3,'class'=>'form-control', 'required', 'placeholder' => 'Pequena Descrição sobre a atração']) }}
	<br>
	{{ Form::text('linkedin', $speaker->linkedin, ['class'=>'form-control', 'placeholder' => 'Linkedin - URL']) }}
	<br>
	{{ Form::text('facebook', $speaker->facebook, ['class'=>'form-control', 'placeholder' => 'Facebook - URL']) }}
	<br>
	{{ Form::text('twitter', $speaker->twitter, ['class'=>'form-control', 'placeholder' => 'Twitter - URL']) }}
	<br>
	{{ Form::text('website', $speaker->website, ['class'=>'form-control', 'placeholder' => 'Website - URL']) }}
	<br>
	{{ Form::submit('Alterar', ['class' => 'btn btn-outline-success']) }}

{{ Form::close() }}
<br>
{{ Form::open(['route'=>['speakers.destroy',$speaker->id], 'method' => 'DELETE', 'onsubmit' => 'deleteConfirmation();']) }}
	{{ Form::submit('Excluir', ['class' => 'btn btn-outline-danger']) }}
{{ Form::close() }}
<br>
<a href="http://localhost:8080/speakers" class="btn btn-outline-info"> Voltar</a>





@endsection