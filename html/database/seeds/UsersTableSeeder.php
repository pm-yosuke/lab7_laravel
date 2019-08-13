<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => '中村太一',
        //     'email' => 'taich@asaichi.co.jp',
        //     'password' => bcrypt('secret'),
        // ]);

        // $user =  new User();
        // $user->name = '中村太一２';
        // $user->email = 'taichi+2@asaichi.co.jp';
        // $user->password = bcrypt('secret');
        // $user->save();

        factory(User::class, 20)->create();
    }
}
