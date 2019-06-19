<?php

namespace MobaGuides\MobileLegendsApi;

use GuzzleHttp\Client;
use InvalidArgumentException;
use MobaGuides\MobileLegendsApi\Fetchers\ApiFetcher;

class MobileLegends
{

    /**
     * @var Client
     */
    protected static $client;

    /**
     * Returns the given Mobile Legends API fetcher
     *
     * @param string $fetcher
     * @return ApiFetcher
     */
    public static function make(string $fetcher)
    {
        if (! class_exists($fetcher) || ! is_subclass_of($fetcher, ApiFetcher::class)) {
            throw new InvalidArgumentException("Fetcher {$fetcher} is not a valid fetcher or does not exist");
        }

        if (! isset(self::$client)) {
            self::$client = new Client();
        }

        return new $fetcher(self::$client);
    }

}