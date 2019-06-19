<?php

use MobaGuides\MobileLegendsApi\Exceptions\HeroNotFoundException;
use MobaGuides\MobileLegendsApi\Fetchers\Hero;
use MobaGuides\MobileLegendsApi\MobileLegends;
use PHPUnit\Framework\TestCase;

class HeroFetcherTest extends TestCase
{

    /**
     * @var Hero
     */
    protected $heroFetcher;

    public function setUp(): void
    {
        parent::setUp();
        $this->heroFetcher = MobileLegends::make(Hero::class);
    }

    public function test_it_can_fetch_all_heroes()
    {
        $heroes = $this->heroFetcher->all();
        $this->assertTrue($heroes->count() > 3);
    }

    public function test_it_throws_a_hero_not_found_exception_when_an_invalid_id_is_given_on_hero_detail_retrival()
    {
        $this->expectException(HeroNotFoundException::class);
        $this->heroFetcher->detail('notfound');
    }

    public function test_it_retrieves_hero_details()
    {
        $hero = $this->heroFetcher->detail(1);
        $this->assertEquals('Miya', $hero->name);
    }

}