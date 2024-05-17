<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class Company extends Model
{
    use HasFactory;
    //productsテーブルとの関連付け
    protected $table = 'companies';

    protected $fillable = ['company_name', 'country_name'];
    //商品は一つの会社に属するため単数系で
    public function products() 
    {
        return $this->hasMany(Product::class);
    }

    public function showList() 
    {
        return Company::all();
    }
}
