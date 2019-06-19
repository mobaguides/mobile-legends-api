<?php

namespace MobaGuides\MobileLegendsApi\Fetchers;

use MobaGuides\MobileLegendsApi\Exceptions\HeroNotFoundException;
use MobaGuides\MobileLegendsApi\MobileLegendsEndpoint;

class Hero extends ApiFetcher
{

    const HERO_LIST_ENDPOINT = 'https://mapi.mobilelegends.com/hero/list';
    const HERO_DETAIL_ENDPOINT = 'https://mapi.mobilelegends.com/hero/detail?id=%s';

    /**
     * Returns a collection of all heroes
     *
     * @return \Illuminate\Support\Collection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function all()
    {
        return collect($this->get(self::HERO_LIST_ENDPOINT)->data);
    }

    public function detail($id)
    {
        $endpoint = sprintf(self::HERO_DETAIL_ENDPOINT, $id);
        $response = $this->get($endpoint);

        if (! isset($response->data->name)) {
            throw new HeroNotFoundException("Hero {$id} not found");
        }

        return $response->data;
    }

}