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
            'lat' => 20,
            'lng' => 20,
            'address_line_1' => 'CHRIS NISWANDEE',
            'address_line_2' => 'SMALLSYS INC',
            'locality' => '795 E DRAGRAM',
            'state' => 'TUCSON',
            'post_code' => 85705,
            'country' => 'USA',
        ], $address->toArray());
    }
}
