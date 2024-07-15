<?php

namespace App\Data;

/** @typescript */
 class MediaLibraryOriginalData
{
    public function __construct(
        public ?string $base64svg,
        public ?array  $urls,
    )
    {
    }
}
