<?php

namespace Farmerant\Tests;

use Farmerant\Farmerantcrawl\Listing\Address;
use Farmerant\Farmerantcrawl\Listing\Supplier;
use PHPUnit\Framework\TestCase;

class SupplierTest extends TestCase
{
    /** @test */
    public function to_array()
    {
        // Arrange
        $supplier = new Supplier(
            'Supplier',
            'test@example.com',
            'http://www.google.com',
            '+8869999999',
            'http://www.facebook.com'
        );

        $supplier->addTag(['tag' => 'value']);

        $supplier->setAddress(
            new Address(20, 20, 'CHRIS NISWANDEE', 'SMALLSYS INC', '795 E DRAGRAM', 'TUCSON', 85705, 'USA')
        );

        // Assert
        $this->assertArraySubset([
            'supplier_name' => 'Supplier',
            'email' => 'test@example.com',
            'website' => 'http://www.google.com',
            'phone' => '+8869999999',
            'logo_url' => 'http://www.facebook.com',
            'latitude' => 20,
            'longitude' => 20,
            'address_line_1' => 'CHRIS NISWANDEE',
            'address_line_2' => 'SMALLSYS INC',
            'address_locality' => '795 E DRAGRAM',
            'address_state' => 'TUCSON',
            'address_post_code' => 85705,
            'address_country' => 'USA',
            'tags' => [
                ['tag' => 'value'],
            ]
        ], $supplier->toArray());
    }
}
