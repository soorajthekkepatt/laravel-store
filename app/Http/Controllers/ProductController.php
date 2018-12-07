<?php

namespace App\Http\Controllers;
use App\Mycart;
use Illuminate\Http\Request;
use Auth;
use DB;

class ProductController extends Controller
{
    public function addtocart(Request $request)
    {
    	$data = $request ->all();
    	$model = new Mycart();
    	$data = $model->addtocart($data);

    	// return \Redirect::route('mycart');
        return redirect('home/mycart');
    }
    public function getcartproducts($id)
    {
    	$model = new Mycart();
    	$data = $model->getcartproducts($id);
    	return json_encode($data);
    }
    public function salesReport()
    {
        $model = new Mycart();
        $data = $model ->salesreport();
        return json_encode($data);
    }
}
