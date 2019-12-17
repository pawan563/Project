<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys';
    protected $fillable = ['category_id','category_name','category_desc','status'];

    public function Products()
    { 
     return $this->belongsToMany('App\Product');
    }


    // public function Products()
    // { 
    //  return $this->belongsToMany(Product::class,'product_product_categories');
    // }


}
