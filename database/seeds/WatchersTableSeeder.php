<?php

use Illuminate\Database\Seeder;

use App\Watcher;

class WatchersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $w1 =Watcher::create([
            'user_id' => 1,
            'discussion_id' => 1
        ]);
        $w2 =Watcher::create([
            'user_id' => 2,
            'discussion_id' => 2
        ]);
        $w3 =Watcher::create([
            'user_id' => 3,
            'discussion_id' => 3
        ]);
        
    }
}
