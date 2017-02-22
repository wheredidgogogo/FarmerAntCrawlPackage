<?php

namespace Farmerant\Tests;

use Farmerant\Farmerantcrawl\Listing\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    /** @test */
    public function to_array()
    {
        // Arrange
        $address = new Address(20, 20, 'CHRIS NISWANDEE', 'SMALLSYS INC', '795 E DRAGRAM', 'TUCSON', 85705, 'USA');

        // Assert
        $this->assertArraySubset([
            'latitude' => 20,
            'longitude' => 20,
            'address_line_1' => 'CHRIS NISWANDEE',
            'address_line_2' => 'SMALLSYS INC',
            'address_locality' => '795 E DRAGRAM',
            'address_state' => 'TUCSON',
            'address_post_code' => 85705,
            'address_country' => 'USA',
        ], $address->toArray());
    }
}
