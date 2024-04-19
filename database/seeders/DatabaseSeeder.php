<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ClassRoom;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'role'  => 'admin'
        ]);
        Role::create([
            'role'  => 'teacher'
        ]);
        Role::create([
            'role'  => 'student'
        ]);

        ClassRoom::create([
            'class' => 'A'
        ]);
        ClassRoom::create([
            'class' => 'B'
        ]);
        ClassRoom::create([
            'class' => 'C'
        ]);

        User::create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => '1'
        ]);
        User::create([
            'name'      => 'teacher',
            'email'     => 'teacher@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => '2'
        ]);
        User::create([
            'name'      => 'Alex Bachtiar',
            'email'     => 'alex@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => '2'
        ]);
        User::create([
            'name'      => 'Robert Davis Chaniago',
            'email'     => 'robert@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => '3',
            'class_id'  => '1'
        ]);
    }
}
