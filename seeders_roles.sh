#!\bin\bash

php artisan migrate:fresh --seed
php artisan db:seed --class=CategoriesTableSeeder
php artisan db:seed --class=UsersTableSeeder
php artisan db:seed --class=PermissionsTableSeeder
