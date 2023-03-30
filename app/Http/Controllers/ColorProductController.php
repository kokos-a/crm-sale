<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColorProductRequest;
use App\Http\Requests\UpdateColorProductRequest;
use App\Models\ColorProduct;

class ColorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreColorProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreColorProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ColorProduct  $colorProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ColorProduct $colorProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ColorProduct  $colorProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ColorProduct $colorProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateColorProductRequest  $request
     * @param  \App\Models\ColorProduct  $colorProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateColorProductRequest $request, ColorProduct $colorProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ColorProduct  $colorProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ColorProduct $colorProduct)
    {
        //
    }
}
