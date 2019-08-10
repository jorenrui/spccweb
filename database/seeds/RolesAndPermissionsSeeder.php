<?php

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
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'publish posts']);
        Permission::create(['name' => 'unpublish posts']);

        // Create Roles and Assign Created Permissions
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo(['edit posts', 'delete posts', 'create posts', 'unpublish posts']);

        $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish posts', 'unpublish posts']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
