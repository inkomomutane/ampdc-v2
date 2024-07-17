<?php

namespace App\Http\Controllers\WebsiteMessage;

use App\Models\WebsiteMessage;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Spatie\LaravelData\Exceptions\InvalidDataClass;

class ChangeWebsiteReadMessageStateController
{
    /**
     * @throws InvalidDataClass
     */
    public static function handle(WebsiteMessage $message, bool $isRead)
    {
        $message->is_read = $isRead;
        $message->save();

        return $message->getData();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'is_read' => 'boolean',
        ];
    }

    /**
     * @throws InvalidDataClass
     */
    public function __invoke(WebsiteMessage $message, Request $actionRequest)
    {
        return static::handle($message, $actionRequest->is_read);
    }
}
