<?php

use Illuminate\Database\Seeder;

use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $r1 =Reply::create([
            'is_active' => 1,
            'user_id' => 1,
            'discussion_id' => 1,
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'
        ]);
        $r2 =Reply::create([
            'is_active' => 0,
            'user_id' => 2,
            'discussion_id' => 2,
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'
        ]);
        $r3 =Reply::create([
            'is_active' => 0,
            'user_id' => 3,
            'discussion_id' => 3,
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'
        ]);
        
        
    }
}
