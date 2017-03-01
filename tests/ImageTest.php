<?php

namespace Farmerant\Tests;

use Farmerant\Farmerantcrawl\Listing\Image;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    /** @test */
    public function to_array()
    {
        // Arrange
        $image = new Image();
        $image->fill([
            'originUrl' => 'http://www.google.com/',
            'thumbUrl' => 'http://www.google.com/',
            'largeUrl' => 'http://www.google.com/',
            'order' => 1,
            'name' => 'Test',
        ]);

        // Assert
        $this->assertArraySubset([
            'image_url' => 'http://www.google.com/',
            'image_name' => 'Test',
            'image_order' => 1,
            'image_thumb_url' => 'http://www.google.com/',
            'image_large_url' => 'http://www.google.com/',
        ], $image->toArray());
    }
}
