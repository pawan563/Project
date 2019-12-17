<?php

namespace App\Exports;
use App\Category;


use Maatwebsite\Excel\Concerns\FromCollection;

class ExelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Category::all();        
    }
}
