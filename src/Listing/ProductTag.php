<?php

namespace Farmerant\Farmerantcrawl\Listing;

use Farmerant\Farmerantcrawl\Contract\ListingInterface;

/**
 * Class ProductTag
 * @package Farmerant\Farmerantcrawl\Listing
 */
class ProductTag implements ListingInterface
{
    /**
     *
     */
    const TYPE_CATEGORY = 'Category';

    /**
     *
     */
    const TYPE_TAG = 'Tag';

    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * ProductTag constructor.
     * @param $type
     * @param $category
     * @param $name
     * @param $value
     */
    public function __construct($type, $category, $name, $value)
    {
        $this->type = $type;
        $this->category = $category;
        $this->name = $name;
        $this->value = $value;
    }


    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'type' => $this->type,
            'category' => $this->category,
            'name' =>$this->name,
            'value' => $this->value,
        ];
    }
}
