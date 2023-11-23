<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert(['admin_name' => 'admin', 'admin_password' => Hash::make('welcome'), 'created_at'=>now()]);
    }
}
