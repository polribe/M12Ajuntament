@extends('layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:mt-10"> <div class="w-full sm:px-6">
<div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5"> <div class="text-center">
<h1 class="mb-10 text-2xl"><b>{{ __("Llistat d'Esdeveniments") }}</h1>

            </div>
        </div>
<table id='eventos' class="table table-striped text-center" style="width: 100%">
            <!-- AQUÍ MANEGAREM LES DADES -->
        <thead>
	        <th class="px-4 py-2">{{ __("Id") }}</th>
			<th class="px-4 py-2">{{ __("Nom") }}</th>
			<th class="px-4 py-2">{{ __("Recinte") }}</th>
			<th class="px-4 py-2">{{ __("Data") }}</th> 
			<th class="px-4 py-2">{{ __("Accions") }}</th>
		</thead>

		<tbody>
			
			@foreach($eventos as $evento)
				<tr>
					<td>{{$evento->id}}</td>
					<td>{{$evento->nombre}}</td>
					<td>{{$evento->recinto_id}}</td>
					<td>{{$evento->fecha}}</td>
					<td><a href="{{route('evento.destroy', $evento)}}">Delete</a> &nbsp <a href="{{route('evento.edit', $evento)}}">Edit</a></td>
				</tr>
			@endforeach

		</tbody>
</table>
        

    </div>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8"
src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

        <script>$(document).ready( function () {
    $('#eventos').DataTable();
} );</script>

 </main>

@endsection