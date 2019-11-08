<?php

use App\Models\User;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        Permission::create(['name' => 'write posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'publish posts']);

        Permission::create(['name' => 'events']);
        Permission::create(['name' => 'examination period']);
        Permission::create(['name' => 'class scheduling']);
        Permission::create(['name' => 'manage students']);
        Permission::create(['name' => 'manage faculty']);
        Permission::create(['name' => 'grades masterlist']);
        Permission::create(['name' => 'manage curriculum']);
        Permission::create(['name' => 'manage registrar staff']);
        Permission::create(['name' => 'encoding of grades']);
        Permission::create(['name' => 'locking of grades']);
        Permission::create(['name' => 'alteration of grades']);
        Permission::create(['name' => 'upload summary of grades']);
        Permission::create(['name' => 'print summary of grades']);
        Permission::create(['name' => 'print curriculum']);
        Permission::create(['name' => 'print curriculum with grades']);
        Permission::create(['name' => 'print tor']);
        Permission::create(['name' => 'print student masterlist']);

        // Create Roles and Assign Created Permissions
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo(['write posts', 'edit posts', 'delete posts']);

        $role = Role::create(['name' => 'moderator']);
        $role->givePermissionTo(['publish posts', 'delete posts', 'edit posts']);

        $role = Role::create(['name' => 'head registrar']);
        $role->givePermissionTo(['manage registrar staff', 'grades masterlist']);

        $role = Role::create(['name' => 'registrar']);
        $role->givePermissionTo(['examination period', 'manage students', 'grades masterlist', 'manage curriculum', 'print summary of grades', 'print curriculum', 'print curriculum with grades', 'print tor', 'print student masterlist']);

        $role = Role::create(['name' => 'faculty']);
        $role->givePermissionTo(['encoding of grades', 'alteration of grades', 'upload summary of grades', 'print summary of grades']);

        $role = Role::create(['name' => 'student']);
        $role->givePermissionTo(['print curriculum', 'print curriculum with grades']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'super admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'hidden super admin']);
        $role->givePermissionTo(Permission::all());
    }
}
