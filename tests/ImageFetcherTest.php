<?php

use GuzzleHttp\Client;
use MobaGuides\MobileLegendsApi\Fetchers\Image;
use MobaGuides\MobileLegendsApi\MobileLegends;
use PHPUnit\Framework\TestCase;

class ImageFetcherTest extends TestCase
{

    /**
     * @var Image
     */
    protected $image;

    public function setUp(): void
    {
        parent::setUp();
        $this->image = MobileLegends::make(Image::class);
    }

    protected function dummyImageRepository()
    {
        return ['test' => 'test'];
    }

    public function test_it_makes_only_one_request_on_the_same_instance_when_not_initialized()
    {
        $image = $this->createPartialMock(Image::class, ['getArray']);

        $image->expects($this->once())
            ->method('getArray')
            ->willReturn($this->dummyImageRepository());

        $image->find('test');
        $image->find('test');
    }

    public function test_it_returns_an_hero_profile_image()
    {
        $result = $this->image->find('HeroHead001.png');
        $this->assertEquals('https://img.mobilelegends.com/group1/M00/00/05/rB_-LVo8fXaABiKvAABdFAMAFgI472.png', $result);
    }

    public function test_it_returns_the_hero_profile_image_for_a_given_hero_id()
    {
        $result = $this->image->heroAvatar(1);
        $this->assertEquals('https://img.mobilelegends.com/group1/M00/00/05/rB_-LVo8fXaABiKvAABdFAMAFgI472.png', $result);
    }

}