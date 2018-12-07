<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
	public function AllProducts()
	{
		$data = DB:: select("SELECT *, (SELECT SUM(`productPrize`) FROM `products`) as prizetotal,(SELECT SUM(`stock`) FROM `products`) as stkqty FROM `products`");
		return $data;
	}
	
    public function AddNewProduct($details)
    {     
    	$productName = $details['productname'];
    	$productPrize = $details['productprize'];
    	$stock = $details['stock'];
      $image = $details['image'];
      $prd_info = $details['prd_info'];
      $prd_manu = $details['prdmanu'];

    	$data = DB::insert("INSERT INTO `products`(`productName`, `productPrize`, `stock`, `image_name`, `prd_info`, `prdmanu`) VALUES ('$productName','$productPrize','$stock','$image','$prd_info','$prd_manu')");
    	return $data;
    }
   public function deleteProduct($id)
   {
       $data = DB::delete("DELETE FROM `products` WHERE `id`='$id'");
       return $data;
   }
   public function edit($id)
   {
     $data = DB::select("SELECT * FROM `products` WHERE `id`='$id'");
     return $data;
   }
   public function updateProduct($id,$data)
   {
    echo "<pre>";
    print_r($data);
    $productName = $data['productName'];
    $productPrize = $data['productPrize'];
    $stock = $data['stock'];
    $prd_info = $data['prod_info'];
    $prd_man = $data['prd_man'];

    $data = Db::update("UPDATE `products` SET `productName`='$productName',`productPrize`='$productPrize',`stock`='$stock',`prd_info`='$prd_info',`prdmanu`='$prd_man' WHERE `id`='$id'");
    return $data;
   }
}
