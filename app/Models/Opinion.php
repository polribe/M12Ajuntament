<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'evento_id',
        'contenido',
    ];

    public function evento(){

    	return $this->belongsTo(Evento::class);
	
	}

	public function user(){

    	return $this->belongsTo(User::class);
	
	}
}
