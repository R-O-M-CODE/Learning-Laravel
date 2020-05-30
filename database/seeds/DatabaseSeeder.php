<?php

use App\Post;
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('users')->truncate();
        DB::table('posts')->truncate();

        factory(User::class, 10)->create()->each(function ($user){
            $user->posts()->save(factory(Post::class)->make());
        });
//         $this->call(UsersTableSeeder::class);
    }
}
