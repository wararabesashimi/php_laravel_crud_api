<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $productService
    ) {}

    /**
     * GET /api/products
     */
    public function index(): JsonResponse
    {
        $products = $this->productService->list();

        return response()->json($products, 200);
    }

    /**
     * GET /api/products/{product}
     */
    public function show(string $product): JsonResponse
    {
        $result = $this->productService->find($product);

        return response()->json($result, 200);
    }

    /**
     * POST /api/products
     */
    public function store(
        StoreProductRequest $request
    ): JsonResponse {
        $data = $request->validated();

        $product = $this->productService->create($data);

        return response()->json($product, 201);
    }

    /**
     * PUT/PATCH /api/products/{product}
     */
    public function update(
        UpdateProductRequest $request,
        string $product
    ): JsonResponse {
        $data = $request->validated();

        $updated = $this->productService->update(
            $product,
            $data
        );

        return response()->json($updated, 200);
    }

    /**
     * DELETE /api/products/{product}
     */
    public function destroy(string $product): Response
    {
        $this->productService->delete($product);

        return response()->noContent();
    }
}