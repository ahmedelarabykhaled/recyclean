<?php

use Illuminate\Database\Seeder;

class TrashSubscription extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ts = new App\Models\TrashSubscription;
        $ts->coast = 100;
        $ts->user_id = 1;
        $ts->save();
    }
}
