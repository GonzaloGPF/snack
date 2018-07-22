<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param ProductFilter $filter
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ProductFilter $filter)
    {
        $products = Product::filter($filter)
            ->order($filter)
            ->getOrPaginate();

        return $this->indexResponse(ProductResource::collection($products));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductCreateRequest $request)
    {
        $product = Product::create($request->all());

        return $this->storeResponse(new ProductResource($product));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductUpdateRequest $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->all());

        return $this->updateResponse(new ProductResource($product));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductUpdateRequest $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ProductUpdateRequest $request, Product $product)
    {
        return $this->destroyResponse($product, new ProductResource($product));
    }
}
