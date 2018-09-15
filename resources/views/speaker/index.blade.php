@extends('layouts.app')
@section('title', 'Adicionar uma atração')

@section('content')

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Tipo</th>
      <th scope="col">Pequena Descrição</th>
      <th scope="col">Linkedin</th>
      <th scope="col">Facebook</th>
      <th scope="col">Twitter</th>
      <th scope="col">Website</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($speakers as $speaker)
    <tr>
      <th scope="row">{{ $speaker->id }}</th>
      <td>{{ $speaker->name }}</td>
      <td>{{ $speaker->type }}</td>
      <td>{{ $speaker->small_desc }}</td>
      <td>{{ $speaker->linkedin }}</td>
      <td>{{ $speaker->facebook }}</td>
      <td>{{ $speaker->twitter }}</td>
      <td>{{ $speaker->website }}</td>
      <td><a href="http://localhost:8080/speakers/{{$speaker->id}}" >Ver Mais</a></td>
      <td><a href="http://localhost:8080/speakers/{{$speaker->id}}/edit">Alterar</a></td>
    </tr>
    @empty
    <h5 style="color: red;">Não Possui Registros Cadastrados!</h5>
    @endforelse
  </tbody>
</table>

{!! $speakers->links() !!}

@endsection