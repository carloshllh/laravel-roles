<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        	'name' 			=> 'Roles',
        	'description' 	=> 'Categoria Roles',

        ]);

        Category::create([
        	'name' 			=> 'Usuarios',
        	'description' 	=> 'Categoria Usuarios',

        ]);

        Category::create([
        	'name' 			=> 'Productos',
        	'description' 	=> 'Categoria Productos',

        ]);                

    }
}
