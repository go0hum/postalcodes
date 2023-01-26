<?php

use Illuminate\Support\Facades\Route;

use App\Models\Settlement;
use App\Models\Municipality;
use App\Http\Resources\AddressCollection;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    Settlement::with('municipality', 'locality', 'municipality.entity')->where('zip_code', 34198)->get();
    return view('welcome');
});
