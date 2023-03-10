<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleIncidencesAdmin = Role::create(['name' => 'Gestor de incidencias']);
        $roleTeacher = Role::create(['name' => 'Profesor']);

        // Permiso ruta app.dashboard
        // Permission::create(['name' => 'app.dashboard'])->syncRoles([$roleAdmin, $roleTeacher]);

        // Permisos Incidences
        Permission::create([
            'name' => 'app.incidences.index',
            'description' => 'Ver listado de incidencias'
        ])->syncRoles([$roleAdmin, $roleIncidencesAdmin, $roleTeacher]);

        Permission::create([
            'name' => 'app.incidences.show',
            'description' => 'Ver detalle de incidencias'
        ])->syncRoles([$roleAdmin, $roleIncidencesAdmin, $roleTeacher]);

        Permission::create([
            'name' => 'app.incidences.create',
            'description' => 'Crear incidencias'
        ])->syncRoles([$roleAdmin, $roleIncidencesAdmin, $roleTeacher]);

        Permission::create([
            'name' => 'app.incidences.edit',
            'description' => 'Editar incidencias'
        ])->syncRoles([$roleAdmin, $roleIncidencesAdmin, $roleTeacher]);

        Permission::create([
            'name' => 'app.incidences.destroy',
            'description' => 'Eliminar incidencias'
        ])->syncRoles([$roleAdmin, $roleIncidencesAdmin, $roleTeacher]);


        // Permisos Users
        Permission::create([
            'name' => 'app.users.index',
            'description' => 'Ver listado de usuarios'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'app.users.edit',
            'description' => 'Asignar roles a usuarios'
        ])->syncRoles([$roleAdmin]);


        // Permisos Roles
        Permission::create([
            'name' => 'app.roles.index',
            'description' => 'Ver listado de roles'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'app.roles.edit',
            'description' => 'Editar roles'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'app.roles.create',
            'description' => 'Crear roles'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'app.roles.destroy',
            'description' => 'Eliminar roles'
        ])->syncRoles([$roleAdmin]);


        // Permisos Classrooms
        Permission::create([
            'name' => 'app.classrooms.index',
            'description' => 'Ver listado de aulas'
        ])->syncRoles([$roleAdmin, $roleTeacher]);

        Permission::create([
            'name' => 'app.classrooms.create',
            'description' => 'Crear aulas'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'app.classrooms.edit',
            'description' => 'Editar aulas'
        ])->syncRoles([$roleAdmin]);
        Permission::create([
            'name' => 'app.classrooms.destroy',
            'description' => 'Eliminar aulas'
        ])->syncRoles([$roleAdmin]);


        // Permisos Peripherals
        Permission::create([
            'name' => 'app.peripherals.index',
            'description' => 'Ver listado de perif??ricos'
        ])->syncRoles([$roleAdmin, $roleTeacher]);

        Permission::create([
            'name' => 'app.peripherals.show',
            'description' => 'Ver detalles del perif??rico'
        ])->syncRoles([$roleAdmin, $roleTeacher]);

        Permission::create([
            'name' => 'app.peripherals.create',
            'description' => 'Crear perif??ricos'
        ])->syncRoles([$roleAdmin]);
        Permission::create([
            'name' => 'app.peripherals.edit',
            'description' => 'Editar perif??ricos'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'app.peripherals.destroy',
            'description' => 'Eliminar perif??ricos'
        ])->syncRoles([$roleAdmin]);


        // Permisos Computers
        Permission::create([
            'name' => 'app.computers.index',
            'description' => 'Ver listado de ordenadores'
        ])->syncRoles([$roleAdmin, $roleTeacher]);

        Permission::create([
            'name' => 'app.computers.show',
            'description' => 'Ver detalles del ordenador'
        ])->syncRoles([$roleAdmin, $roleTeacher]);

        Permission::create([
            'name' => 'app.computers.create',
            'description' => 'Crear ordenadores'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'app.computers.edit',
            'description' => 'Editar ordenadores'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'app.computers.destroy',
            'description' => 'Eliminar ordenadores'
        ])->syncRoles([$roleAdmin]);


        // Permisos Students
        Permission::create([
            'name' => 'app.students.index',
            'description' => 'Ver listado de estudiantes'
        ])->syncRoles([$roleAdmin, $roleTeacher]);

        Permission::create([
            'name' => 'app.students.show',
            'description' => 'Ver detalles del alumno'
        ])->syncRoles([$roleAdmin, $roleTeacher]);

        Permission::create([
            'name' => 'app.students.create',
            'description' => 'Crear estudiantes'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'app.students.edit',
            'description' => 'Editar estudiantes'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'app.students.destroy',
            'description' => 'Eliminar estudianes'
        ])->syncRoles([$roleAdmin]);


        // Permisos ScholarGroup
        Permission::create([
            'name' => 'app.scholar_groups.index',
            'description' => 'Ver listado de grupos escolares'
        ])->syncRoles([$roleAdmin, $roleTeacher]);

        Permission::create([
            'name' => 'app.scholar_groups.show',
            'description' => 'Ver detalles del grupo escolar'
        ])->syncRoles([$roleAdmin, $roleTeacher]);

        Permission::create([
            'name' => 'app.scholar_groups.create',
            'description' => 'Crear grupos escolares'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'app.scholar_groups.edit',
            'description' => 'Editar grupos escolares'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'app.scholar_groups.destroy',
            'description' => 'Eliminar grupos escolares'
        ])->syncRoles([$roleAdmin]);
    }
}
