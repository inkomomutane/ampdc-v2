<?php

namespace App\Data;

/** @typescript */
class ResponsiveImageData
{
    public function __construct(
        public ?MediaLibraryOriginalData $media_library_original
    )
    {
    }
}
