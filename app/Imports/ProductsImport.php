<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{

    public function headingRow() :int
    {
        return 1;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'=>$row['name'],
            'desc'=>$row['desc'],
            'image'=>$row['image'],
            'price'=>$row['price'],
            'category_id'=>$row['category_id']

        ]);
    }
}
