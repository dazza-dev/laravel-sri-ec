<?php

namespace DazzaDev\LaravelSriEc\Validations;

use DazzaDev\LaravelSriEc\Rules\ExistsInListings;

class LineItems
{
    /**
     * Line items rules.
     */
    public function rules(): array
    {
        return [
            'line_items' => ['required', 'array'],
            'line_items.*.code' => ['required', 'string'],
            'line_items.*.auxiliary_code' => ['nullable', 'string'],
            'line_items.*.description' => ['required', 'string'],
            'line_items.*.unit' => ['required', 'string'],
            'line_items.*.quantity' => ['required', 'numeric', 'min:0'],
            'line_items.*.unit_price' => ['required', 'numeric', 'min:0'],
            'line_items.*.discount' => ['required', 'numeric', 'min:0'],
            'line_items.*.total_price_without_tax' => ['required', 'numeric', 'min:0'],

            // Additional info
            'line_items.*.additional_info' => ['nullable', 'array'],
            'line_items.*.additional_info.*.name' => ['required', 'string'],
            'line_items.*.additional_info.*.value' => ['required', 'string'],

            // Taxes
            'line_items.*.taxes' => ['required', 'array'],
            'line_items.*.taxes.*.code' => ['required', 'integer', new ExistsInListings('tax-types')],
            'line_items.*.taxes.*.percentage_code' => ['required', 'integer'],
            'line_items.*.taxes.*.rate' => ['required', 'numeric', 'min:0'],
            'line_items.*.taxes.*.taxable_base' => ['required', 'numeric', 'min:0'],
            'line_items.*.taxes.*.value' => ['required', 'numeric', 'min:0'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'line_items.required' => 'Los ítems son obligatorios.',
            'line_items.*.code.required' => 'El código del ítem es obligatorio.',
            'line_items.*.code.string' => 'El código del ítem debe ser una cadena de texto.',
            'line_items.*.auxiliary_code.required' => 'El código auxiliar del ítem es obligatorio.',
            'line_items.*.auxiliary_code.string' => 'El código auxiliar del ítem debe ser una cadena de texto.',
            'line_items.*.description.required' => 'La descripción del ítem es obligatoria.',
            'line_items.*.description.string' => 'La descripción del ítem debe ser una cadena de texto.',
            'line_items.*.unit.required' => 'La unidad del ítem es obligatoria.',
            'line_items.*.unit.string' => 'La unidad del ítem debe ser una cadena de texto.',
            'line_items.*.unit.exists_in_listings' => 'La unidad del ítem no es válida (revisar listado de unidades).',
            'line_items.*.quantity.required' => 'La cantidad del ítem es obligatoria.',
            'line_items.*.quantity.numeric' => 'La cantidad del ítem debe ser un número.',
            'line_items.*.quantity.min' => 'La cantidad del ítem debe ser mayor o igual a 0.',
            'line_items.*.unit_price.required' => 'El precio unitario es obligatorio.',
            'line_items.*.unit_price.numeric' => 'El precio unitario debe ser un número.',
            'line_items.*.unit_price.min' => 'El precio unitario debe ser mayor o igual a 0.',
            'line_items.*.discount.required' => 'El descuento del ítem es obligatorio.',
            'line_items.*.discount.numeric' => 'El descuento del ítem debe ser un número.',
            'line_items.*.discount.min' => 'El descuento del ítem debe ser mayor o igual a 0.',
            'line_items.*.total_price_without_tax.required' => 'El precio total sin impuestos es obligatorio.',
            'line_items.*.total_price_without_tax.numeric' => 'El precio total sin impuestos debe ser un número.',
            'line_items.*.total_price_without_tax.min' => 'El precio total sin impuestos debe ser mayor o igual a 0.',

            // Additional info
            'line_items.*.additional_info.array' => 'La información adicional debe ser un array.',
            'line_items.*.additional_info.*.name.required' => 'El nombre de la información adicional es obligatorio.',
            'line_items.*.additional_info.*.name.string' => 'El nombre de la información adicional debe ser una cadena de texto.',
            'line_items.*.additional_info.*.value.required' => 'El valor de la información adicional es obligatorio.',
            'line_items.*.additional_info.*.value.string' => 'El valor de la información adicional debe ser una cadena de texto.',

            // Taxes
            'line_items.*.taxes.required' => 'Los impuestos del ítem son obligatorios.',
            'line_items.*.taxes.*.code.required' => 'El código del impuesto del ítem es obligatorio.',
            'line_items.*.taxes.*.code.integer' => 'El código del impuesto del ítem debe ser un número entero.',
            'line_items.*.taxes.*.percentage_code.required' => 'El código de porcentaje del impuesto del ítem es obligatorio.',
            'line_items.*.taxes.*.percentage_code.integer' => 'El código de porcentaje del impuesto del ítem debe ser un número entero.',
            'line_items.*.taxes.*.rate.required' => 'La tasa del impuesto del ítem es obligatoria.',
            'line_items.*.taxes.*.rate.numeric' => 'La tasa del impuesto del ítem debe ser un número.',
            'line_items.*.taxes.*.rate.min' => 'La tasa del impuesto del ítem debe ser mayor o igual a 0.',
            'line_items.*.taxes.*.taxable_base.required' => 'La base gravable del impuesto del ítem es obligatoria.',
            'line_items.*.taxes.*.taxable_base.numeric' => 'La base gravable del impuesto del ítem debe ser un número.',
            'line_items.*.taxes.*.taxable_base.min' => 'La base gravable del impuesto del ítem debe ser mayor o igual a 0.',
            'line_items.*.taxes.*.value.required' => 'El valor del impuesto del ítem es obligatorio.',
            'line_items.*.taxes.*.value.numeric' => 'El valor del impuesto del ítem debe ser un número.',
            'line_items.*.taxes.*.value.min' => 'El valor del impuesto del ítem debe ser mayor o igual a 0.',
        ];
    }
}
