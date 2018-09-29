@extends('layouts.app')
@section('title', 'Painel de Controle - Restrito')

@section('content')
<h3 style="text-align: center;">{{$subscribers[0]->name}}</h3>
<hr>
<table class="table">
	<thead class="thead-dark">
		<tr>
			<th style="text-align: center;" scope="col">#</th>
			<th style="text-align: center;" scope="col">CPF</th>
			<th style="text-align: center;" scope="col">Nome Completo</th>
			<th style="text-align: center;" scope="col">Email</th>
			<th style="text-align: center;" scope="col">Telefone</th>
			<th style="text-align: center;" scope="col">Data da Inscrição</th>
			<th>Presença</th>
		</tr>
	</thead>
	<tbody>
		@forelse ($subscribers as $subscriber)
			@forelse ($subscriber->users as $user)
		<tr>
			<th scope="row" style="text-align: center;">{{ $subscriber->id }}</th>
			<td style="text-align: center;">{{ $user->cpf }}</td>
			<td style="text-align: center;">{{ $user->name }}</td>
			<td style="text-align: center;">{{ $user->email }}</td>
			<td style="text-align: center;">{{ $user->phone_number }}</td>
			@foreach($subscriber->subscriptions as $subscription)
			<td style="text-align: center;">{{ $subscription->created_at }}</td>
			
			@if($subscription->check_in != 1)
				{{ Form::open(['route' => ['subscriptions.update', $subscription->id], 'method' => 'PUT']) }}
					{{ Form::hidden('check_in', 1)}}
					<td style="text-align: center;">{{ Form::submit('Fazer Check-in', ['class' => 'btn btn-outline-success']) }}</td>
				{{ Form::close() }}
			@else
				{{ Form::open(['route' => ['subscriptions.update', $subscription->id], 'method' => 'PUT']) }}
					{{ Form::hidden('check_in', 0)}}
					<td style="text-align: center;">{{ Form::submit('Cancelar Check-in', ['class' => 'btn btn-outline-danger']) }}</td>
				{{ Form::close() }}
			@endif

			@endforeach
		</tr>
		@empty
		<h5 style="color: red;">Não Possui Registros Cadastrados!</h5>
		@endforelse
		@empty
		<h5 style="color: red;">Não Possui Registros Cadastrados!</h5>
		@endforelse
	</tbody>
</table>

{!! $subscribers->links() !!}
@endsection