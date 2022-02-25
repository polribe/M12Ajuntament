<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservaRequest;
use App\Http\Requests\UpdateReservaRequest;
use App\Models\Reserva;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservaRequest $request)
    {
        //controla que no s'injecti per l'input
        $request -> validate([
            'plazas' => 'required|integer|between:1,5',
        ]);

        //mira si hi ha una reserva amb les mateixes caracteristiques, en aquest cas redirecciona a la pagina d'error
        if (Reserva::where('user_id', $request->input('user_id'))->where('evento_id', $request->input('evento_id'))->exists()){
                return view('paginaerror');
        }
        //en cas contrari, desa la reserva i redirecciona a la pagina de reserva correcta
        else{
            Reserva::create([
                'user_id'=>$request->input('user_id'),
                'evento_id'=>$request->input('evento_id'),
                'plazas'=>$request->input('plazas'),
            ]);
            return view('reservacorrecta');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservaRequest  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservaRequest $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        //elimina la reserva desitjat i redirecciona de nou a la taula de reserves (d'un usuari)

        $reserva->delete();
        return redirect()->route('reserva_table');
    }
}
