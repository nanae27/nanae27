<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class Violate_listsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('violate_lists')->insert([
            'id' => 1,
            'user_id' => 1,
            'post_id' => 1,
            'title' => 'てすと',
            'violate_comment' => 'テスト1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
    

        ]); 
    }
}
