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
        Permission::create(['name' => 'app.dashboard'])->syncRoles([$roleAdmin, $roleTeacher]);

        // Permisos Incidences
        Permission::create(['name' => 'app.incidences.index'])->syncRoles([$roleAdmin, $roleIncidencesAdmin, $roleTeacher]);
        Permission::create(['name' => 'app.incidences.show'])->syncRoles([$roleAdmin, $roleIncidencesAdmin, $roleTeacher]);
        Permission::create(['name' => 'app.incidences.create'])->syncRoles([$roleAdmin, $roleIncidencesAdmin, $roleTeacher]);
        Permission::create(['name' => 'app.incidences.edit'])->syncRoles([$roleAdmin, $roleIncidencesAdmin, $roleTeacher]);
        Permission::create(['name' => 'app.incidences.destroy'])->syncRoles([$roleAdmin, $roleIncidencesAdmin, $roleTeacher]);

        // Permisos Users
        Permission::create(['name' => 'app.users.index'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'app.users.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'app.users.edit'])->syncRoles([$roleAdmin]);

        // Permisos Classrooms
        Permission::create(['name' => 'app.classrooms.index'])->syncRoles([$roleAdmin, $roleTeacher]);
        Permission::create(['name' => 'app.classrooms.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'app.classrooms.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'app.classrooms.destroy'])->syncRoles([$roleAdmin]);

        // Permisos Peripherals
        Permission::create(['name' => 'app.peripherals.index'])->syncRoles([$roleAdmin, $roleTeacher]);
        Permission::create(['name' => 'app.peripherals.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'app.peripherals.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'app.peripherals.destroy'])->syncRoles([$roleAdmin]);

        // Permisos Computers
        Permission::create(['name' => 'app.computers.index'])->syncRoles([$roleAdmin, $roleTeacher]);
        Permission::create(['name' => 'app.computers.show'])->syncRoles([$roleAdmin, $roleTeacher]);
        Permission::create(['name' => 'app.computers.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'app.computers.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'app.computers.destroy'])->syncRoles([$roleAdmin]);

        // Permisos Students
        Permission::create(['name' => 'app.students.index'])->syncRoles([$roleAdmin, $roleTeacher]);
        Permission::create(['name' => 'app.students.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'app.students.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'app.students.destroy'])->syncRoles([$roleAdmin]);

        // Permisos ScholarGroup
        Permission::create(['name' => 'app.scholargroup.index'])->syncRoles([$roleAdmin, $roleTeacher]);
        Permission::create(['name' => 'app.scholargroup.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'app.scholargroup.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'app.scholargroup.destroy'])->syncRoles([$roleAdmin]);
    }
}
