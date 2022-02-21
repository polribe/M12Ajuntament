@extends('layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:mt-10"> <div class="w-full sm:px-6">
<div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5"> 
<div class="text-center">
<h1 class="mb-10 text-2xl"><b>{{ __("Llistat d'Opinions") }}</b></h1>
</div>
</div>
<table id='opinions' class="table table-striped text-center" style="width: 100%">
        
        <thead>
	        <th class="px-4 py-2">{{ __("Id") }}</th>
			<th class="px-4 py-2">{{ __("Usuari") }}</th>
			<th class="px-4 py-2">{{ __("Esdeveniment") }}</th>
			<th class="px-4 py-2">{{ __("Contingut Comentari") }}</th> 
			<th class="px-4 py-2">{{ __("Accions") }}</th>
		</thead>

		<tbody>	
			@foreach($opinions as $opinion)
				<tr>
					<td>{{$opinion->id}}</td>
					<td>{{$opinion->user_id}}</td>
					<td>{{$opinion->evento_id}}</td>
					<td>{{$opinion->contenido}}</td>
					<td><a href="{{route('opinion.delete', $opinion)}}">Delete</a></td>
				</tr>
			@endforeach
		</tbody>
</table>


    </div>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8"
src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

        <script>$(document).ready( function () {
    $('#opinions').DataTable();
} );</script>

 </main>

@endsection