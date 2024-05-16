<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Service\CreateOrderService;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct(
        public CreateOrderService $service
    )
    {
    }

    /**
     * Save order records
     */
    public function save(CreateOrderRequest $request): JsonResponse
    {
        return response()->json([
            'data' => $this->service->handle($request->validated()['orders'])
        ]);
    }
}
