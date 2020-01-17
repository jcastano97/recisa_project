<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Client::class, 50)->create();
        factory(\App\Station::class, 5)->create()->each(function ($station) {
            factory(\App\Card::class, 5)->create()->each(function ($card) use ($station) {
                \App\Inventory::create([
                    'station_id' => $station->id,
                    'card_id' => $card->id
                ]);
            });
        });
        factory(App\User::class, 20)->create()->each(function ($user) {
            $adviser = factory(\App\Adviser::class)->make();
            $adviser->user_id = $user->id;
            $adviser->save();
        });
        /*
        factory(App\User::class, 50)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make());
        });
        */
    }
}
