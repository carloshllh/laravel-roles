<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create();

        $user = User::create([
            'name' => 'Carlos H.',
            'email' => 'carlosh@mail.org',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
        ]);

        //Sin permisos solo acceso total
        Role::create([
        	'name' => 'Admin',
        	'slug' => 'admin',
        	'special' => 'all-access'
        ]);

        $user->assignRole(1);
    }
}
