<?php

namespace App\Http\Controllers\Neighborhood;

use App\Models\Neighborhood;

class DeleteNeighborhood
{


    public function handle(Neighborhood $neighborhood): bool
    {

            try {
                $neighborhood->delete();
                flash()->addSuccess('Neighborhood removed successful.');

                return true;
            } catch (\Throwable $e) {
                flash()->addError('Error removing neighborhood');

                return false;
            }
    }

    public function __invoke(Neighborhood $neighborhood)
    {
        $this->handle($neighborhood);

        return redirect()->back();
    }
}
