<?php

namespace App\Http\Controllers\WebsiteMessage;

use App\Data\WebsiteMessageData;
use App\Models\WebsiteMessage;
use Inertia\Inertia;

class GetWebsiteMessagesController
{
    public static function handle()
    {
        return WebsiteMessageData::collection(
            WebsiteMessage::orderBy('is_read')->
            orderBy('updated_at', 'desc')->paginate(50));
    }

    public function __invoke()
    {
        return Inertia::render('Website/Message/Index', [
            'website_messages' => static::handle(),
        ]);
    }
}
