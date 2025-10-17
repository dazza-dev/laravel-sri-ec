<?php

namespace DazzaDev\LaravelSriEc\Validations;

class Validations
{
    protected $commonRules;

    protected $companyRules;

    protected $customerRules;

    protected $totalInvoiceRules;

    protected $paymentsRules;

    protected $lineItemsRules;

    public function __construct()
    {
        $this->commonRules = new Common;
        $this->companyRules = new Company;
        $this->customerRules = new Customer;
        $this->totalInvoiceRules = new TotalInvoice;
        $this->paymentsRules = new Payments;
        $this->lineItemsRules = new LineItems;
    }

    /**
     * Common rules.
     */
    public function commonRules(): array
    {
        return $this->commonRules->rules();
    }

    /**
     * Company rules.
     */
    public function companyRules(): array
    {
        return $this->companyRules->rules();
    }

    /**
     * Customer rules.
     */
    public function customerRules(): array
    {
        return $this->customerRules->rules();
    }

    /**
     * Total invoice rules.
     */
    public function totalInvoiceRules(): array
    {
        return $this->totalInvoiceRules->rules();
    }

    /**
     * Payments rules.
     */
    public function paymentsRules(): array
    {
        return $this->paymentsRules->rules();
    }

    /**
     * Invoice rules.
     */
    public function invoiceRules(): array
    {
        return array_merge(
            $this->basicRules(),
            $this->lineItemsRules(),
            $this->totalInvoiceRules(),
            $this->paymentsRules()
        );
    }

    /**
     * Credit note rules.
     */
    public function creditNoteRules(): array
    {
        return array_merge(
            $this->basicRules(),
            $this->lineItemsRules()
        );
    }

    /**
     * Debit note rules.
     */
    public function debitNoteRules(): array
    {
        return array_merge(
            $this->basicRules(),
            $this->paymentsRules()
        );
    }

    /**
     * Line items rules.
     */
    public function lineItemsRules(): array
    {
        return $this->lineItemsRules->rules();
    }

    /**
     * Get the basic rules.
     */
    public function basicRules(): array
    {
        return array_merge(
            $this->commonRules(),
            $this->companyRules(),
            $this->customerRules(),
        );
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        $commonMessages = $this->commonRules->messages();
        $companyMessages = $this->companyRules->messages();
        $customerMessages = $this->customerRules->messages();
        $totalInvoiceMessages = $this->totalInvoiceRules->messages();
        $paymentsMessages = $this->paymentsRules->messages();
        $lineItemsMessages = $this->lineItemsRules->messages();

        return [
            ...$commonMessages,
            ...$companyMessages,
            ...$customerMessages,
            ...$totalInvoiceMessages,
            ...$paymentsMessages,
            ...$lineItemsMessages,
        ];
    }
}
