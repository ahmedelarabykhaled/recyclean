<?php

use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $employee = new \App\User;
        $employee->user_id = rand(111111,888888);
        $employee->name = "3laafouad";
        $employee->email = "3laafouad@rc.com";
        $employee->password = \Illuminate\Support\Facades\Hash::make('3laafouad');
        $employee->phone = "0123456789";
        $employee->NID = "0123456789";
        $employee->save();

        $assignEmployeeRole = new App\Models\UserRole;
        $assignEmployeeRole->user_id = $employee->id;
        $assignEmployeeRole->role_id = 2;
        $assignEmployeeRole->save();

        $employee = new \App\User;
        $employee->user_id = rand(111111,888888);
        $employee->name = "mohamedfaid";
        $employee->email = "mohamedfaid@rc.com";
        $employee->password = \Illuminate\Support\Facades\Hash::make('mohamedfaid');
        $employee->phone = "0123456789";
        $employee->NID = "0123456789";
        $employee->save();

        $assignEmployeeRole = new App\Models\UserRole;
        $assignEmployeeRole->user_id = $employee->id;
        $assignEmployeeRole->role_id = 2;
        $assignEmployeeRole->save();

    }
}
