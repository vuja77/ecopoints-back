<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PurchasedProduct;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::join('sponsors', 'products.sponsor_id', '=', 'sponsors.id')
    ->select('products.*', 'sponsors.name as sponsor_name','sponsors.location')
    ->get();
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

        $validate = $request->validate([
            "name" => "",
            "shop" => "",
            "points" => "",
            "details" => "",
            "category" => ""
        ]);
        Product::create($validate);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::find($id);
        
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
    public function destroy(string $id)
    {
        //
    }
    public function buy(Request $request)
    {
        
        $id = $request->user()->id;
        $product_id = $request->input("product_id");
       $pp = $request->input("points");
      return PurchasedProduct::create([ "product_id" => $product_id, "user_id" => $id]);
       User::where("id", "=", $id)->update(["points" => new Expression("points - $pp")]);

    }

    public function buyedProduct()
    {
        $id = $request->user()->id;
       
       
       return PurchasedProduct::join("products", "purchased_products.product_id", "=", "products.id")->
       where("user_id", "=", $id)->get(["products.*"]);
    }
}
