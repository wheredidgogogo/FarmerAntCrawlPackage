<?php

namespace Farmerant\Farmerantcrawl\Listing;

use Farmerant\Farmerantcrawl\Contract\Fillable;
use Farmerant\Farmerantcrawl\Contract\ListingInterface;

/**
 * Class Image
 * @package Farmerant\Farmerantcrawl\Listing
 */
class Image implements ListingInterface
{
    use Fillable;

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $description;

    /**
     * @var
     */
    private $order;

    /**
     * @var
     */
    private $originUrl;

    /**
     * @var
     */
    private $thumbUrl;

    /**
     * @var
     */
    private $largeUrl;

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'image_url' => $this->originUrl,
            'image_name' => $this->name,
            'image_order' => $this->order,
            'image_thumb_url' => $this->thumbUrl,
            'image_large_url' => $this->largeUrl,
        ];
    }
}
