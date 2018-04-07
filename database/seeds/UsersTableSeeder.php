<?php

use Illuminate\Database\Seeder;
use App\Model\User\User;

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
        	'firstname' => 'Admin',
        	'middlename' => 'Admin',
        	'surname' => 'Admin',
        	'email' => 'admin@admin.com',
            'username' => 'admin',
        	'password' => bcrypt('admin123'),
            'role' => 'Admin'
        ]);

        User::create([
            'firstname' => 'P1',
            'middlename' => 'Admin',
            'surname' => 'Admin',
            'email' => 'p1@admin.com',
            'username' => 'P1',
            'password' => bcrypt('admin123'),
            'role' => 'P1',
            'parent_id' => '1'
        ]);

        User::create([
            'firstname' => 'P2',
            'middlename' => 'Admin',
            'surname' => 'Admin',
            'email' => 'p2@admin.com',
            'username' => 'P2',
            'password' => bcrypt('admin123'),
            'role' => 'P2',
            'parent_id' => '2'
        ]);

        User::create([
            'firstname' => 'P3',
            'middlename' => 'Admin',
            'surname' => 'Admin',
            'email' => 'p3@admin.com',
            'username' => 'P3',
            'password' => bcrypt('admin123'),
            'role' => 'P3',
            'parent_id' => '3'
        ]);
    }
}
