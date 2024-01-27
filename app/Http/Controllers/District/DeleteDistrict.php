<?php

namespace App\Http\Controllers\District;

use App\Models\District;

class DeleteDistrict
{
    public function handle(District $district): bool
    { try {
        $district->delete();
        flash()->addSuccess('District removed successful');

        return true;
    } catch (\Throwable $e) {
        flash()->addError('Error removing district');

        return false;
    }
    }

    public function __invoke(District $district)
    {
        $this->handle($district);
        return redirect()->back();
    }
}
