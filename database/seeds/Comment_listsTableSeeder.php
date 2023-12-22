<?php

use Illuminate\Database\Seeder;

class Comment_listsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment_lists')->insert([
            'id' => 1,
            'user_id' => 1,
            'post_id' => 1,
            'post_comment' => 'てすと1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
