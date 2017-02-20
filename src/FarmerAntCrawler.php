<?php

namespace Farmerant\Farmerantcrawl;

/**
 * Class FarmerAntCrawler
 * @package Farmerant\Farmerantcrawl
 */
class FarmerAntCrawler
{
    /**
     * @var
     */
    private $token;

    /**
     * FarmerAntCrawler constructor.
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }
}
