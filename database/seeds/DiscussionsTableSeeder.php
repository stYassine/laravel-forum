<?php

use Illuminate\Database\Seeder;

use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $d1 =Discussion::create([
            'is_active' => 1,
            'channel_id' => 1,
            'user_id' => 1,
            'title' => 'Learn Laravel',
            'slug' => 'learn-laravel',
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s'
        ]);
        $d2 =Discussion::create([
            'is_active' => 0,
            'channel_id' => 2,
            'user_id' => 2,
            'title' => 'Learn Angular',
            'slug' => 'learn-angular',
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s'
        ]);
        $d3 =Discussion::create([
            'is_active' => 1,
            'channel_id' => 3,
            'user_id' => 3,
            'title' => 'Learn Android',
            'slug' => 'learn-android',
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s'
        ]);
        
        
    }
}
