<?php

namespace DazzaDev\LaravelSriEc\Facades;

use DazzaDev\SriEc\Client;
use DazzaDev\SriEc\Listing;
use Illuminate\Support\Facades\Facade;

class LaravelSriEc extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-sri-ec';
    }

    /**
     * Get the client instance.
     */
    public static function getClient(): Client
    {
        return app('laravel-sri-ec');
    }

    /**
     * Get the listings.
     */
    public static function getListings(): array
    {
        return Listing::getListings();
    }

    /**
     * Get the listing by type.
     */
    public static function getListing(string $type): array
    {
        return Listing::getListing($type);
    }
}
