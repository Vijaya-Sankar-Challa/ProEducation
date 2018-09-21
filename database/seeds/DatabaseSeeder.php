<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\User::class, 100)->create();
        // $this->call(UsersTableSeeder::class);
        factory(App\ProjectCategories::class, 100)->create();
        factory(App\ProjectSubCategories::class, 100)->create();
        factory(App\Skills::class, 100)->create();
        factory(App\SubSkills::class, 100)->create();
        factory(App\Project::class, 100)->create();
    }
}
