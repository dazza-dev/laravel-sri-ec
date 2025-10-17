<?php

namespace DazzaDev\LaravelSriEc\Validations;

use DazzaDev\LaravelSriEc\Rules\ExistsInListings;

class TotalInvoice
{
    /**
     * Total invoice rules.
     */
    public function rules(): array
    {
        return [
            'totals' => ['required', 'array'],
            'totals.subtotal' => ['required', 'numeric', 'min:0'],
            'totals.total_subsidy' => ['nullable', 'numeric', 'min:0'],
            'totals.total_discount' => ['required', 'numeric', 'min:0'],
            'totals.taxes' => ['required', 'array'],
            'totals.taxes.*.code' => ['required', 'integer', new ExistsInListings('tax-types')],
            'totals.taxes.*.percentage_code' => ['required', 'integer'],
            'totals.taxes.*.rate' => ['required', 'numeric', 'min:0'],
            'totals.taxes.*.taxable_base' => ['required', 'numeric', 'min:0'],
            'totals.taxes.*.value' => ['required', 'numeric', 'min:0'],
            'totals.tip' => ['nullable', 'numeric', 'min:0'],
            'totals.total' => ['required', 'numeric', 'min:0'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'totals.subtotal.required' => 'El subtotal es obligatorio.',
            'totals.subtotal.numeric' => 'El subtotal debe ser un número.',
            'totals.subtotal.min' => 'El subtotal debe ser mayor o igual a 0.',
            'totals.total_subsidy.required' => 'El total de subsidio es obligatorio.',
            'totals.total_subsidy.numeric' => 'El total de subsidio debe ser un número.',
            'totals.total_subsidy.min' => 'El total de subsidio debe ser mayor o igual a 0.',
            'totals.total_discount.required' => 'El total de descuento es obligatorio.',
            'totals.total_discount.numeric' => 'El total de descuento debe ser un número.',
            'totals.total_discount.min' => 'El total de descuento debe ser mayor o igual a 0.',
            'totals.taxes.required' => 'Los impuestos son obligatorios.',
            'totals.taxes.array' => 'Los impuestos deben ser un array.',
            'totals.taxes.*.code.required' => 'El código del impuesto es obligatorio.',
            'totals.taxes.*.code.integer' => 'El código del impuesto debe ser un número entero.',
            'totals.taxes.*.percentage_code.required' => 'El código de porcentaje del impuesto es obligatorio.',
            'totals.taxes.*.percentage_code.integer' => 'El código de porcentaje del impuesto debe ser un número entero.',
            'totals.taxes.*.rate.required' => 'La tarifa del impuesto es obligatoria.',
            'totals.taxes.*.rate.numeric' => 'La tarifa del impuesto debe ser un número.',
            'totals.taxes.*.rate.min' => 'La tarifa del impuesto debe ser mayor o igual a 0.',
            'totals.taxes.*.taxable_base.required' => 'La base gravable del impuesto es obligatoria.',
            'totals.taxes.*.taxable_base.numeric' => 'La base gravable del impuesto debe ser un número.',
            'totals.taxes.*.taxable_base.min' => 'La base gravable del impuesto debe ser mayor o igual a 0.',
            'totals.taxes.*.value.required' => 'El valor del impuesto es obligatorio.',
            'totals.taxes.*.value.numeric' => 'El valor del impuesto debe ser un número.',
            'totals.taxes.*.value.min' => 'El valor del impuesto debe ser mayor o igual a 0.',
            'totals.tip.required' => 'La propina es obligatoria.',
            'totals.tip.numeric' => 'La propina debe ser un número.',
            'totals.tip.min' => 'La propina debe ser mayor o igual a 0.',
            'totals.total.required' => 'El total es obligatorio.',
            'totals.total.numeric' => 'El total debe ser un número.',
            'totals.total.min' => 'El total debe ser mayor o igual a 0.',
        ];
    }
}
