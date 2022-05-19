<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportUser implements ToModel, WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'password' => 'secret',
        ]);
    }


    public function rules(): array
    {
        return [

             // Above is alias for as it always validates in batches
             '*.email' => ['required','unique:users,email'],
        ];
    }


    public function chunkSize(): int
    {
        return 1000;
    }
}
