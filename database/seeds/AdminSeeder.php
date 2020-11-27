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
        $admin->email = "admin@admin.com";
        $admin->password = \Illuminate\Support\Facades\Hash::make('123456789');
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

        $employee = new \App\User;
        $employee->user_id = 00001;
        $employee->name = "ahmed";
        $employee->email = "ahmed@yahoo.com";
        $employee->password = \Illuminate\Support\Facades\Hash::make('123456789');
        $employee->phone = "0123456789";
        $employee->NID = "0123456789";
        $employee->save();

        $assignEmployeeRole = new App\Models\UserRole;
        $assignEmployeeRole->user_id = $employee->id;
        $assignEmployeeRole->role_id = $employeeRole->id;
        $assignEmployeeRole->save();


    }
}
