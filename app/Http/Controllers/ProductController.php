<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class ProductController extends Controller
{
    //一覧表示
    public function showList(Request $request) {
        $productModel = new Product();
        $companyModel = new Company();
        $products = $productModel->showList();
        $companies = $companyModel->showList();

        return view('showList', ['products' => $products, 'companies' => $companies]);
    }

    //在庫追加処理
    public function store(Request $request)
{
    $request->validate([
        'company_id' => 'required|exists:companies,id',
        'product_name' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'engine' => 'required',
        'driving' => 'required',
        'comment' => 'required',
    ]);

    try {
        Product::create([
            'company_id' => $request->input('company_id'),
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'engine' => $request->input('engine'),
            'driving' => $request->input('driving'),
            'comment' => $request->input('comment'),
        ]);
    } catch (\Exception $e) {
        return back()->withErrors(['error' => '登録処理が失敗しました。']);
    }

    return redirect()->route('showList')->with('message',config('const.create'));
}

//在庫追加ボタンでcompaniesのデータを取得する
public function regist()
{
    $companies = Company::all();
    return view('regist', compact('companies'));
}
//購入ボタン
public function purchase($id) 
{
    $product = Product::findOrFail($id);
    $productModel = new Product();
    $products = $productModel->showList();
    return view('purchase', ['product' => $product, 'products' => $products]);
}

//検索処理
public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // キーワードが入力されている場合、検索を実行
        if (!empty($keyword)) {
            $products = Product::where('product_name', 'LIKE', "%{$keyword}%")
                ->orWhereHas('company', function($query) use ($keyword) {
                    $query->where('company_name', 'LIKE', "%{$keyword}%");
                })
                ->get();
        } else {
            // キーワードが入力されていない場合、全てのデータを取得
            $products = Product::all();
        }

        return view('showList', ['products' => $products, 'keyword' => $keyword]);
    }

    //購入処理
    public function purchaseStore(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity');

        if ($quantity > $product->stock) {
            return back()->withErrors(['error' => '在庫が不足しています。']);
        }

        DB::beginTransaction();

        try {
            $product->stock -= $quantity;
            $product->save();

            DB::commit();

            return redirect()->route('showList')->with('message', '購入が完了しました。');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => '購入処理が失敗しました。']);
        }
    }

    //削除ボタン押下
    public function delete($id) 
    {
        Product::destroy($id);

        return redirect()->route('showList')->with('message',config('const.delete'));
    }
}
