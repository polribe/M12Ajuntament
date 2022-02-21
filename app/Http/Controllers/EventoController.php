<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\Evento;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::all();
        //print_r(compact('eventos'));
        return view("evento.index", compact("eventos"));
    }


    public function welcome1()
    {
        $eventos = Evento::all();
        //print_r(compact('eventos'));
        return view("welcome1", compact("eventos"));
    }


    public function table()
    {
        $eventos = Evento::all();
        //print_r(compact('eventos'));
        return view("evento.table", compact("eventos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("evento.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventoRequest $request)
    {
        /*$image = $request->input('image');
        $image = explode('/', $image);
        $image = 'storage/' .end($image);*/
        $image = $request->file('image')->store('', 'public');

        Evento::create([
                'nombre'=>$request->input('nombre'),
                'user_id'=>$request->input('user_id'),
                'image'=>$image,
                'fecha'=>$request->input('fecha'),
                'hora'=>$request->input('hora'),
                'recinto_id'=>$request->input('recinto_id'),
                'descripcion'=>$request->input('descripcion'),
                'precio'=>$request->input('precio'),
                'aforo'=>$request->input('aforo'),
            ]);
            return redirect()->route('evento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        return view('evento.show', ['evento' => $evento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        return view('evento.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventoRequest  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventoRequest $request, Evento $evento)
    {
       $evento->nombre = $request->input('nombre');
       $evento->fecha = $request->input('fecha');
       $evento->hora = $request->input('hora');
       $evento->descripcion = $request->input('descripcion');
       $evento->precio = $request->input('precio');
       $evento->aforo = $request->input('aforo');

       $evento->save();

       return redirect()->route('evento.table');
    }

    public function reserva(Evento $evento)
    {
        return view('evento.reserva', ['evento' => $evento]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        foreach ($evento->reservas as $reserva) {
            $reserva->delete();
        }

        $evento->delete();
        return redirect()->route('evento.table');
    }
}
