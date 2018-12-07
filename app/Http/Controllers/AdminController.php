<?php

namespace App\Http\Controllers;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;

class AdminController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('adminViews/home');
    }
    public function home()
    {
    	return view('adminViews/home');
    }
    public function Allproducts()
    {
    	$model = new Product();
    	$data =$model ->AllProducts();
      
    	return view('adminViews/allproducts')->with('data',$data);

    }
    public function AddProducts()
    {
    	return view('adminViews/addproduct');
    }
    public function AddNewProduct(Request $request)
    {
    	 $this->validate($request,array(
            'productName' => 'required',
            'productPrize' => 'required',
            'stock' => 'required',
            'imagename' => 'required',
            'prod_info' => 'required',
            'prd_man' =>'required'
        ));

         $productName = $request -> input('productName');
         $productPrize = $request ->input('productPrize');
         $productStock = $request ->input('stock');

        $image = $request->file('imagename');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);
        $imageName = $input['imagename'];
        $productInfo = $request -> input('prod_info');
        $prdmanu = $request -> input('prd_man');

        $details = [
            'productname' => $productName,
            'productprize' => $productPrize,
            'stock' => $productStock,
            'image'  => $imageName,
            'prd_info' => $productInfo,
            'prdmanu' => $prdmanu,
            ];
       
    	$data = new Product();
    	$data = $data ->AddNewProduct($details);

    	// return view('adminViews/addproduct')->with('data', $data);
    	return redirect('admin/products');
    }
    public function deleteProduct($id)
    {
       $model = new Product();
       $data = $model ->deleteProduct($id);
       return redirect('admin/products');
    }
    public function editproduct($id)
    {
        $model = new Product();
        $data = $model->edit($id);
       return view('adminViews/editproducts')->with('data',$data);
    }
    public function updateProduct($id, Request $request)
    {
       $model = new Product();
       $formdata = $request->all();
       $data = $model->updateProduct($id,$formdata);
       return redirect('admin/products');

    }
    public function salesReport()
    {
        return view('adminViews/salesreport');
    }
    public function users()
    {
        $model = new User();
        $data = $model->users();
        return view('adminViews/users')->with('data',$data);
    }
    public function deleteuser($id)
    {
        $model = new User();
        $data = $model->deleteuser($id);
        return redirect('admin/users');
    }
}
