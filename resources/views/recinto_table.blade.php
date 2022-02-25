@extends('layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:mt-10"> <div class="w-full sm:px-6">
<div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5"> 
<div class="text-center">
<h1 class="mb-10 text-2xl"><b>{{ __("Llistat de Recintes") }}</b></h1>
</div>
</div>
<table id='recintos' class="table table-striped text-center" style="width: 100%">
        
        <thead>
	        <th class="px-4 py-2">{{ __("Id") }}</th>
			<th class="px-4 py-2">{{ __("Nom Recinte") }}</th>
			<th class="px-4 py-2">{{ __("Adreça") }}</th>
			<th class="px-4 py-2">{{ __("Superficie") }}</th> 
			<th class="px-4 py-2">{{ __("Accions") }}</th>
		</thead>

		<tbody>	
			<!--Crea tantes files de la taula com recintes hi hagi-->
			@foreach($recintos as $recinto)
				<tr>
					<td>{{$recinto->id}}</td>
					<td>{{$recinto->nombre}}</td>
					<td>{{$recinto->direccion}}</td>
					<td>{{$recinto->superficie}}</td>
					<td><a href='{{route("recinto.edit", $recinto)}}'>Edit</a> &nbsp <a href='{{route("recinto.delete", $recinto)}}'>Delete</a></td>
				</tr>
			@endforeach
		</tbody>
</table>


    </div>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8"
src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

        <script>$(document).ready( function () {
    $('#recintos').DataTable();
} );</script>

 </main>

@endsection