<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('answers')->insert([
            'qid' => 1,
            'answertext' => str_random(10),
            'istrue' => true,
        ]);
        DB::table('answers')->insert([
            'qid' => 1,
            'answertext' => str_random(10),
            'istrue' => false,
        ]);
        DB::table('answers')->insert([
            'qid' => 1,
            'answertext' => str_random(10),
            'istrue' => false,
        ]);
        DB::table('answers')->insert([
            'qid' => 1,
            'answertext' => str_random(10),
            'istrue' => false,
        ]);
    }
}
