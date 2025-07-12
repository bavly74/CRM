<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('user');
        });

        $admin = User::create([
            'name'=>'bavly' ,
            'email'=>'bavly@gmail.com' ,
            'password' =>bcrypt('123456789')
        ]);
        $admin->assignRole('admin') ;
    }
}
