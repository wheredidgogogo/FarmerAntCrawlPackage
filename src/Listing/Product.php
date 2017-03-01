<?php

namespace Farmerant\Farmerantcrawl\Listing;

use Farmerant\Farmerantcrawl\Contract\Fillable;
use Farmerant\Farmerantcrawl\Contract\ListingInterface;
use Illuminate\Support\Collection;

/**
 * Class Product
 * @package Farmerant\Farmerantcrawl\Listing
 */
class Product implements ListingInterface
{
    use Fillable;

    /**
     *
     */
    const STATUS_ACTIVE = 'Active';
    /**
     *
     */
    const STATUS_SOLD = 'Sold';
    /**
     *
     */
    const STATUS_DELETED = 'Deleted';

    /**
     * @var integer
     */
    public $id;

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
    public $status;

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
    public $source;

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
    public $price;

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
     * @var Collection
     */
    protected $images;

    /**
     * @var Supplier
     */
    protected $supplier;

    /**
     * @var
     */
    private $language;

    /**
     * @var
     */
    private $sourceCountry;

    /**
     * Product constructor.
     */
    public function __construct($source)
    {
        $this->images = new Collection();
        $this->source = $source;
    }

    /**
     * @param Image $image
     */
    public function addImage(Image $image)
    {
        $this->images->push($image);
    }

    /**
     * @param array $tag
     * @return $this
     */
    public function addTag(array $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * @param Supplier $supplier
     */
    public function setSupplier(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'url' => $this->url,
            'title' => $this->title,
            'source_listing_id' => $this->getSourceId(),
            'description' => $this->description,
            'status' => $this->status,
            'category' => $this->category,
            'website_name' => $this->websiteName,
            'lat' => $this->latitude,
            'lng' => $this->longitude,
            'price' => $this->price,
            'currency' => $this->currency,
            'price_description' => $this->priceDescription,
            'tags' => $this->tags,
            'language' => $this->language,
            'source_country' => $this->sourceCountry,
            'images' => $this->images->map(function (Image $image){
                return $image->toArray();
            })->toArray(),
            'supplier' => $this->supplier ?
                array_merge($this->supplier->toArray(), ['source_supplier_id' => $this->getSourceId()]) : [],
        ];
    }

    /**
     * @return string
     */
    protected function getSourceId()
    {
        return "{$this->source}-{$this->id}";
    }
}
