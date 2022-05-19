<?php

namespace App\Imports;

use App\Models\Role;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportRoleWithUsers implements ToCollection,WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $role = Role::create([
                'name' => $row['role'],
            ]);
            $role->user()->create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => $row['password'],
            ]);
        }
    }
}
