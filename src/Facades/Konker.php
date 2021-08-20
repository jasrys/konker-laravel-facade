<?php

namespace Jasrys\KonkerLaravelFacade\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;

class Konker extends Facade
{
    public static $token;
    public static $baseUrl;
    public static $resource;

    public static function getToken()
    {
        return env('KONKER_ACCESS_TOKEN');
    }

    public static function getBaseApiUrl()
    {
        return static::addTrailingSlashIfMissing(env('KONKER_BASE_URL'));
    }

    protected static function addTrailingSlashIfMissing($url)
    {
        return substr($url, -1) === '/' ? $url : $url . '/';
    }

    protected static function getApiUrl()
    {
        return static::getBaseApiUrl() . 'api/v1/';
    }

    public static function songs()
    {
        static::$resource = 'songs';

        return new static;
    }

    public static function search($query)
    {
        return Http::withToken(static::getToken())
            ->get(static::getSearchUrl(), [
                'q' => $query,
            ])
            ->collect();
    }

    protected static function getSearchUrl()
    {
        return static::getApiUrl() . 'search/' . static::$resource;
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'konker-laravel-facade';
    }
}
