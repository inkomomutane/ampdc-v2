<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self LOW()
 * @method static self MEDIUM()
 * @method static self HIGH()
 * @method static self URGENT()
 *
 * @typescript
 *
 * @typescript-transformer \Spatie\TypeScriptTransformer\Transformers\SpatieEnumTransformer::class
 */
final class CampaignPriorityEnum extends Enum
{
}
