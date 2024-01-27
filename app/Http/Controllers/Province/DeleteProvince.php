<?php

namespace  App\Http\Controllers\Province;

use App\Models\Province;

class DeleteProvince
{

    public function handle(Province $province): bool
    {
        try {
            $province->delete();
            flash()->addSuccess('Province deleted successful');

            return true;
        } catch (\Throwable $e) {
            flash()->addError('Error deleting province"');

            return false;
        }
    }

    public function __invoke(Province $province)
    {
        $this->handle($province);

        return redirect()->back();
    }
}
