<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AfiliacionSeeder::class);
         $this->call(SexoSeeder::class);
         $this->call(RoleTableSeeder::class);
         $this->call(EmpresaSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(TipoCandidatoSeeder::class);
        
    }
}
