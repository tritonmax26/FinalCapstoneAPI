<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return Product::all();
        $order = $request->query('order') ? $request->query('order') : 'desc';

        return ProductResource::collection(Product::select('id','shop_id','user_id' ,'name' , 'description', 'price', 'branch', 'image','created_at', 'updated_at')
        ->orderBy('created_at', $order)
        ->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $fields = $request->validate([
            'image'        => 'nullable|string',
            'shop_id'      => 'required|numeric',
            'name'         => 'required|string',
            'description'  => 'required|string',            
            'price'        => 'required|numeric',            
            'branch'       => 'required|string'
        ]);      
       
        $product = Product::create([
            'user_id'      => auth()->user()->id,
            'shop_id'      => $fields['shop_id'],            
            'image'        => $fields['image'],
            'name'         => $fields['name'],
            'description'  => $fields['description'],
            'price'        => $fields['price'],
            'branch'       => $fields['branch'],
        ]);

        return response($product,201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([                      
            'name'         => 'required|string',
            'description'  => 'required|string',            
            'price'        => 'required|numeric',            
            'branch'       => 'required|string',
            'image'        => 'nullable|string',  
        ]);      
       
        $product = Product::find($id);
        $product->update($request->all());

        return response($product,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return "Item is deleted";
    }

    /**
     * Search for a name
     */
    public function search(Request $request)
    {
    //    return Product::where('name', 'like', '%'.$name.'%')->get();

       $order = $request->query('order') ? $request->query('order') : 'desc';
       $search_term = '%'.$request->query('term').'%';
       return ProductResource::collection(
       Product::where('name', 'like', $search_term)
       ->orWhere('branch', 'like', $search_term)
       ->orWhere('description', 'like', $search_term)       
       ->orderBy('created_at', $order)
       ->paginate(8));
       
    }
}
