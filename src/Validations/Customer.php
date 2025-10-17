<?php

namespace DazzaDev\LaravelSriEc\Validations;

use DazzaDev\LaravelSriEc\Rules\ExistsInListings;

class Customer
{
    /**
     * Customer rules.
     */
    public function rules(): array
    {
        return [
            'customer' => ['required', 'array'],
            'customer.name' => ['required'],
            'customer.identification_type' => ['required', new ExistsInListings('identification-types')],
            'customer.identification_number' => ['required'],
            'customer.address' => ['required'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'customer.name.required' => 'El nombre del receptor es obligatorio.',
            'customer.identification_type.required' => 'El tipo de identificación del receptor es obligatorio.',
            'customer.identification_number.required' => 'El número de identificación del receptor es obligatorio.',
            'customer.address.required' => 'La dirección del receptor es obligatoria.',
        ];
    }
}
