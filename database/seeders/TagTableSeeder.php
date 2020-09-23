<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Se crea el arreglo con los datos
		$tags = [
			"Q&Q",
			"Q&Q Superior",
			"Totto",
			"Deportivo",
			"Hombre",
			"Mujer",
			"Niño",
			"Anillos",
			"Pulsera",
			"Cadenas",
			"Escapularios",
		];

		foreach($tags as $key => $value){
			DB::table('tag')->insert([
				'name'=>$value,
				'slug'=> str_replace(" ", "_", mb_strtolower($value)),
			]);
		}
	}
}
