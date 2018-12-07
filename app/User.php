<?php

namespace App;
use App\Product;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function allproducts()
    {
        $data = DB::select('SELECT * FROM `products`');
        return $data;
    }
    public function users()
    {
        $data = Db::select("SELECT * FROM `users`");
        return $data;
    }
    public function deleteuser($id)
    {
        // $data = DB::delete("DELETE FROM `users` WHERE `id`='$id'");
        // return $data;
    }
}
