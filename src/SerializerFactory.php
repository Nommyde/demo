<?php

declare(strict_types=1);

namespace App;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;

class SerializerFactory
{
    public static function create()
    {
        return new Serializer([
            new DateTimeNormalizer(['datetime_format' => 'Y-m-d H:i:s']),
        ], [
            new JsonEncoder(),
        ]);
    }
}
