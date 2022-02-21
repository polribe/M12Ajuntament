<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'evento_id',
        'plazas',
    ];

    public function evento(){

    	return $this->belongsTo(Evento::class);
	
	}

	public function user(){

		return $this->belongsTo(User::class);

	}
}
