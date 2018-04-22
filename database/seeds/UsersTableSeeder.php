<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $u1 =User::create([
            'is_active' => 0,
            'is_admin' => 0,
            'avatar' => 'uploads/avatars/avatar.png',
            'name' => 'Tim',
            'email' => 'tim_humble@hotmail.com',
            'password' => bcrypt(123456)
        ]);
        $u2 =User::create([
            'is_active' => 1,
            'is_admin' => 0,
            'avatar' => 'uploads/avatars/avatar.png',
            'name' => 'Tim',
            'email' => 'andy_james@hotmail.com',
            'password' => bcrypt(123456)
        ]);
        $u3 =User::create([
            'is_active' => 1,
            'is_admin' => 0,
            'avatar' => 'uploads/avatars/avatar.png',
            'name' => 'Tim',
            'email' => 'chris_paul@hotmail.com',
            'password' => bcrypt(123456)
        ]);
        
        
    }
    
}
