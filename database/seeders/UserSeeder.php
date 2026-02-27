<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin
        User::updateOrCreate([
            'email' => 'admin@koperasi.com',
            'name' => 'Admin',
            'password'=> Hash::make('12345678'),
                'role' => 'admin',
        ]);
        //bendahara
        User::updateOrCreate([
            'email' => 'bendahara@koperasi.com',
            'name' => 'Bendahara',
            'password'=> Hash::make('12345678'),
                'role' => 'bendahara',
            
        ]);
    }   
}
