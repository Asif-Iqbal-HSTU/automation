<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Hall;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'uid'=>'superAdmin0',
            'email'=>'superAdmin0@gmail.com',
            'avatar'=>'avatarLink',
            'name'=>'superAdmin0',
            'password'=>Hash::make('superAdmin123'),
            'role'=>'superAdmin',
            'gender'=>'female',
            'dateOfBirth'=>'12-04-1994',
            'mobile'=>'01711111111',
            'nationality'=>'Bangladeshi'
        ]);
        User::create([
            'uid'=>'superAdmin1',
            'email'=>'superAdmin1@gmail.com',
            'avatar'=>'avatarLink',
            'name'=>'superAdmin1',
            'password'=>Hash::make('superAdmin123'),
            'role'=>'superAdmin',
            'gender'=>'male',
            'dateOfBirth'=>'12-04-1991',
            'mobile'=>'01711111222',
            'nationality'=>'Bangladeshi'
        ]);
        Department::create([
            'name'=>'Computer Science and Engineering',
            'chairman'=>'1',
            'chairmanMessage'=>'Hello, I am chairman ;)',
            'faculty'=>'1'
        ]);
        Department::create([
            'name'=>'Electronics and Electrical Engineering',
            'chairman'=>'1',
            'chairmanMessage'=>'Hello, I am chairman ;)',
            'faculty'=>'1'
        ]);
        Faculty::create([
            'name'=>'Computer Science and Engineering',
            'dean'=>'2',
            'deanMessage'=>'Hello, I am dean ;)'
        ]);
        Hall::create([
            'name'=>'Bangabandhu Sheikh Mujibur Rahman Hall',
            'super'=>'2'
        ]);
    }
}
