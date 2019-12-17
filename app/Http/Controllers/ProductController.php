<?php
namespace App\Http\Controllers;
use App\Http\Controllers\ProductController;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductPostVal;
use App\Product;
use App\Category;


class ProductController extends Controller
{

    protected $productData;
    public function __construct(ProductRepository $productData)
    {
        $this->middleware('auth');
        $this->product = $productData;
    }

    public function index(Request $request)
    {
        $result = $this->product->getProduct();
        
        $result = $this->filters($result,$request);

        $result = $result->paginate(3);
        if($request->ajax()){

            return view('product/listing', compact('result'));
        }
        return view('product/showproduct', compact('result'));
    }

    public function create()
    {
        $catid = $this->product->getCategoryData();
        return view('product/addproduct', compact('catid'));

    }

    public function store(ProductPostVal $req)
    {
        try
        {
            $result = $this->product->StoreProduct($req);
            dd($result);
            if ($result)
            {
                return response()->json(['message' => 'Product Insertion Success', 'path' => url('/products') ], 200);
            }
            else
            {
                return response()->json(['message' => 'Insertion failed'], 400);
            }
        }
        catch(\Exception $err)
        {
            return response()->json(['message' => $err->getMessage() ], 404);
        }
    }

    public function show($id)
    {
        //
        
    }

    public function edit($id)
    {
        $catid = $this->product->getCategoryData();
        $data = $this->product->EditProductData($id);
        return view('product.addproduct', compact('data', 'catid'));

    }

    public function update(ProductPostVal $req, $id)
    {
        $product = $this->product->UpdateProductData($req, $id);

    }

    public function destroy($id)
    {
        $result = $this->product->DeleteProductData($id);
        return response()->json(['data' => 'message Delete Succesfully']);
       //$data = $this->product->DeleteProductData($id);
        //$response=response()->json(['message' => $data['message'], 'redirectTo' => route('products.index')], $data['http_status']);    
    }

    public function search(Request $request)
    {
        if ($request->ajax())   
        {
            $output = "";
            $result = Product::where('product_name', 'LIKE', '%' . $request->search . "%")
                ->orwhere('product_category', 'LIKE', '%' . $request->search . "%")
                ->orwhere('desription', 'LIKE', '%' . $request->search . "%")
                ->orwhere('vks', 'LIKE', '%' . $request->search . "%")
                ->orwhere('price', 'LIKE', '%' . $request->search . "%")
                ->orwhere('status', 'LIKE', '%' . $request->search . "%")
                ->paginate(3);
            if ($result)
            {
                return view('product.listing', compact('result'))->render();
            }

        }
    }

    public function filters($model , $request)
    {
        
        if ( $request->status != '')
        {
            $model =  $model->where('status', 'LIKE', '%' . $request->status . "%");

        }
        if ( $request->search != '')
        {
            $model =  $model->where('product_name', 'LIKE', '%' . $request->search . "%");
           
        }
        return $model;

    }

}

