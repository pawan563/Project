<?php

namespace App\Repository;
use App\Category;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class EcomRepository{

	
    public function countData(){
     
    $data['product'] = Product::count();
    $data['category'] = Category::count();
    return $data;

    }

	
}
   

