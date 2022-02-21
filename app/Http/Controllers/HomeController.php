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
        return view('home');
    }

    public function reservas_table()
    {
        $reservas = Reserva::all();
        //print_r(compact('eventos'));
        return view("reserva_table", compact("reservas"));

    }

    public function opinions_table()
    {
        $opinions = Opinion::all();
        //print_r(compact('eventos'));
        return view("opinion_table", compact("opinions"));

    }

    public function recintos_table()
    {
        $recintos = Recinto::all();
        //print_r(compact('eventos'));
        return view("recinto_table", compact("recintos"));

    }
}
