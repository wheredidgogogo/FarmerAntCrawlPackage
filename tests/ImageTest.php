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
        $image = new Image('http://www.google.com/', 'Test', Image::TYPE_GALLERY);

        // Assert
        $this->assertArraySubset([
            'image_url' => 'http://www.google.com/',
            'image_name' => 'Test',
            'image_type' => 'gallery',
        ], $image->toArray());
    }
}
