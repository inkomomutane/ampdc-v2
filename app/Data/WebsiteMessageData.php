<?php

namespace App\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
/** @typescript **/
class WebsiteMessageData extends Data
{
    public function __construct(
        public ?string $id,
        public ?string $name,
        public ?string $message,
        public ?string $email,
        public ?string $contact,
        public ?bool $is_read,
        public mixed $date = null,
    ) {}
}
