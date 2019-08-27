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
        $this->call([
            UsersTableSeeder::class,
            RolesAndPermissionsSeeder::class,
            PostsTableSeeder::class,
            EventsTableSeeder::class,
            AcadTermTableSeeder::class,
            CurriculumTableSeeder::class,
            SettingsTableSeeder::class,
        ]);
    }
}
