<?php

use Illuminate\Database\Seeder;

use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $c1 =Channel::create([
            'title' => 'Web Development',
            'slug' => 'web-development'
        ]);
        $c2 =Channel::create([
            'title' => 'Mobile Development',
            'slug' => 'mobile-development'
        ]);
        $c3 =Channel::create([
            'title' => 'Machine Learning',
            'slug' => 'machine-learning'
        ]);
        $c4 =Channel::create([
            'title' => 'Front End',
            'slug' => 'front-end'
        ]);
        
        
        
    }
}
