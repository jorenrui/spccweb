<?php

use App\Models\Event;

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->delete();

        $event = new Event;
        $event->title = 'Start of Enrollment';
        $event->start_date = '2020-05-20';
        $event->end_date = '2020-05-20';
        $event->save();

        $event = new Event;
        $event->title = 'End of Enrollment';
        $event->start_date = '2020-06-22';
        $event->end_date = '2020-06-22';
        $event->save();

        $event = new Event;
        $event->title = 'Start of Classes';
        $event->start_date = '2020-06-24';
        $event->end_date = '2020-06-24';
        $event->save();

        $event = new Event;
        $event->title = 'Prelims Examination';
        $event->start_date = '2020-07-29';
        $event->end_date = '2020-07-31';
        $event->save();
    }
}
