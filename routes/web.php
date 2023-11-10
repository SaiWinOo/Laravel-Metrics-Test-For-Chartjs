<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use SaKanjo\EasyMetrics\Enums\Range;
use SaKanjo\EasyMetrics\Metrics\Doughnut;
use SaKanjo\EasyMetrics\Metrics\Trend;
use SaKanjo\EasyMetrics\Metrics\Value;

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

    [$labels, $data] = Trend::make(User::class)
        ->countByDays();

    return response()->json([
        'labels' => $labels,
        'data' => $data
    ]);

});
