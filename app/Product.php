<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_id','product_name','desription','vks','price','image','status'];

   
    public function Categories()
    { 
     return $this->belongsToMany('App\Category', 'product_product_categories','category_id','product_id')->withPivot('product_category');
    }

    // public function categorys()
    // {
    //     return $this->belongsToMany(Category::class,'product_product_categories');
    // }

    // protected $table = 'categories';

    // public function posts() {
    //   return $this->belongsToMany('App\Category');

    //  // Or more specifically
    //  return $this->belo ngsToMany('App\Category', 'post_category', 'id', 'post_id');
    // }

}

