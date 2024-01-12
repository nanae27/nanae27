<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class Comment_listTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment_list')->insert([
            'id' => 1,
            'user_id' => 1,
            'post_id' => 1,
            'post_comment' => 'てすと1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    
    }
}
