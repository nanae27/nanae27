<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'サンプル',
            'email' => 'sample@gmail.com',
            'email_verified_at' => Carbon::now(),
            'profile' => 'さんぷる',
            'password' => Hash::make("my-special-secret"),
            'remember_token' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'del_flg' => 0,
            'role' => 1,

        ]);
    }
}
