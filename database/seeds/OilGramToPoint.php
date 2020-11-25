<?php

use Illuminate\Database\Seeder;

class OilGramToPoint extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $oilGramToPoint = new \App\Models\OilGramToPoint;
        $oilGramToPoint->grams = 1;
        $oilGramToPoint->points = 1;
        $oilGramToPoint->user_id = 1;
        $oilGramToPoint->save();
    }
}
