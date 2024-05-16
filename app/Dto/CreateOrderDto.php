<?php

namespace App\Dto;

class CreateOrderDto
{
    public function __construct(
        public string $name,
        public int $quantity,
        public int $price,
    )
    {
    }
}
