<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
        	'name' 			=> 'Navegar Usuarios',
        	'slug' 			=> 'users.index',
        	'description' 	=> 'Lista y navega todos los usuarios del sistema',
            'category_id'   => 2,

        ]);
        Permission::create([
        	'name' 			=> 'Ver detalle de usuario',
        	'slug' 			=> 'users.show',
        	'description' 	=> 'Ver en detalle cada usuario del sistema',
            'category_id'   => 2,

        ]);
        Permission::create([
        	'name' 			=> 'Edición de usuarios',
        	'slug' 			=> 'users.edit',
        	'description' 	=> 'Editar cualquier dato de un usuario del sistema',
            'category_id'   => 2,

        ]);
        Permission::create([
        	'name' 			=> 'Eliminar usuario',
        	'slug' 			=> 'users.destroy',
        	'description' 	=> 'Eliminar cualquier usuario del sistema',
            'category_id'   => 2,

        ]);
        Permission::create([
        	'name' 			=> 'Crear usuario',
        	'slug' 			=> 'users.new',
        	'description' 	=> 'Crear un usuario del sistema',
            'category_id'   => 2,

        ]);      

        //ROLES

        Permission::create([
        	'name' 			=> 'Navegar Roles',
        	'slug' 			=> 'roles.index',
        	'description' 	=> 'Lista y navega todos los roles del sistema',
            'category_id'   => 1,

        ]);
        Permission::create([
        	'name' 			=> 'Ver detalle del rol',
        	'slug' 			=> 'roles.show',
        	'description' 	=> 'Ver en detalle cada rol del sistema',
            'category_id'   => 1,

        ]);
        Permission::create([
        	'name' 			=> 'Edición de roles',
        	'slug' 			=> 'roles.edit',
        	'description' 	=> 'Editar cualquier dato de un rol del sistema',
            'category_id'   => 1,

        ]);
        Permission::create([
        	'name' 			=> 'Eliminar rol',
        	'slug' 			=> 'roles.destroy',
        	'description' 	=> 'Eliminar cualquier rol del sistema',
            'category_id'   => 1,

        ]);                       
        Permission::create([
        	'name' 			=> 'Crear rol',
        	'slug' 			=> 'roles.new',
        	'description' 	=> 'Crear un rol del sistema',
            'category_id'   => 1,

        ]);        

        //Productos

        Permission::create([
        	'name' 			=> 'Navegar productos',
        	'slug' 			=> 'products.index',
        	'description' 	=> 'Lista y navega todos los productos del sistema',
            'category_id'   => 3,
        ]);
        Permission::create([
        	'name' 			=> 'Ver detalle del producto',
        	'slug' 			=> 'products.show',
        	'description' 	=> 'Ver en detalle cada producto del sistema',
            'category_id'   => 3,

        ]);
        Permission::create([
        	'name' 			=> 'Edición de productos',
        	'slug' 			=> 'products.edit',
        	'description' 	=> 'Editar cualquier dato de un producto del sistema',
            'category_id'   => 3,

        ]);
        Permission::create([
        	'name' 			=> 'Eliminar producto',
        	'slug' 			=> 'products.destroy',
        	'description' 	=> 'Eliminar cualquier producto del sistema',
            'category_id'   => 3,

        ]);                        
        Permission::create([
        	'name' 			=> 'Crear producto',
        	'slug' 			=> 'products.new',
        	'description' 	=> 'Crear un producto del sistema',
            'category_id'   => 3,
        ]);  
                          
    }
}
