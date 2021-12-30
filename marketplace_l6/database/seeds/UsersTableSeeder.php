<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

             'name' => 'vanilson',
             'email' => 'vanilsonmuhongo@outlook.pt',
             'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password


         ]);
        User::create([

             'name' => 'lucio',
             'email' => 'lucio@example.com',
             'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password


         ]);
         User::create([

             'name' => 'leonildo',
             'email' => 'leonildo@example.ao',
             'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password


         ]);
         User::create([

             'name' => 'nadia',
             'email' => 'nadia@gmail.com',
             'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password


         ]);

        //factory(App\User::class, 100)->create();
    }
}
