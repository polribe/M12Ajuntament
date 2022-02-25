@extends('layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:mt-10"> <div class="w-full sm:px-6">
<div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5"> 
<div class="text-center">
<h1 class="mb-10 text-2xl"><b>{{ __("Llistat de Reserves") }}</b></h1>
</div>
</div>
<table id='reservas' class="table table-striped text-center" style="width: 100%">
        
        <thead>
	        <th class="px-4 py-2">{{ __("Evento") }}</th>
			<th class="px-4 py-2">{{ __("Plazas Reservadas") }}</th>

			<th class="px-4 py-2">{{ __("Acciones") }}</th>
		</thead>


		<tbody>	
			<!--Crea tantes files de la taula com reserves hi hagi de l'usuari loggejat-->
			@foreach(\App\Models\Reserva::where('user_id',Auth::user()->id)->get() as $reserva)
				<tr>
					<td>{{$reserva->evento->nombre}}</td>
					<td>{{$reserva->plazas}}</td>
					<td><a href="{{route('reserva.delete', $reserva)}}">Cancelar Reserva</a></td>
				</tr>
			@endforeach
		</tbody>
</table>


    </div>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8"
src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

        <script>$(document).ready( function () {
    $('#reservas').DataTable();
} );</script>

 </main>

@endsection