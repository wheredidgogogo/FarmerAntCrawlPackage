<?php

namespace Farmerant\Farmerantcrawl\Listing;

use Farmerant\Farmerantcrawl\Contract\ListingInterface;

/**
 * Class Address
 * @package Farmerant\Farmerantcrawl\Listing
 */
class Address implements ListingInterface
{
    /**
     * @var
     */
    private $latitude;
    /**
     * @var
     */
    private $longitude;

    /**
     * @var
     */
    private $line1;

    /**
     * @var
     */
    private $line2;

    /**
     * @var
     */
    private $locality;

    /**
     * @var
     */
    private $state;

    /**
     * @var
     */
    private $postCode;

    /**
     * @var
     */
    private $country;

    /**
     * Address constructor.
     * @param $latitude
     * @param $longitude
     * @param $line1
     * @param $line2
     * @param $locality
     * @param $state
     * @param $postCode
     * @param $country
     */
    public function __construct(
        $latitude = null,
        $longitude = null,
        $line1 = null,
        $line2 = null,
        $locality = null,
        $state = null,
        $postCode = null,
        $country = null
    ) {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->line1 = $line1;
        $this->line2 = $line2;
        $this->locality = $locality;
        $this->state = $state;
        $this->postCode = $postCode;
        $this->country = $country;
    }


    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'lat' => $this->latitude,
            'lng' => $this->longitude,
            'address_line_1' => $this->line1,
            'address_line_2' => $this->line2,
            'address_locality' => $this->locality,
            'address_state' => $this->state,
            'address_post_code' => $this->postCode,
            'address_country' => $this->country,
        ];
    }
}
