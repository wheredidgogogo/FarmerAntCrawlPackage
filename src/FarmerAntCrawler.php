<?php

namespace Farmerant\Farmerantcrawl;
use Farmerant\Farmerantcrawl\Listing\Product;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;

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
     * @var Collection
     */
    private $products;

    /**
     * @var Client
     */
    private $client;

    /**
     * FarmerAntCrawler constructor.
     * @param $token
     * @param $url
     */
    public function __construct($token, $url)
    {
        $this->token = $token;
        $this->client = new Client(['base_uri' => $url]);
        $this->products = new Collection();
    }

    /**
     * Add products
     *
     * @param Product $product
     */
    public function add(Product $product)
    {
        $this->products->push($product);
    }

    /**
     * Clear products
     */
    public function clear()
    {
        $this->products = new Collection();
    }

    /**
     * Send all products
     */
    public function sendAllProducts()
    {
        $this->products->each(function ($product) {
           $this->request($product);
        });
    }

    /**
     * Request to api
     *
     * @param Product $product
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    private function request(Product $product)
    {
        return $this->client->request('POST', '/api/crawl', [
            'header' => [
                'Authorization' => $this->token,
            ],
            'json' => $product->toArray(),
        ]);
    }
}
