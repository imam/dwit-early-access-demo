<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->each(function($user){
            FeedManager::followUser($user->id, $user->id);
            for($i=0;$i<=20;$i++){
                $user->dweet()->save(factory(App\Dweet::class)->make());
            }
        });
    }
}
