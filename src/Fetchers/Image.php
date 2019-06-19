<?php

namespace MobaGuides\MobileLegendsApi\Fetchers;

use GuzzleHttp\Exception\GuzzleException;
use MobaGuides\MobileLegendsApi\Exceptions\ImageNotFoundException;

class Image extends ApiFetcher
{

    const HERO_HEAD_PREFIX = 'HeroHead';
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

    /**
     * Returns the hero profile image for the given hero ID
     *
     * @param $id
     * @return string
     * @throws GuzzleException
     * @throws ImageNotFoundException
     */
    public function heroAvatar($id): string
    {
        $heroId = self::HERO_HEAD_PREFIX . str_pad($id, 3, 0, STR_PAD_LEFT);
        return $this->find($heroId . '.png');
    }

}