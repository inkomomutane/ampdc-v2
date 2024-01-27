<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self ACTIVE()
 * @method static self PENDING()
 * @method static self COMPLETED()
 * @method static self SUSPENDED()
 *
 * @typescript
 *
 * @typescript-transformer \Spatie\TypeScriptTransformer\Transformers\SpatieEnumTransformer::class
 */
final class CampaignEnum extends Enum
{
}
