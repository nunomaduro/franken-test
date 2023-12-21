<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return ini_get('max_execution_time');
});

Route::get('/timeout', function () {
    $x = true;
    $y = 0;

    $startedAt = time();
    $stopAt = $startedAt + 10;

    while ($x) {
        $y++;
        // stop after 30 seconds, but without sleep:
        if (time() > $stopAt) {
            $x = false;
            $stoppedAfter = time() - $startedAt;
        }
    }

    // get php max execution time:
    return $stoppedAfter;
});
