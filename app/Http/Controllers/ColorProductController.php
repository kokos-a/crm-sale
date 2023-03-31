<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColorProductRequest;
use App\Http\Requests\UpdateColorProductRequest;
use App\Models\ColorProduct;
use Illuminate\Support\Facades\Auth;

class ColorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('color-index', ['colors' => ColorProduct::orderByDesc('id')->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('color-edit', ['edit' => 0, 'color' => new ColorProduct()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreColorProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreColorProductRequest $request)
    {
        $validated = $request->validated();
        $color = ColorProduct::create($validated);
        return redirect()->route('colors.index', $color);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ColorProduct  $color
     * @return \Illuminate\Http\Response
     */
    public function show(ColorProduct $color)
    {
        return view('color-show', ['color' => $color]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ColorProduct  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(ColorProduct $color)
    {
        return view('color-edit', ['edit' => 1, 'color' => $color]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateColorProductRequest  $request
     * @param  \App\Models\ColorProduct  $color
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateColorProductRequest $request, ColorProduct $color)
    {
        $validated = $request->validated();
        $color->fill($validated);
        $color->updater_id = Auth::id();
        $color->save();
        return redirect()->route('colors.index', $color);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ColorProduct  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(ColorProduct $color)
    {
        if (Auth::user()->access_level == 2) {
            $color->delete();
            return redirect()->route('colors.index');
        } else {
            return null;
        }
    }
}
