<?php

namespace App\Http\Controllers;

use App\Filters\OrderLineFilter;
use App\Http\Requests\OrderLineCreateRequest;
use App\Http\Requests\OrderLineUpdateRequest;
use App\Http\Resources\OrderLineResource;
use App\OrderLine;

class OrderLineController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param OrderLine $orderLine
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(OrderLine $orderLine)
    {
        $this->loadRelations(request(), $orderLine);

        return $this->showResponse(new OrderLineResource($orderLine));
    }

    /**
     * Display the specified resource.
     *
     * @param OrderLineFilter $filter
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(OrderLineFilter $filter)
    {
        $orderLines = OrderLine::filter($filter)
            ->order($filter)
            ->getOrPaginate();

        return $this->indexResponse(OrderLineResource::collection($orderLines));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderLineCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(OrderLineCreateRequest $request)
    {
        $orderLine = OrderLine::create($request->all());

        if($request->has('products')) {
            $orderLine->products()->sync($request->get('products'));
        }

        $orderLine->refreshTotal();

        return $this->storeResponse(new OrderLineResource($orderLine));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderLineUpdateRequest $request
     * @param OrderLine $orderLine
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(OrderLineUpdateRequest $request, OrderLine $orderLine)
    {
        $orderLine->update($request->all());

        if($request->has('products')) {
            $orderLine->products()->sync($request->get('products'));
        }

        $orderLine->refreshTotal();

        return $this->updateResponse(new OrderLineResource($orderLine));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param OrderLineUpdateRequest $request
     * @param OrderLine $orderLine
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(OrderLineUpdateRequest $request, OrderLine $orderLine)
    {
        return $this->destroyResponse($orderLine, new OrderLineResource($orderLine));
    }
}
