<?php

namespace Farmerant\Farmerantcrawl\Listing;

/**
 * Class Product
 * @package Farmerant\Farmerantcrawl\Listing
 */
class Product
{
    /**
     * @var
     */
    public $url;
    /**
     * @var
     */
    public $title;
    /**
     * @var
     */
    public $description;
    /**
     * @var
     */
    public $state;
    /**
     * @var
     */
    public $category;
    /**
     * @var
     */
    public $websiteName;
    /**
     * @var
     */
    public $latitude;
    /**
     * @var
     */
    public $longitude;
    /**
     * @var
     */
    public $currency;
    /**
     * @var
     */
    public $priceDescription;

    /**
     * @var array
     */
    protected $tags = [];
    /**
     * @var array
     */
    protected $images = [];
    /**
     * @var array
     */
    protected $suppliers = [];

    /**
     * @param array $array
     */
    public function fill($array = [])
    {
        foreach ($array as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * @param Image $image
     */
    public function addImage(Image $image)
    {
        $this->images[] = $image;
    }

    /**
     * @param array $tag
     */
    public function addTag(array $tag)
    {
        $this->tags[] = $tag;
    }

    /**
     * @param Supplier $supplier
     */
    public function addSupplier(Supplier $supplier)
    {
        $this->suppliers[] = $supplier;
    }

}
