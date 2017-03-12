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
    public $primaryCategory;

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
    public $price;

    /**
     * @var
     */
    public $currency;

    /**
     * @var
     */
    public $currencySymbol;

    /**
     * @var
     */
    public $priceDescription;

    /**
     * @var Collection
     */
    protected $tags;

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
     * @var Address
     */
    private $address;

    /**
     * Product constructor.
     */
    public function __construct($source)
    {
        $this->images = new Collection();
        $this->tags = new Collection();
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
     * @param ProductTag $tag
     * @return $this
     */
    public function addTag(ProductTag $tag)
    {
        $this->tags->push($tag);

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
     * @return array
     */
    public function toArray()
    {
        return array_merge([
            'url' => $this->url,
            'title' => $this->title,
            'source_listing_id' => $this->getSourceId(),
            'description' => $this->description,
            'status' => $this->status,
            'primary_category' => $this->primaryCategory,
            'website_name' => $this->websiteName,
            'price' => $this->price,
            'currency' => $this->currency,
            'currency_symbol' => $this->currencySymbol,
            'price_description' => $this->priceDescription,
            'tags' => $this->tags->map(function (ProductTag $tag) {
                return $tag->toArray();
            })->toArray(),
            'language' => $this->language,
            'source_country' => $this->sourceCountry,
            'images' => $this->images->map(function (Image $image){
                return $image->toArray();
            })->toArray(),
            'supplier' => $this->supplier ?
                array_merge($this->supplier->toArray(), ['source_supplier_id' => $this->getSourceId()]) : [],
        ], $this->getAddress()->toArray());
    }

    /**
     * @return string
     */
    protected function getSourceId()
    {
        return "{$this->source}-{$this->id}";
    }
}
