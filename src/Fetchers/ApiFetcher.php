<?php

namespace MobaGuides\MobileLegendsApi\Fetchers;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;

abstract class ApiFetcher
{

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * ApiFetcher constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param $url
     * @return mixed
     * @throws GuzzleException
     */
    public function get($url)
    {
        return json_decode($this->client->request('GET', $url)->getBody());
    }

    /**
     * @param $url
     * @return mixed
     * @throws GuzzleException
     */
    public function getArray($url)
    {
        return json_decode($this->client->request('GET', $url)->getBody(), true);
    }

}