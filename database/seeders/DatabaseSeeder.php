<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Rol;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Factory::create();
    	$rol = Rol::all();

    	DB::table('users')->insert([
    		'name' => 'admin',
    		'lastname' => 'adminis',
			'fechaNacimiento' => $faker->dateTime(),
			'dni' => $faker->paragraph(),
			'codigoPostal' => $faker->randomDigitNotNull(),
			'telefono' => $faker->phoneNumber(),
			'rol_id'=> 1,
    		'email' => 'admin@gmail.com',
    		'password' => bcrypt('admin'),
    	]);

    	/*for($i = 0; $i < 10; $i++){
    		DB::table('users')->insert([
    			'name' => 'user'.$i,
    			'lastname' => 'user'.$i.'c',
    			'fechaNacimiento' => $faker->dateTime(),
    			'dni' => $faker->paragraph(),
    			'codigoPostal' => $faker->randomDigitNotNull(),
    			'telefono' => $faker->phoneNumber(),
    			'rol_id'=> 2,
    			'email' => 'user'.$i.'@gmail.com',
    			'password'=> bcrypt('admin'),
    		]);
    	}*/
        // \App\Models\User::factory(10)->create();
        $this -> call([RecintoSeeder::class]);
        $this -> call([RolSeeder::class]);
        $this -> call([EventoSeeder::class]);

    }
}
