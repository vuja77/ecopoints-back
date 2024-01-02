<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $sponsors = Sponsor::all();

        return view('admin.Sponsor.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.Sponsor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos');
            $sponsor = new Sponsor($request->all());
            $sponsor->logo = $path;
            $sponsor->save();
        } else {
            Sponsor::create($request->all());
        }

        return redirect()->route('sponsor-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sponsor = Sponsor::findOrFail($id);
        return view('admin.Sponsor.show', compact('sponsor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sponsor = Sponsor::findOrFail($id);
        return view('admin.Sponsor.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sponsor = Sponsor::findOrFail($id);

        if ($request->hasFile('photo')) {

            $path = $request->file('photo')->store('photos');
            Storage::delete($sponsor->image_url);

            $sponsor->image_url = $path;
            $sponsor->sponsor_name = $request->sponsor_name;
            $sponsor->description = $request->description;
            $sponsor->price = $request->price;
            $sponsor->dietary_restrictions = $request->dietary_restrictions;

            $sponsor->update();
        } else {
            $sponsor->update($request->all());
        }

        return redirect()->route('sponsor-show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sponsors = Sponsor::findOrFail($id);
        Storage::delete($sponsors->logo);
        $sponsors->delete();
        return redirect()->route('sponsor-index');
    }
}
