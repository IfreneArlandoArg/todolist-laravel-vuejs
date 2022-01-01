<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::OrderBy("created_at", "DESC")->get();
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->item["name"];
        $newItem->save();

        return $newItem;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // using find() instead of findOrFail() allows you to specify what you want to happen if the item isn't found
        $existingItem = Item::find( $id );

        if ( $existingItem ) {
            // if true, set to true
            // otherwise, set to false
            $existingItem->completed = $request->item["completed"] ? true : false;

            // if true, set to Carbon::now() (current time)
            // otherwise, set to null
            $existingItem->completed_at = $request->item["completed"] ? Carbon::now() : null;

            $existingItem->save();
            
            return $existingItem;
        }

        // if item is not found
        return "Item not found.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // using find() instead of findOrFail() allows you to specify what you want to happen if the item isn't found
        $existingItem = Item::find( $id );

        if ( $existingItem ) {
            $existingItem->delete();
            return "Item successfully deleted.";
        }

        return "Item not found.";
    }
}
