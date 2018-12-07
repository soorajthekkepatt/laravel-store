<?php

namespace App;
use DB;
use App\Mycart;
use Illuminate\Database\Eloquent\Model;

class Mycart extends Model
{
   public function addtocart($data)
   {
   	$productid = $data['productid'];
   	$userid = $data['userid'];
   	$quantity = $data['quantity'];

   	$data =Db::insert("INSERT INTO `mycarts`(`user_id`, `product_id`, `quantity`) VALUES ('$userid','$productid','$quantity')");
   	return $data;
   }
   public function getcartproducts($id)
   {
         $data = Db::select("SELECT * FROM `mycarts`,`products` WHERE `user_id` ='$id' AND `products`.`id` = `mycarts`.`product_id`");
         return $data;
   		// return $id;
   }
   public function salesreport()
   {
      $data = Db::select("SELECT * FROM `mycarts` INNER JOIN `products` ON `mycarts`.`product_id` =`products`.`id`INNER JOIN `users` ON `mycarts`.`user_id` = `users`.`id`");
         return $data;
   }
}
