<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'admin', 'mine_type' => 'add,edit,update,delete'],
            ['id' => 2, 'name' => 'mananger', 'mine_type' => 'add,edit,update,delete'],
            ['id' => 3, 'name' => 'poster', 'mine_type' => 'add,edit,update,delete'],
            ['id' => 5, 'name' => 'non', 'mine_type' => ''],

        ]);
        DB::table('users')->insert([
            'username' => 'truongvanlam', 'name' => 'Truong Van Lam', 'email' => 'i2.tvl.97@gmail.com', 'password' => bcrypt('tvl0543857718'), 'status' => '1', 'role_id' => '1'
        ]);
    }
}
