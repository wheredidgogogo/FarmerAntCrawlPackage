<?php

namespace Farmerant\Farmerantcrawl\Listing;

use Farmerant\Farmerantcrawl\Contract\ListingInterface;

/**
 * Class Image
 * @package Farmerant\Farmerantcrawl\Listing
 */
class Image implements ListingInterface
{
    /**
     *
     */
    const TYPE_MAIN = 'main';

    /**
     *
     */
    const TYPE_GALLERY = 'gallery';

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

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'image_url' => $this->url,
            'image_name' => $this->name,
            'image_type' => $this->type,
        ];
    }
}
