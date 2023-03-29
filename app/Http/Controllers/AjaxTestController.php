<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AjaxTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function showAll()
    {
        $products = Product::all();
        $productList = [];
        foreach($products as $product) {
            $productList[] = [
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
            ];
        }
        // ヘッダーを指定することでjsonの動作を安定させる
        header("Content-type: application/json");
        // htmlへ渡す配列$productListをjsonに変換
        echo json_encode($productList);
    }

    public function add(Request $request)
    {
        $name = $request->name;
        $price = $request->price;
        $id = Product::insertGetId([
            'name' => $name,
            'price' => $price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $product = Product::where('id', $id)->get();
        header("Content-type: application/json");
        echo json_encode($product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->id;
        // 配列型にするためにfindは使わない
        $product = Product::where('id', $id)->get();
        header("Content-type: application/json");
        echo json_encode($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function del(Request $request)
    {
        $id = $request->id;
        // 削除するレコードを取得
        $data['del'] = Product::where('id', $id)->get();
        // 削除
        Product::where('id', $id)->delete();
        // 削除後の全商品リスト作成
        $data['lists'] = Product::all();
        header("Content-type: application/json");
        echo json_encode($data);
    }
}
