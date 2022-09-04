<?php

use App\Http\Controllers\HomeController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class , 'index'])->name('home');
Route::post('/search', [HomeController::class , 'search'])->name('search');
// Route::get('/search-test', [HomeController::class , 'testSearch'])->name('testSearch');
// Route::get('/test',function(){

//    $response =  Http::withHeaders([
//         'X-RapidAPI-Key' => config('app.rapidapi_key'),
//         'X-RapidAPI-Host' => config('app.rapidapi_host'),
//     ])->get(config('app.rapidapi_stock_historical_data_url') , [
//         'symbol' => 'GOOG'
//     ])->json();

//     $prices = $response['prices'];
//     $prices_collection = collect($prices);
//     $x = $prices_collection->filter(function ($item) {
//         return $item['date'] < '1661904000';
//     });

//     dd($x);
// });
