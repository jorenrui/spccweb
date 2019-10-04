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
        $event->event_id = 1;
        $event->title = 'Prelims Examination';
        $event->start_date = '2019-07-29';
        $event->end_date = '2019-08-02';
        $event->save();

        $event = new Event;
        $event->event_id = 2;
        $event->title = 'Midterms Examination';
        $event->start_date = '2019-09-09';
        $event->end_date = '2019-09-13';
        $event->save();

        $event = new Event;
        $event->event_id = 3;
        $event->title = 'Finals Examination';
        $event->start_date = '2019-10-21';
        $event->end_date = '2019-10-25';
        $event->save();

        $event = new Event;
        $event->event_id = 4;
        $event->title = 'CIT Week';
        $event->start_date = '2019-10-21';
        $event->end_date = '2019-10-25';
        $event->save();

        $event = new Event;
        $event->event_id = 5;
        $event->title = 'Submission of Grades';
        $event->start_date = '2019-10-26';
        $event->end_date = '2019-10-30';
        $event->save();

        $event = new Event;
        $event->event_id = 6;
        $event->title = 'Enrollment for 2nd Sem';
        $event->start_date = '2019-11-04';
        $event->end_date = '2019-11-08';
        $event->save();
    }
}
