<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScannedQrcode;
class ScanQrcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ScannedQrcode::all();
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
        $a = ScannedQrcode::where('special_id', $request->input("special_id"))->first();
        if($a) {
            return response()->json(["error" => "qrcode je vec skeniran"], 400);

        } else {
            ScannedQrcode::create(['special_id' => $request->input("special_id")]);
            return response()->json(["succes" => "qrcode je uspjesno skeniran"], 200);
            
        }
    
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
