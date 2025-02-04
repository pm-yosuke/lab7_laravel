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
        // Reset table
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('users')->insert([
            'name' => '中務陽介',
            'email' => 'yosuke_nakatsukasa@pressman.ne.jp',
            'password' => bcrypt('secret'),
        ]);

        $user = new User();
        $user->name = '中村太一';
        $user->email = 'taichi@asaichi.co.jp';
        $user->password = bcrypt('secret');
        $user->save();

        // factory(User::class, 20)->create();
    }
}
