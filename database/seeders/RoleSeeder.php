<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'admin',
            'user',
            'editor',
            'vendor',
            'viewer',
        ];

        foreach ($data as $item) {
            $ins = new Role;
            $ins->name = $item;
            $ins->save();
        }
    }
}
