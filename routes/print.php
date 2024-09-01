<?php

use App\Http\Controllers\Victim\PrintVictimData;

Route::middleware('auth')->group(function () {
    Route::get('print/victim-data/{victim}', PrintVictimData::class)->name('print.victim-data');
});
