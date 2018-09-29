@extends('layouts.app')
@section('title', 'Adicionar um evento')

@section('content')
<a class="nav-link active" href="http://localhost:8080/locations/create">Cadastrar</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Endereço</th>
      <th scope="col">Número</th>
      <th scope="col">Complemento</th>
      <th scope="col">Bairro</th>
      <th scope="col">Cidade</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($locations as $location)
    <tr>
      <th scope="row">{{ $location->id }}</th>
      <td>{{ $location->name }}</td>
      <td>{{ $location->full_adress }}</td>
      <td>{{ $location->adress_number }}</td>
      <td>{{ $location->adress_complement }}</td>
      <td>{{ $location->district }}</td>
      <td>{{ $location->city }}</td>
      <td><a href="http://localhost:8080/locations/{{$location->id}}" >Ver Mais</a></td>
      <td><a href="http://localhost:8080/locations/{{$location->id}}/edit">Alterar</a></td>
    </tr>
    @empty
    <h5 style="color: red;">Não Possui Registros Cadastrados!</h5>
    @endforelse
  </tbody>
</table>

{!! $locations->links() !!}

@endsection