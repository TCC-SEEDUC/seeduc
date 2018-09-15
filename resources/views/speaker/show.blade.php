@extends('layouts.app')
@section('title', '{{ $speaker->name }}')

@section('content')
<h1>{{ $speaker->name }}</h1>

<ul>
	<li><b>Linkedin</b> {{ $speaker->linkedin }}</li>
	<li><b>Facebook</b> {{ $speaker->facebook }}</li>
	<li><b>Twitter</b> {{ $speaker->twitter }}</li>
	<li><b>Website</b> {{ $speaker->website }}</li>
	<li><b style="color: red">Criado em: </b> {{ date("d/m/Y", strtotime($speaker->created_at)) }} </li>
</ul>

<p>{{ $speaker->small_desc }}</p>
<a href="http://localhost:8080/speakers" class="btn btn-outline-info"> Voltar</a>


@endsection