<?php

namespace Farmerant\Farmerantcrawl\Listing;

use Farmerant\Farmerantcrawl\Contract\ListingInterface;

/**
 * Class Supplier
 * @package Farmerant\Farmerantcrawl\Listing
 */
class Supplier implements ListingInterface
{
    //TODO: Address using object to replace.

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $email;
    /**
     * @var
     */
    private $website;
    /**
     * @var
     */
    private $phone;
    /**
     * @var
     */
    private $logoUrl;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var array
     */
    private $tags;

    /**
     * Supplier constructor.
     * @param $name
     * @param $email
     * @param $website
     * @param $phone
     * @param $logoUrl
     */
    public function __construct($name, $email, $website, $phone, $logoUrl)
    {
        $this->name = $name;
        $this->email = $email;
        $this->website = $website;
        $this->phone = $phone;
        $this->logoUrl = $logoUrl;
    }


    /**
     * @param Address $address
     * @return $this
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address ?: new Address();
    }

    /**
     * @param $tag
     * @return $this
     */
    public function addTag($tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge([
            'supplier_name' => $this->name,
            'email' => $this->email,
            'website' => $this->website,
            'phone' => $this->phone,
            'logo_url' => $this->logoUrl,
            'tags' => $this->tags,
        ], $this->getAddress()->toArray());
    }
}
