<?php
namespace App\DataFixtures\Provider;

use Faker\Provider\Base;

class PictureProvider extends Base
{

    const PICTURE_PROVIDER = [
      'image_1.jpg',
      'image_2.jpg',
      'image_3.jpg',
      'image_4.jpg',
      'image_5.jpg',
    ];

    public function getPicture(): string
    {
        return 'images/' . self::randomElement(static::PICTURE_PROVIDER);
    }
}