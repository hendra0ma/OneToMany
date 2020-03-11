<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class eventsCalendar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_calendars')->insert([
        	[
        		'title'=> 'MyName',
        		'start'=> now(),
        		'end'=>now(),
        		'color'=> '#68c2f2',
        		'description'=>'myNameHendra',
        	],
        	[
        		'title'=> 'ini tile',
        		'start'=> now(),
        		'end'=>now(),
        		'color'=> '#68c2f2',
        		'description'=>'myNamepico',
        	],


        ]);
    }
}
