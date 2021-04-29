<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use App\Models\Workshop;
use App\Models\Event;
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
        DB::transaction(function($table) {
            $lcon1 = Event::create([
                'name' => 'Laravel convention 2020'
            ]);

            Workshop::create([
                'start' => '2020/02/21 10:00',
                'end' => '2020/02/21 16:00',
                'name' => 'Illuminate your knowledge of the laravel code base',
                'event_id' => $lcon1->id
            ]);

            $lcon2 = Event::create([
                'name' => 'Laravel convention 2021'
            ]);

            Workshop::create([
                'start' => '2021/10/21 10:00',
                'end' => '2021/10/21 18:00',
                'name' => 'The new Eloquent - load more with less',
                'event_id' => $lcon2->id
            ]);

            Workshop::create([
                'start' => '2021/11/21 09:00',
                'end' => '2021/11/21 17:00',
                'name' => 'AutoEx - handles exceptions 100% automatic',
                'event_id' => $lcon2->id
            ]);

            $rcon = Event::create([
                'name' => 'React convention 2021'
            ]);

            Workshop::create([
                'start' => '2021/08/21 10:00',
                'end' => '2021/08/21 18:00',
                'name' => '#NoClass pure functional programming',
                'event_id' => $rcon->id
            ]);

            Workshop::create([
                'start' => '2021/08/21 09:00',
                'end' => '2021/08/21 17:00',
                'name' => 'Navigating the function jungle',
                'event_id' => $rcon->id
            ]);

            $rootItem = MenuItem::create([
                'name' => 'All events',
                'url' => '/events',
            ]);

            $laraconItem = MenuItem::create([
                'name' => 'Laracon',
                'url' => '/events/laracon',
                'parent_id' => $rootItem->id
            ]);

            MenuItem::create([
                'name' => 'Illuminate your knowledge of the laravel code base',
                'url' => '/events/laracon/workshops/illuminate',
                'parent_id' => $laraconItem->id
            ]);

            MenuItem::create([
                'name' => 'The new Eloquent - load more with less',
                'url' => '/events/laracon/workshops/eloquent',
                'parent_id' => $laraconItem->id
            ]);

            $reactconItem = MenuItem::create([
                'name' => 'Reactcon',
                'url' => '/events/reactcon',
                'parent_id' => $rootItem->id
            ]);

            MenuItem::create([
                'name' => '#NoClass pure functional programming',
                'url' => '/events/reactcon/workshops/noclass',
                'parent_id' => $reactconItem->id
            ]);

            MenuItem::create([
                'name' => 'Navigating the function jungle',
                'url' => '/events/reactcon/workshops/jungle',
                'parent_id' => $reactconItem->id
            ]);


        });
    }
}
