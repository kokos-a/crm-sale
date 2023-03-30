<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Client;
use App\Models\Order;

class ClientOrderController extends Controller
{
    public function index(Client $client)
    {
        return view('order-index', ['client' => $client, 'orders' => Order::where(['client_id' => $client->id])->orderByDesc('id')->paginate(20)]);
    }

    public function create(Client $client)
    {
        return view('order-edit', ['edit' => 0, 'order' => new Order(['client_id' => $client->id])]);
    }

    public function store(Client $client, StoreOrderRequest $request)
    {
        $validated = $request->validated();
        $ord = new Order(['client_id' => $client->id]);

        $ord->fill($validated);
        $ord->save();
        return redirect()->route('orders.show', $ord);
    }
}

