<?php

use Illuminate\Database\Seeder;
Use App\Theme;
class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Theme::class,5)->create();
    }
}
