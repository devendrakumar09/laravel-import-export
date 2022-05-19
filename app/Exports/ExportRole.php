<?php

namespace App\Exports;

use App\Models\Role;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportRole implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'ID',
            'Name',
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
        return Role::select(
            'id',
            'name',
            'deleted_at',
            'created_at',
            'updated_at'
        )->get();
    }
}
