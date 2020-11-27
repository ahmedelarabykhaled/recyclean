<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\User;
        $admin->user_id = 00000;
        $admin->name = "admin";
        $admin->email = "recycleanm@rc.com";
        $admin->password = \Illuminate\Support\Facades\Hash::make('01221494940');
        $admin->phone = "0123456789";
        $admin->NID = "0123456789";
        $admin->save();

        $adminRole = new App\Models\Role;
        $adminRole->name = "admin";
        $adminRole->save();

        $employeeRole = new App\Models\Role;
        $employeeRole->name = 'employee';
        $employeeRole->save();

        $assignAdminRole = new App\Models\UserRole;
        $assignAdminRole->user_id = $admin->id;
        $assignAdminRole->role_id = $adminRole->id;
        $assignAdminRole->save();


    }
}
