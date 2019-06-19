<?php

namespace MobaGuides\MobileLegendsApi\Fetchers;

use GuzzleHttp\Exception\GuzzleException;
use MobaGuides\MobileLegendsApi\Exceptions\ImageNotFoundException;

class Image extends ApiFetcher
{

    const IMAGES_ENDPOINT = 'https://mapi.mobilelegends.com/api/icon';

    /**
     * @var array
     */
    protected $images = [];

    /**
     * Find a given image in the image map
     *
     * @param $key
     * @return string
     * @throws ImageNotFoundException
     * @throws GuzzleException
     */
    public function find($key): string
    {
        if (empty($this->images)) {
            $this->images = $this->getArray(self::IMAGES_ENDPOINT);
        }

        if (! isset($this->images[$key])) {
            throw new ImageNotFoundException("Image {$key} was not found");
        }

        return $this->images[$key];
    }

}