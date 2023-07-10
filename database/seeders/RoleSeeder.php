<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Permission::create(['name' => 'Ver áreas']);
        Permission::create(['name' => 'Eliminar áreas']);
        Permission::create(['name' => 'Editar áreas']);
        Permission::create(['name' => 'Crear áreas']);

        Permission::create(['name' => 'Ver clases']);
        Permission::create(['name' => 'Eliminar clases']);
        Permission::create(['name' => 'Editar clases']);
        Permission::create(['name' => 'Crear clases']);

        Permission::create(['name' => 'Ver documentos']);
        Permission::create(['name' => 'Eliminar documentos']);
        Permission::create(['name' => 'Editar documentos']);
        Permission::create(['name' => 'Crear documentos']);

        Permission::create(['name' => 'Ver indicaciones']);
        Permission::create(['name' => 'Eliminar indicaciones']);
        Permission::create(['name' => 'Editar indicaciones']);
        Permission::create(['name' => 'Crear indicaciones']);

        
        Permission::create(['name' => 'Ver mesa de ayuda']);
        Permission::create(['name' => 'Eliminar mesa de ayuda']);
        Permission::create(['name' => 'Editar mesa de ayuda']);

        Permission::create(['name' => 'Ver oficinas']);
        Permission::create(['name' => 'Eliminar oficinas']);
        Permission::create(['name' => 'Editar oficinas']);
        Permission::create(['name' => 'Crear oficinas']);

        Permission::create(['name' => 'Ver permisos']);
        Permission::create(['name' => 'Eliminar permisos']);
        Permission::create(['name' => 'Editar permisos']);
        Permission::create(['name' => 'Crear permisos']);

        Permission::create(['name' => 'Ver procedimientos']);
        Permission::create(['name' => 'Eliminar procedimientos']);
        Permission::create(['name' => 'Editar procedimientos']);
        Permission::create(['name' => 'Crear procedimientos']);

        Permission::create(['name' => 'Ver administrados']);
        Permission::create(['name' => 'Eliminar administrados']);
        Permission::create(['name' => 'Editar administrados']);
        Permission::create(['name' => 'Crear administrados']);

        Permission::create(['name' => 'Ver roles']);
        Permission::create(['name' => 'Eliminar roles']);
        Permission::create(['name' => 'Editar roles']);
        Permission::create(['name' => 'Crear roles']);

        Permission::create(['name' => 'Ver tipo de documentos']);
        Permission::create(['name' => 'Eliminar tipo de documentos']);
        Permission::create(['name' => 'Editar tipo de documentos']);
        Permission::create(['name' => 'Crear tipo de documentos']);

        Permission::create(['name' => 'Ver tipo de personas']);
        Permission::create(['name' => 'Eliminar tipo de personas']);
        Permission::create(['name' => 'Editar tipo de personas']);
        Permission::create(['name' => 'Crear tipo de personas']);

        Permission::create(['name' => 'Ver usuarios']);
        Permission::create(['name' => 'Eliminar usuarios']);
        Permission::create(['name' => 'Editar usuarios']);
        Permission::create(['name' => 'Crear usuarios']);
    }
}
