<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CategoryPostVal;
use App\Repository\CategoryRepository;
use App\Exports\ExelExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Category;
use App\Product;



class CategoryController extends Controller
{

    protected $categoryData;
        public function __construct(CategoryRepository $categoryData){
        $this->middleware('auth');
        $this->category = $categoryData;
    }

    
    public function index(Request $request)
    {
        $result=$this->category->getCategory();
        if($request->ajax()){
            return view('category/catlisting', compact('result'));
        }
        return view('category/showcategory', compact('result'));
    
    }

   
    public function create(Request $req)
    {
        return view('category.addcategory');
    }

   
    public function store(CategoryPostVal $req)
    {
       $category=$this->category->getStorecategory($req);
       return redirect('category')->with('success','
       Add Successfully');
        // if($category) {
        //  return redirect('category')->with('success', 'Category Add successfully');    
        // }
        //  return redirect()->back()->with('success', 'somthig wrong');
    }


    public function show(category $category)
    {
        
    }

 
    public function edit($id)
    {
       $result=$this->category->EditCategoryData($id);

       return view('category.addcategory',compact('result'));
    }

    
    public function update(CategoryPostVal $req,$id)
    {
        $result=$this->category->getUpdateData($req,$id);
        if($result){
        return redirect('category')->with('success','Update successfully');
		}else{
		return redirect()->back()->with('success', 'somethig wrong'); 
        }
        
    }

    function destroy($id)
    {
        $category=$this->category->getDeleteCategoryData($id);       
        return response()->json([
            'data' => 'message Delete Succesfully'
         ]);    
    }

    public function categorysearch(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $result=Category::where('category_name','LIKE','%'.$request->search."%")
                            ->orwhere('category_desc','LIKE','%'.$request->search."%")->paginate(2);
            if ($result) {
                return view('category.catlisting', compact('result'))->render();
            }

        }
    }

    public function export() 
    {
        return Excel::download(new ExelExport, 'categorys.xls');
    }
}
