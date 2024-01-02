<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $Favorites = Favorite::all();

        return view('admin.Favorite.index', compact('Favorites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.Favorite.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        Favorite::create($request->all());
        

        return redirect()->route('favorite-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Favorite = Favorite::findOrFail($id);
        return view('admin.Favorite.show', compact('Favorite'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Favorite = Favorite::findOrFail($id);
        return view('admin.Favorite.edit', compact('Favorite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Favorite = Favorite::findOrFail($id);

        if ($request->hasFile('photo')) {

            $path = $request->file('photo')->store('photos');
            Storage::delete($Favorite->image_url);

            $Favorite->image_url = $path;
            $Favorite->Favorite_name = $request->Favorite_name;
            $Favorite->description = $request->description;
            $Favorite->price = $request->price;
            $Favorite->dietary_restrictions = $request->dietary_restrictions;

            $Favorite->update();
        } else {
            $Favorite->update($request->all());
        }

        return redirect()->route('favorite-show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Favorite = Favorite::findOrFail($id);
        Storage::delete($Favorite->image_url);
        $Favorite->delete();
        return redirect()->route('favorite-index');
    }
}
