<?php

use Illuminate\Database\Seeder;

class PostsTabeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'id' => 1,
            'user_id' => 1,
            'title' => 'テスト',
            'episode' => 'サンプル1',
            'image' => '画像',
            'del_flg' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        
        ]);
    }
}
