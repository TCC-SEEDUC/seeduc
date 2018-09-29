@extends('layouts.app')
@section('title', 'Adicionar um interno')

@section('content')
<a class="nav-link active" href="http://localhost:8080/infos/create">Cadastrar</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Número de Registro</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($infos as $info)
    <tr>
      <th scope="row">{{ $info->id }}</th>
      <td>{{ $info->name }}</td>
      <td>{{ $info->cpf }}</td>
      <td>{{ $info->register_id  }}</td>
      <td><a href="http://localhost:8080/infos/{{$info->id}}" >Ver Mais</a></td>
      <td><a href="http://localhost:8080/infos/{{$info->id}}/edit">Alterar</a></td>
    </tr>
    @empty
    <h5 style="color: red;">Não Possui Registros Cadastrados!</h5>
    @endforelse
  </tbody>
</table>

{!! $infos->links() !!}

@endsection