<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('questions')->insert([
            'questiontext' => str_random(10),
            'cid' => 1,
            'sid' => 1,
        ]);
    }
}
