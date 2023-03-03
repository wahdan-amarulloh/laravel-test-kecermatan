<?php

namespace Database\Seeders;

use App\Models\QuestionDetail;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Question::factory(10)->has(QuestionDetail::factory(10), 'detail')->create();
    }
}
