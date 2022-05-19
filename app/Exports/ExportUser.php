<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUser implements FromCollection,WithHeadings
{
    public function headings(): array
    {
        return [
            'ID',
            'Role',
            'Name',
            'Email',
            'Deleted At',
            'Created At',
            'Updated At',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id','role_id','name','email','deleted_at','created_at','updated_at')->get();
    }
}
