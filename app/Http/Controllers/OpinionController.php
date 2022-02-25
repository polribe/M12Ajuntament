<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOpinionRequest;
use App\Http\Requests\UpdateOpinionRequest;
use App\Models\Opinion;

class OpinionController extends Controller
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
     * @param  \App\Http\Requests\StoreOpinionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOpinionRequest $request)
    {
        //quan es vol desar una opinio, primer mira si ja n'hi ha una, en aquest cas mostra la pagina d'error
        
        if (Opinion::where('user_id', $request->input('user_id'))->where('evento_id', $request->input('evento_id'))->exists()){
                return view('paginaerror_opinion');
        }

        //en cas contrari, desa la opinio i retorna la vista d'opinio correcta
        else{
            Opinion::create([
                'user_id'=>$request->input('user_id'),
                'evento_id'=>$request->input('evento_id'),
                'contenido'=>$request->input('contenido'),
            ]);
            return view('opinioncorrecta');

        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function show(Opinion $opinion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function edit(Opinion $opinion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOpinionRequest  $request
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOpinionRequest $request, Opinion $opinion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opinion $opinion)
    {
        //elimina la opinio desitjada i redirecciona de nou a la taula d'opinions
        $opinion->delete();
        return redirect()->route('opinion_table');
    }
}
