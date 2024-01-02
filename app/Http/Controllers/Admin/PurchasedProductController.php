<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\PurchasedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PurchasedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $PurchasedProducts = PurchasedProduct::all();

        return view('admin.PurchasedProduct.index', compact('PurchasedProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.PurchasedProduct.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos');
            $product = new Product($request->all());
            $product->photo = $path;
            $product->save();
        } else {
            Product::create($request->all());
        }

        return redirect()->route('product-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $PurchasedProducts = PurchasedProduct::findOrFail($id);
        return view('admin.PurchasedProduct.show', compact('PurchasedProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $PurchasedProduct = PurchasedProduct::findOrFail($id);
        return view('admin.PurchasedProduct.edit', compact('PurchasedProduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $PurchasedProduct = PurchasedProduct::findOrFail($id);

        if ($request->hasFile('photo')) {

            $path = $request->file('photo')->store('photos');
            Storage::delete($PurchasedProduct->image_url);

            $PurchasedProduct->image_url = $path;
            $PurchasedProduct->name = $request->name;
           

            $PurchasedProduct->update();
        } else {
            $PurchasedProduct->update($request->all());
        }

        return redirect()->route('PurchasedProduct-show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $PurchasedProduct = PurchasedProduct::findOrFail($id);
        Storage::delete($PurchasedProduct->image_url);
        $PurchasedProduct->delete();
        return redirect()->route('PurchasedProduct-index');
    }
}
