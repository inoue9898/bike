<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;
    //companiesテーブルと関連付け
    protected $table = 'products';
    protected $fillable = ['id','company_id', 'product_name', 'price', 'stock', 'engine', 'driving', 'comment'];

    //リレーション
    public function company() 
    {
        return $this->belongsTo(Company::class);
    }

    //一覧表示のDB処理
    public function showList() 
    {
        return $this->with('company')->get();
    }
    //在庫登録画面の入力データ取得
    public function getStore($data) 
    {
        $this->company_id = $data['company_id'];
        $this->product_name = $data['product_name'];
        $this->price = $data['price'];
        $this->stock = $data['stock'];
        $this->engine = $data['engine'];
        $this->driving = $data['driving'];
        $this->comment = $data['comment'];

        $this->save();
    }

    //購入手続きデータ取得
    public function purchase()
    {
        return $this->with('company')->get();
    }

    
}


