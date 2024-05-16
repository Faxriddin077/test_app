<?php

namespace App\Service;

use App\Dto\CreateOrderDto;
use App\Models\Order;

class CreateOrderService
{
    public function handle(array $orders): bool
    {
        try {
            Order::query()->insert($orders);

            return true;
        } catch (\Exception) {
            return false;
        }
    }
}
