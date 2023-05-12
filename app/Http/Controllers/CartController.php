<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use Illuminate\Support\Facades\Auth;

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
        $cartAlready = Cart::find(auth()->id());
        if ($cartAlready != null) {
            return "Vous avez déjà un cart.";
        }
        $cart = new Cart();
        $user->cart()->save($cart);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $userid = auth()->id();
        // DD ($userid);
        $cart = Cart::find($userid);
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
}
