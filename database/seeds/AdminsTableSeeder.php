<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;
        $admin->name='amir';
        $admin->email='amir.sa@gmail.com';
        $admin->password=bcrypt('alauddin');
        $admin->type='admin';
        $admin->status=1;
        $admin->mobile='9999999999';
        $admin->save();
    }
}
