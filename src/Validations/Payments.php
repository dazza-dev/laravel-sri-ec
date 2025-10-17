<?php

namespace DazzaDev\LaravelSriEc\Validations;

use DazzaDev\LaravelSriEc\Rules\ExistsInListings;

class Payments
{
    /**
     * Payment and taxes rules.
     */
    public function rules(): array
    {
        return [
            'payments' => ['required', 'array'],
            'payments.*.payment_method' => ['required', 'string', 'max:2', new ExistsInListings('payment-methods')],
            'payments.*.amount' => ['required', 'numeric', 'min:0'],
            'payments.*.term' => ['nullable', 'integer', 'min:1'],
            'payments.*.unit_time' => ['nullable', 'string', 'max:50'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'payments.required' => 'Los pagos son obligatorios.',
            'payments.*.payment_method.required' => 'El método de pago es obligatorio.',
            'payments.*.payment_method.string' => 'El método de pago debe ser una cadena de texto.',
            'payments.*.payment_method.max' => 'El método de pago no puede tener más de 2 caracteres.',
            'payments.*.payment_method.exists_in_listings' => 'El método de pago no es válido (revisar listado de métodos de pago).',
            'payments.*.amount.required' => 'El monto del pago es obligatorio.',
            'payments.*.amount.numeric' => 'El monto del pago debe ser un número.',
            'payments.*.amount.min' => 'El monto del pago debe ser mayor o igual a 0.',
            'payments.*.term.required' => 'El plazo del pago es obligatorio.',
            'payments.*.term.integer' => 'El plazo del pago debe ser un número entero.',
            'payments.*.term.min' => 'El plazo del pago debe ser mayor o igual a 1.',
            'payments.*.unit_time.required' => 'La unidad de tiempo es obligatoria.',
            'payments.*.unit_time.string' => 'La unidad de tiempo debe ser una cadena de texto.',
            'payments.*.unit_time.max' => 'La unidad de tiempo no puede tener más de 50 caracteres.',
        ];
    }
}
