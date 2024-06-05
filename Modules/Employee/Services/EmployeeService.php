<?php

namespace Modules\Employee\Services;

use Modules\Employee\Entities\Employee;

class EmployeeService{

    // Create Employee
    public function createEmployee($user){
        Employee::create([
            'company_id' => $user->company_id,
            'user_id' => $user->id,
            'date_of_hire' => now(),
        ]);
    }

}