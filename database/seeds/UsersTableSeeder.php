<?php

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
        $admin = [
            'email'=>'priceshaolin@gmail.com',
            'password'=>bcrypt('khoa12312'),
            'name'=>'Admin'
        ];
        \App\User::create($admin);
        factory(App\User::class, 5)->create();
    }
}
