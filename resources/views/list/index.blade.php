<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3 style="text-align: center;">Lista de Presença - {{$subscribers[0]->name}}</h3>
	<br>
	<table class="table" border="2">
		<thead class="thead-dark">
			<tr>
				<th style="text-align: center;" scope="col">#</th>
				<th style="text-align: center;" scope="col">CPF</th>
				<th style="text-align: center;" scope="col">Nome Completo</th>
				<th style="text-align: center;" scope="col">Email</th>
				<th style="text-align: center;" scope="col">Telefone</th>
				<th style="text-align: center;" scope="col">Data da Inscrição</th>
				<th>Assinatura</th>
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
				@endforeach
				<td></td>
			</tr>
			@empty
			<h5 style="color: red;">Não Possui Registros Cadastrados!</h5>
			@endforelse
			@empty
			<h5 style="color: red;">Não Possui Registros Cadastrados!</h5>
			@endforelse
		</table>
	</tbody>
</body>
</html>