<?php

namespace DazzaDev\LaravelSriEc\Validations;

use DazzaDev\LaravelSriEc\Rules\ExistsInListings;

class Company
{
    /**
     * Company rules.
     */
    public function rules(): array
    {
        return [
            'company' => ['required', 'array'],
            'company.ruc' => ['required', 'string'],
            'company.legal_name' => ['required', 'string'],
            'company.trade_name' => ['nullable', 'string'],
            'company.head_office_address' => ['required', 'string'],
            'company.rimpe_regime_taxpayer' => ['nullable', new ExistsInListings('rimpe-regimes')],
            'company.special_taxpayer_number' => ['nullable', 'string'],
            'company.withholding_agent' => ['nullable', 'boolean'],
            'company.requires_accounting' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'company.ruc.required' => 'El RUC del emisor es obligatorio.',
            'company.legal_name.required' => 'La razón social del emisor es obligatoria.',
            'company.trade_name.required' => 'El nombre comercial del emisor es obligatorio.',
            'company.head_office_address.required' => 'La dirección de la matriz del emisor es obligatoria.',
            'company.rimpe_regime_taxpayer.required' => 'El régimen RIMPE del emisor es obligatorio.',
            'company.withholding_agent.required' => 'El campo agente de retención es obligatorio.',
            'company.withholding_agent.boolean' => 'El campo agente de retención debe ser verdadero o falso.',
            'company.requires_accounting.required' => 'El campo obligado a llevar contabilidad es obligatorio.',
            'company.requires_accounting.boolean' => 'El campo obligado a llevar contabilidad debe ser verdadero o falso.',
        ];
    }
}
