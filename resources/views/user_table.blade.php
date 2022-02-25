@extends('layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:mt-10"> <div class="w-full sm:px-6">
<div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5"> 
<div class="text-center">
<h1 class="mb-10 text-2xl"><b>{{ __("Llistat d'Usuaris") }}</b></h1>
</div>
</div>
<table id='usrs' class="table table-striped text-center" style="width: 100%">
        <thead>
	        <th class="px-4 py-2">{{ __("Id") }}</th>
			<th class="px-4 py-2">{{ __("Nom") }}</th>
			<th class="px-4 py-2">{{ __("Cognoms") }}</th>
			<th class="px-4 py-2">{{ __("Rol") }}</th> 
			<th class="px-4 py-2">{{ __("DNI") }}</th> 
			<th class="px-4 py-2">{{ __("Accions") }}</th>
		</thead>

		<tbody>
			
			@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->lastname}}</td>
					<td>{{$user->rol_id}}</td>
					<td>{{$user->dni}}</td>

					<!--Si l'usuari de la fila es rol 2 o 3, et dona opcip a eliminar o editar-->
					@if($user->rol_id == 2 || $user->rol_id == 3)
						<td><a href="{{route('user.delete', $user)}}">Delete</a> &nbsp <a href="{{route('user.edit', $user)}}">Edit</a></td>
					@endif


					<!--Si l'usuari de la fila es rol 1, mira si es el loggejat, i en cas de que no sigui ell mateix no et dona opcio a actuar sobre aquell usuari-->
					@if($user->rol_id == 1 && Auth::user()->id !=  $user->id)
						<td>No Permission</td>
					@endif

					<!--Si l'usuari de la fila es el mateix que esta loggejat, et dona opcio a editar-->
					@if(Auth::user()->id ==  $user->id)
						<td><a href=''>Edit</a></td>
					@endif
				</tr>
			@endforeach

		</tbody>
</table>

    </div>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8"
src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

        <script>$(document).ready( function () {
    $('#usrs').DataTable();
} );</script>

	</main>

@endsection