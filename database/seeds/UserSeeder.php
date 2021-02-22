<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();                   

        $user = new User();
        $user->name = 'Jesus Ramirez Vargas';
        $user->email = 'jesus21c.jrv@gmail.com';
        $user->password = bcrypt('NKUhkGNCydA2');
        $user->empresa_id = 1;
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Carlos Alberto Trejo Palacios';
        $user->email = 'carlos.trejo@zacatecas.gob.mx';
        $user->password = bcrypt('EVFo2wCEJyQ6');
        $user->empresa_id = 1;
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
