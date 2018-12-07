<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use App\Mycart;
use Illuminate\Http\Request;
use Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');            
    }  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new User();
        $data = $model ->allproducts();
        return view('userViews/home')->with('data',$data);
    }
    public function logout()
    {
       Auth::logout();
       return redirect('/home');
    }
    public function productinfo($id)
    {
       
       $data = new Product();
       $data = $data ->edit($id);
       return view('userViews/productdetails')->with('data',$data);
    }
    public function showcart()
    {
        $id = Auth::user()->id;
        // print_r($id);
        // exit;
        $model = new Mycart();
        $data = $model -> getcartproducts($id);
       return view('userViews/cart')->with('data',$data);
    }
}
