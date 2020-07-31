<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        DB::table('roles')->insert([
            'name' => 'User',
            'slug' => 'user',
        ]);

        // TestDummy::times(20)->create('App\Post');
    }
}
