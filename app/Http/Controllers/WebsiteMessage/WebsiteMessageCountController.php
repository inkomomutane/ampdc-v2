<?php

namespace App\Http\Controllers\WebsiteMessage;

use App\Models\WebsiteMessage;

class WebsiteMessageCountController
{
    public static function handle(): int
    {
      return WebsiteMessage::whereIsRead(false)->count();
    }
}
