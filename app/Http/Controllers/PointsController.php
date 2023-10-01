<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Query\Expression;
class PointsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        ]);
        $id = $request->user()->id;
        $pp = 10;
        User::where("id", "=", $id)->update(["points" => new Expression("points + $pp")]);
    }

    public function addPoints(Request $request)
    {
        $id = $request->user()->id;
        $points = $request->input("points");
        User::where("id", "=", $id)->update(["points" => new Expression("points + $points")]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
