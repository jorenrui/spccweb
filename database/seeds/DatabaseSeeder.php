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
            Course2012TableSeeder::class,
            Course2018TableSeeder::class,
            CurriculumTableSeeder::class,
            CurriculumDetails2012TableSeeder::class,
            CurriculumDetails2018TableSeeder::class,
            Prerequisite2012TableSeeder::class,
            Prerequisite2018TableSeeder::class,
            SettingsTableSeeder::class,
        ]);
    }
}
