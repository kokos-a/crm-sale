<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;

class ProductOrderController extends Controller
{
    public function index(Product $product)
    {
        return view('product-index', ['product' => $product, 'orders' => Order::where(['client_id' => $product->id])->orderByDesc('id')->paginate(20)]);
    }

    public function create(Product $product)
    {
        return view('order-edit', ['edit' => 0, 'order' => new Order(['client_id' => $product->id])]);
    }

    public function store(Product $product, StoreOrderRequest $request)
    {
        $validated = $request->validated();
        $ord = new Order(['client_id' => $product->id]);

        $ord->fill($validated);
        $ord->save();
        return redirect()->route('orders.show', $ord);
    }
}

