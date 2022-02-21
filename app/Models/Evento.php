<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

   
    protected $fillable = [
        'nombre',
        'user_id',
        'image',
        'fecha',
        'hora',
        'recinto_id',
        'descripcion',
        'precio',
        'aforo',
    ];

    public function recinto(){

    	return $this->belongsTo(Recinto::class);
	
	}

	public function user(){

    	return $this->belongsTo(User::class);
	
	}

	public function opinion(){

		return $this->hasMany(Opinion::class);

	}

	public function reservas(){

		return $this->hasMany(Reserva::class);

	}


}
