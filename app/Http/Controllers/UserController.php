<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id)->get;
        $shops = $user->shops;

        $user['shops'] = $shops;

        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProfilePicture(Request $request, string $id)
    {
        $fields = $request -> validate ([
            // 'name'    => 'required|string',
            // 'email'   => 'required|string|unique:|email',
            'profile_picture' => 'nullable|string'
        ]);

        $user = User::find(auth()->id);
        $user->update($request->all());

        $response = [
            'message' => 'Details Updated'
        ];

        return response($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
