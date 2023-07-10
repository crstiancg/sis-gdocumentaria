<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Area;
use App\Models\Clase;
use App\Models\Oficina;
use App\Models\Procedimiento;
use App\Models\Role;
use App\Models\TipoDocumento;
use App\Models\TipoPersona;
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

        $this->call(RoleSeeder::class);
        
        
        
        Area::factory(10)->create();
        Oficina::factory(10)->create();
        TipoPersona::factory(2)->create();
        TipoDocumento::factory(10)->create();
        Clase::factory(10)->create();
        Procedimiento::factory(10)->create();




    }
}
