<?php

use App\Category;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        DB::table('users')->truncate();
        DB::table('categories')->truncate();

        factory(User::class, 50)->create();
        factory(Category::class, 15)->create();
    }
}
