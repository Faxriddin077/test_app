<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'orders.*.name' => 'required|string',
            'orders.*.quantity' => 'required|int',
            'orders.*.price' => 'required|int',
        ];
    }

    public function messages()
    {
        return [
            'orders.*.name.required' => 'Поле Наименнование продукта обязательно для заполнение',
            'orders.*.quantity.required' => 'Поле Количество продукта обязательно для заполнение',
            'orders.*.price.required' => 'Поле Сумма продукта обязательно для заполнение',
        ];
    }
}
