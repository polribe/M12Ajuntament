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
        //envia a la vista del llistat d'esdevenimetns tots els diferents esdeveniments
        $eventos = Evento::all();
        return view("evento.index", compact("eventos"));
    }


    public function welcome1()
    {
        //retorna la vista welcome1 passant tots els esdeveniments, que despres nomes s'agafaran els primers 3 de la BD
        $eventos = Evento::all();
        return view("welcome1", compact("eventos"));
    }


    public function table()
    {
        //agafa tots els esdeveniments i retorna la taula d'esdeveniments enviant-los tots ($eventos)
        $eventos = Evento::all();
        return view("evento.table", compact("eventos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //retorna la vista de formulari de creacio d'esdeveniment
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


        //desem la imatge que s'ha pujat a la carpeta public (on s'ha linkejat storage previament)
        $image = $request->file('image')->store('', 'public');

        //es valida el tipus de dada de camps crucials
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|number',
            'aforo' => 'required|integer',
        ]);

        //es crea l'esdeveniment passant les dades que s'han enviat des del formulari
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
        //es mostra la vista show passant l'esdeveniment desitjat
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
        //envia les dades de l'esdeveniment que es vol editar a la pagina del formulari
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

       //agafa les dades que s'han passat del formulari i les desa de nou, despres redirecciona a la taula d'esdeveniments
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
        //es mostra el formulari de reserva passant l'esdeveniment desitjat
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
        //elimina totes les reserves referents a l'esdeveniment que es vol eliminar
        foreach ($evento->reservas as $reserva) {
            $reserva->delete();
        }

        //un cop fet aixo, elimina l'esdeveniment desitjat i redirecciona a la taula d'esdeveniments
        $evento->delete();
        return redirect()->route('evento.table');
    }
}
