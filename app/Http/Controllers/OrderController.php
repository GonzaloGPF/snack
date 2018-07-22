<?php

namespace App\Http\Controllers;

use App\Filters\OrderFilter;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Resources\OrderResource;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param OrderFilter $filter
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(OrderFilter $filter)
    {
        $orders = Order::filter($filter)->getOrPaginate();

        return $this->indexResponse(OrderResource::collection($orders));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(OrderCreateRequest $request)
    {
        $order = Order::create($request->all());

        return $this->storeResponse(new OrderResource($order));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderUpdateRequest $request
     * @param Order $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(OrderUpdateRequest $request, Order $order)
    {
        $order->update($request->all());

        return $this->updateResponse(new OrderResource($order));
    }
}
