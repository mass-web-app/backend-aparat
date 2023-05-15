<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->createAdminUser();
        $this->createUser();
    }

    private function createAdminUser()
    {
        User::query()->create([
            'type'=>User::TYPE_ADMIN,
            'name'=>'مدیر اصلی',
            'email'=>'admin@gmail.com',
            'mobile'=>'+989358891586',
            'password'=>bcrypt('12345678')
        ]);
        $this->command->info('CREATE ADMIN USER');
    }

    private function createUser()
    {
        User::query()->create([
            'type'=>User::TYPE_USER,
            'name'=>'کاربر اول',
            'email'=>'user1@gmail.com',
            'mobile'=>'+989358891581',
            'password'=>bcrypt('12345678')
        ]);
        $this->command->info('CREATE User 1');
    }
}
