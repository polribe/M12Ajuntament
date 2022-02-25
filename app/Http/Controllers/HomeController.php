<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Opinion;
use App\Models\Recinto;
use App\Models\Reserva;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //retorna la vista del dashboard de usuari
        return view('home');
    }

    public function reservas_table()
    {
        //agafa totes les reserves i les mostra a la taula de reserves, posteriorment a la vista es filtrara per l'usuari
        $reservas = Reserva::all();
        return view("reserva_table", compact("reservas"));

    }

    public function opinions_table()
    {
        //agafa totes les opinions i les mostra a la taula d'opinions
        $opinions = Opinion::all();
        return view("opinion_table", compact("opinions"));

    }

    public function recintos_table()
    {
        //agafa tots els recintes i els mostra a la taula de recintes
        $recintos = Recinto::all();
        return view("recinto_table", compact("recintos"));

    }

    public function users_table()
    {
        //agafa tots els usuaris i els mostra a la taula de usuaris
        $users = User::all();
        return view("user_table", compact("users"));

    }
}
