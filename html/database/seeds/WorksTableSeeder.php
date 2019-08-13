<?php

use Illuminate\Database\Seeder;
use App\Models\Work;

class WorksTableSeeder extends Seeder
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
        DB::table('works')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create('ja_JP');

        for ($i = 0; $i < 20; $i++) {
            $work = new Work();
            $work->title = "おしごと{$i}";
            $work->description = $faker->text();
            $work->reward = $faker->randomElement([10e3, 15e3, 18e3, 20e3]);
            $work->entry_end_at = $faker->dateTimeBetween('now', '+7 days');
            $work->owner_id = 1;
            $work->save();
        }
    }
}
