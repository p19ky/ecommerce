<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // if (DB::table('users')->where('email', 'admin@example.com')->count() == 0) {
            DB::table('users')->insert([
                'role_id'     => '1',
                'name'        => 'Admin',
                'username'    => 'Demo Admin',
                'email'    => 'admin@example.com',
                'password' => bcrypt('admin'),
            ]);

            DB::table('users')->insert([
                'role_id'     => '2',
                'name'        => 'User',
                'username'    => 'Demo User',
                'email'    => 'user@example.com',
                'password' => bcrypt('user'),
            ]);
        // }

        // factory(User::class, 131)->create();
    }
}
