<?php
namespace App\Validation;

use App\Models\Is_admin;
use App\Models\Is_students;

class UserRules
{
    public function validateAdmin(string $str, string $fields, array $data)
    {
        $is_admin = new Is_admin();
        $admin = $is_admin->where('user_name', $data['user_name'])
            ->first();

        if (!$admin) {
            return false;
        }

        return password_verify($data['password'], $admin['password']);
    }
    public function validateUsers(string $str, string $fields, array $data)
    {
        $is_students = new Is_students();
        $student = $is_students->where(['user_name' => $data['user_name'],'user_fname' => $data['user_fname'], 'nce' => $data['nce']])
                               ->first();

        if (!$student) {
            return false;
        }

        return password_verify($data['password'], $student['password']);
    }
}


?>