<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryPostVal;
use App\Repository\CategoryRepository;
use App\Category;
use App\User;

class CategoryController extends Controller
{

    protected $category;
    public function __construct(CategoryRepository $categoryData){
    $this->category = $categoryData;
    }
   

    public function index()
    {
     
        return response()->json(['data'=>Category::all()]);
     
    }


    public function store(Request $req)
    {
        dd($req);
         $category=$this->category->getStorecategory($req);      
       return response()->json(['Result' => 'message send Succesfully'],400);
    }



    public function update(Request $req, $id)
    {
        $result=$this->category->getUpdateData($req,$id);
        return response()->json(['data'=>'Update Succesfully']);
    }


    public function destroy($id)
    {
        $category=$this->category->getDeleteCategoryData($id);       
        return response()->json(['data' => 'message Delete Succesfully' ]);         
    }


    public function register(Request $request)
    {
        $user = User::create([
             'name' =>$request->name,
             'email'    => $request->email,
             'password' => $request->password,
         ]);

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }
    

    public function login(Request $request)
    {
        $credentials =$request->only('email','password');
        //dd($credentials);
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);

        }
    
        return $this->respondWithToken($token);
//        return response()->json(['token'=>$token]);

    }


    protected function respondWithToken($token)
    {
      return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth('api')->factory()->getTTL() * 60
      ]);
    }

    public function getuser()
    {
        $user=auth('api')->user();
        // dd($user);
        return $user ;

    }

}
