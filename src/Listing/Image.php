<?php

namespace Farmerant\Farmerantcrawl\Listing;

/**
 * Class Image
 * @package Farmerant\Farmerantcrawl\Listing
 */
class Image
{
    /**
     * @var
     */
    private $url;
    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $type;

    /**
     * Image constructor.
     * @param $url
     * @param $name
     * @param $type
     */
    public function __construct($url, $name, $type)
    {
        $this->url = $url;
        $this->name = $name;
        $this->type = $type;
    }
}
