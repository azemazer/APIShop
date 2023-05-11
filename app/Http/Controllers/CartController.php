<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class CartController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $user = Auth::user();
        $cart = new Cart();
        $user->cart()->save($cart);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        // DD ($userid);
        $cart = $user->cart;
        // DD ($cart);

        // foreach ($cart->items as $item) {
        //     $cart->itemList += $item->title;
        // }
        return new CartResource($cart);
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

    public function addItem(request $request){

        $userid = auth()->id();
        // DD ($userid);
        $cart = Cart::find($userid);
        $item = Item::find($request->input("item_id"));
        $item->cart()->attach($cart);
    
    }

}
