<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ItemResource::collection(Item::all());
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
        $item_title = $request->input('title');
        $item_price = $request->input('price');
        $item_description = $request->input('description');
        $item_image_url = $request->input('image_url');

        $item = Item::create([
            'title' => $item_title,
            'price' => $item_price,
            'description' => $item_description,
            'image_url' => $item_image_url,
        ]);

        return response()->json([
            'data' => new ItemResource($item)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return new ItemResource($item);
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
    public function update(Request $request, Item $item)
    {
        $item_title = $request->input('title');
        $item_price = $request->input('price');
        $item_description = $request->input('description');
        $item_image_url = $request->input('image_url');

        $item->update([
            'title' => $item_title,
            'price' => $item_price,
            'description' => $item_description,
            'image_url' => $item_image_url,
        ]);

        return response()->json([
            'data' => new ItemResource($item)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return response()->json(null, 204);
    }
}
