<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Restaurant::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'service' =>'required',
            'body' =>'required',
            'location' =>'required',
        ]);

        return Restaurant::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Restaurant::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->update($request->all());
        return $restaurant;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Restaurant::destroy($id);
        return "Item is deleted";
    }

    /**
     * Search restaurant name
     */
    public function search(string $name)
    {
        return Product::where('name', 'like', '%'.$name.'%')->get();
    }
}
