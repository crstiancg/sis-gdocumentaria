<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Illuminate\Database\Seeder;
// use Spatie\Permission\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
             'name' => 'administrador',
             'email' => 'administrador@gmail.com',
             'password' => bcrypt('administrador')
         ]);
        
        $role = Role::create(['name' => 'Administrador']);
        $user->assignRole($role);
    }
}
