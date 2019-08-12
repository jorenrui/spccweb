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
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'publish posts']);

        // Create Roles and Assign Created Permissions
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo(['edit posts', 'delete posts', 'create posts']);

        $role = Role::create(['name' => 'moderator']);
        $role->givePermissionTo(['publish posts', 'delete posts']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        // Assign Roles
        $user = User::find(1);
        $user->assignRole('admin');

        $user = User::find(2);
        $user->assignRole('writer');

        $user = User::find(3);
        $user->assignRole('writer', 'moderator');
    }
}
