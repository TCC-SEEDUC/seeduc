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

{{ Form::open(['route' => ['infos.update', $info->id], 'method' => 'PUT']) }}

	{{ Form::text('name', $info->name, ['class'=>'form-control', 'required', 'placeholder' => 'Nome do interno']) }}
	<br>
	{{ Form::text('cpf', $info->cpf, ['class'=>'form-control', 'required', 'placeholder' => 'CPF']) }}
	<br>
	{{ Form::text('register_id', $info->register_id, ['class'=>'form-control', 'required', 'placeholder' => 'Número de Registro']) }}
	<br>
	{{ Form::submit('Cadastrar!', ['class' => 'btn btn-outline-success']) }}

{{ Form::close() }}
<br>
{{ Form::open(['route'=>['infos.destroy',$info->id], 'method' => 'DELETE', 'onsubmit' => 'deleteConfirmation();']) }}
	{{ Form::submit('Excluir', ['class' => 'btn btn-outline-danger']) }}
{{ Form::close() }}
<br>
<a href="http://localhost:8080/infos" class="btn btn-outline-info"> Voltar</a>





@endsection