<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Shop::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'service' =>'required',            
            'branch' =>'required',
        ]);

        return Shop::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Shop::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Shop = Shop::find($id);
        $Shop->update($request->all());
        return $Shop;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Shop::destroy($id);
        return "Item is deleted";
    }

    /**
     * Search Shop name
     */
    public function search(string $name)
    {
        return Shop::where('name', 'like', '%'.$name.'%')->get();
    }
}
