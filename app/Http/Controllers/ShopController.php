<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\ShopResource;
use App\Http\Resources\ShopShowResource;
use App\Http\Resources\ProductResource;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return Shop::all();
        $order = $request->query('order') ? $request->query('order') : 'desc';

        return ShopResource::collection(Shop::select('id','user_id' ,'name', 'image' , 'branch', 'service', 'about')
        ->orderBy('created_at', $order)
        ->paginate());
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       
        
        $fields = $request->validate([
            'image'   => 'nullable|string',
            'name'    => 'required|string',
            'branch'  => 'required|string',            
            'service' => 'required|string',            
            'about'   => 'required|string'
        ]);      
       
        $shop = Shop::create([
            'user_id' => auth()->user()->id,            
            'image'   => $fields['image'],
            'name'    => $fields['name'],
            'branch'  => $fields['branch'],
            'service' => $fields['service'],
            'about'   => $fields['about'],
        ]);

        return response($shop,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $shop = Shop::find($id);
        // $shop->user;
        // $shop->products;
        
        // $response = [
        //     'shop' => $shop,            
        // ];

        // return response ($response, 200);

        return response (ShopShowResource::make(Shop::find($id)),200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([                
            'name'    => 'required|string',
            'branch'  => 'required|string',            
            'service' => 'required|string',            
            'about'   => 'required|string',
            'image'   => 'nullable|string',
        ]);
       
        $shop = Shop::find($id);
        $shop->update($request->all());

        return response($shop, 200);
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
    public function search(Request $request)
    {
        $order = $request->query('order') ? $request->query('order') : 'desc';
        $search_term = '%'.$request->query('term').'%';
        return ShopResource::collection(

            Shop::where('name', 'ILIKE', $search_term)
            ->orWhere('branch', 'ILIKE', $search_term)
            ->orWhere('service', 'ILIKE', $search_term)
            ->orWhere('about', 'ILIKE', $search_term)
            ->orderBy('created_at', $order)
            ->paginate(8));

        // Shop::where('name', 'like', $search_term)
        // ->orWhere('branch', 'like', $search_term)
        // ->orWhere('service', 'like', $search_term)
        // ->orWhere('about', 'like', $search_term)
        // ->orderBy('created_at', $order)
        // ->paginate(8));
    }
}


