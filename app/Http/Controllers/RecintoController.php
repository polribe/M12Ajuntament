<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecintoRequest;
use App\Http\Requests\UpdateRecintoRequest;
use App\Models\Recinto;

class RecintoController extends Controller
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
     * @param  \App\Http\Requests\StoreRecintoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecintoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recinto  $recinto
     * @return \Illuminate\Http\Response
     */
    public function show(Recinto $recinto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recinto  $recinto
     * @return \Illuminate\Http\Response
     */
    public function edit(Recinto $recinto)
    {
        return view('recinto.edit', compact('recinto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecintoRequest  $request
     * @param  \App\Models\Recinto  $recinto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecintoRequest $request, Recinto $recinto)
    {
       $recinto->nombre = $request->input('nombre');
       $recinto->direccion = $request->input('direccion');
       $recinto->superficie = $request->input('superficie');
       
       $recinto->save();

       return redirect()->route('recinto_table');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recinto  $recinto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recinto $recinto)
    {
        $recinto->delete();
        return redirect()->route('recinto_table');
    }
}
