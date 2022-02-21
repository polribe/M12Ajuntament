<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Evento;
use App\models\Opinion;
use App\models\User;
use App\models\Recinto;
use Faker\Factory;


class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $recintos = Recinto::all();

        for($i = 0;$i < 3; $i++){

            $image = $faker->image(storage_path('app/public'),600,400,'cats');
            $image = explode('/', $image);
            $image = 'storage/' .end($image);

    		$evento = Evento::create([
    			'nombre' => $faker->sentence($faker->randomDigitNot(0)),
                'image' => $image,
    			'fecha' => $faker->dateTime(),
				'hora' => $faker->time(),
				'descripcion' => $faker->paragraph(),
				'precio' => $faker->randomFloat(),
				'aforo' => $faker->randomDigitNotNull(),
				'recinto_id' => $i,
				'user_id'=> User::inRandomOrder()->first()->id,
    		]);


    		for($j = 0; $j < 3; $j++){
    			Opinion::create([
    				'contenido'=> $faker->paragraph(),
    				'evento_id' => $evento->id,
    				'user_id' => User::inRandomOrder()->first()->id,
    			]);
    		}
        }
    }
}
