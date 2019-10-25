<?php

use App\Models\Activity;

use Illuminate\Database\Seeder;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity')->delete();

        $activity = new Activity;
        $activity->user_id = 2;
        $activity->description = 'started the system for the first time.';
        $activity->timestamp = now();
        $activity->save();
    }
}
