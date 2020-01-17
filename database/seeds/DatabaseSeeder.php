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

        factory(\App\User::class, 1)->create([
            'name' => 'Juan Castaño',
            'email' => 'jcastano1997@gmail.com',
            'password' => bcrypt('12345678'),
        ])->each(function ($user1) {
            $adviser1 = factory(\App\Adviser::class)->make();
            $adviser1->user_id = $user1->id;
            $adviser1->save();
            $adviser1->assigments()->create([
                'start'=>'2020-01-01 00:00:00',
                'finish'=>'2020-01-30 23:59:59',
                'station_id'=>1,
            ]);
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
