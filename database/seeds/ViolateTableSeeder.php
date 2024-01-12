<?php

use Illuminate\Database\Seeder;

class ViolateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('violate')->insert([
            'id' => 1,
            'user_id' => 1,
            'post_id' => 1,
            'violate_comment' => 'テスト1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
    

        ]); 
    }
}
