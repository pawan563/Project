<?php

namespace App\Repository;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Storage;
use App\ProductProductCategory;
use Illuminate\Database\Eloquent\Model;

class ProductRepository{

	
	public function getProduct(){
		//$books = App\Book::with('author')->get();

		return Product::with('Categories')->orderBy('id',"desc");
		 
		// echo '<pre>',
		// print_r($result),
		// '</pre>';
		//dd($result);
		
		//return Product::orderBy('id',"desc");
		
	} 

	public function getCategoryData(){
		return Category::all();

	}

	public function StoreProduct($request) {
		
		$filename = "";
		if ($request->hasFile('image')) {
		$file = $request->file('image');
		// generate a new filename. getClientOriginalExtension() for the file extension
		$filename = 'product-image-' . time() . '.' . $file->getClientOriginalExtension();		// save to storage/app/photos as the new $filename
		 $path = $file->storeAs('public/images', $filename);

		// $filePath = 'naval/images/' . $filename;
		// dd($filePath);
		// Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');

		}
		$product = new Product();
		$product->product_name = $request->input('product_name');
		$product->vks = $request->input('vks');
		$product->desription = $request->input('desription');
		//$category->product_category=$request->input('product_category');
		$product->status = $request->input('status');
		$product->price = $request->input('price');
		$product->image = $filename;
		$product->save();
		$product->Categories()->attach($request->product_category);
		//$product->categorys()->attach($category->id);
		//dd($request->product_category);
		return true;		
	}

	

	public function DeleteProductData($id){
		$product=Product::find($id);
		if ($product != null) {
		   $product->delete();
		   return redirect('products')->with(['message'=> 'Successfully deleted!!']);
		}
		return redirect('products')->with(['message'=> 'Wrong ID!!']);
	}

	
	Public function EditProductData($id)
	{
        return Product::where('id', $id)->first();
	}


	public function UpdateProductData($req, $id)
	{	
	return Product::where('id', $id)
		 ->update($req->except('_token','submit', '_method'));	
	}


}
   

