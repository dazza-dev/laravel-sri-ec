<?php

namespace DazzaDev\LaravelSriEc\Validations;

class Common
{
    /**
     * Common rules.
     */
    public function rules(): array
    {
        return [
            'sequential' => ['required', 'numeric'],
            'date' => ['required', 'date_format:Y-m-d'],
            'establishment' => ['required', 'array'],
            'establishment.code' => ['required', 'string'],
            'establishment.name' => ['nullable', 'string'],
            'establishment.address' => ['required', 'string'],
            'emission_point' => ['required', 'array'],
            'emission_point.code' => ['required', 'string'],
            'emission_point.name' => ['nullable', 'string'],
            'additional_info' => ['nullable', 'array', 'min:1'],
            'additional_info.*.name' => ['required', 'string'],
            'additional_info.*.value' => ['required', 'string'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            // Sequential
            'sequential.required' => 'El número secuencial es obligatorio.',
            'sequential.numeric' => 'El número secuencial debe ser un número.',

            // Date
            'date.required' => 'La fecha es obligatoria.',
            'date.date_format' => 'La fecha debe tener el formato (YYYY-MM-DD).',

            // Establishment
            'establishment.required' => 'El establecimiento es obligatorio.',
            'establishment.array' => 'El establecimiento debe ser un array.',
            'establishment.code.required' => 'El código del establecimiento es obligatorio.',
            'establishment.code.string' => 'El código del establecimiento debe ser una cadena de texto.',
            'establishment.address.required' => 'La dirección del establecimiento es obligatoria.',
            'establishment.address.string' => 'La dirección del establecimiento debe ser una cadena de texto.',

            // Emission Point
            'emission_point.required' => 'El punto de emisión es obligatorio.',
            'emission_point.array' => 'El punto de emisión debe ser un array.',
            'emission_point.code.required' => 'El código del punto de emisión es obligatorio.',
            'emission_point.code.string' => 'El código del punto de emisión debe ser una cadena de texto.',

            // Additional Info
            'additional_info.required' => 'La información adicional es obligatoria.',
            'additional_info.array' => 'La información adicional debe ser un array.',
            'additional_info.min' => 'Debe haber al menos 1 ítem en la información adicional.',
            'additional_info.*.name.required' => 'El nombre de la información adicional es obligatorio.',
            'additional_info.*.name.string' => 'El nombre de la información adicional debe ser una cadena de texto.',
            'additional_info.*.value.required' => 'El valor de la información adicional es obligatorio.',
            'additional_info.*.value.string' => 'El valor de la información adicional debe ser una cadena de texto.',
        ];
    }
}
