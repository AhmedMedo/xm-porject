<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class RapidApiService
{
    protected $key;
    protected $host;

    public function __construct()
    {
        $this->key = config('app.rapidapi_key');
        $this->host = config('app.rapidapi_host');
    }


    /**
     * getHistoricalData
     *
     * @param  mixed $symbol
     * @param  mixed $start_date
     * @param  mixed $end_date
     * @return object|string
     */
    public function getHistoricalData($symbol , $start_date , $end_date) :object|string
    {
        $response = Http::withHeaders([
                    'X-RapidAPI-Key' => $this->key,
                    'X-RapidAPI-Host' => $this->host,
                ])->get(config('app.rapidapi_stock_historical_data_url') , [
                    'symbol' => trim($symbol)
                ]);

        return $response->ok() && count($response->json()['prices']) ? $this->filter($response->json() , $start_date , $end_date) : '';
    }
    private function filter($response , $start_date , $end_date)
    {
        $start_date = Carbon::parse($start_date)->timestamp;
        $end_date = Carbon::parse($end_date)->timestamp;
        return collect($response['prices'])->filter(function ($item) use ($start_date , $end_date) {
            return $item['date'] >= $start_date && $item['date'] <= $end_date;
        })->map(function($item){
            $item['date'] = Carbon::parse($item['date'])->toDateString();
            return $item;

        });

    }


}
