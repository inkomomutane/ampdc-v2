<?php

namespace App\Http\Middleware;

use App\Data\RoleData;
use App\Http\Controllers\WebsiteMessage\WebsiteMessageCountController;
use Illuminate\Http\Request;
use Inertia\Middleware;
use App\Models\Role;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'messages' => flash()->render([], 'array'),
            'roles' => RoleData::collection(Role::all()),
            'organization' => organization(),
            '_token' => csrf_token(),
            'mails' =>WebsiteMessageCountController::handle() ?? 0,
        ];
    }
}
