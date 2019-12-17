<?php

namespace App\Repository;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class CategoryRepository{

	public function getCategory(){
		return Category::paginate(2);

	}

	public function getStoreCategory($req) {
		return Category::create($req->except('_token','submit'));
	
	}

	public function EditCategoryData($id){
		return Category::where('id', $id)->first();
	}

	public function getUpdateData($req, $id)
	{
		return Category::where('id',$id)
		->update($req->except('_token','submit', '_method'));
	}

	public function getDeleteCategoryData($id){
		$category=Category::findorfail($id);
		if ($category != null) {
			$category->delete();
			return redirect('products')->with(['message'=> 'Successfully deleted!!']);
		}
	}




	



}
   

