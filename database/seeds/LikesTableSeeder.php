<?php

use Illuminate\Database\Seeder;

use App\Like;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $l1 =Like::create([
            'user_id' => 1,
            'reply_id' => 1
        ]);
        $l2 =Like::create([
            'user_id' => 2,
            'reply_id' => 2
        ]);
        $l3 =Like::create([
            'user_id' => 3,
            'reply_id' => 3
        ]);
        
        
    }
}
