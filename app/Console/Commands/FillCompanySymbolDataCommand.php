<?php

namespace App\Console\Commands;

use App\Models\CompanySymbol;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FillCompanySymbolDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:company-symbol';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $symbols = $this->callNasdakService();

        foreach($symbols as $symbol)
        {
            CompanySymbol::firstOrCreate(
                [
                    'symbol'             => $symbol['Symbol'],
                ],
                [
                'company_name'           => $symbol['Company Name'],
                'financial_status'       => $symbol['Financial Status'],
                'markey_category'        => $symbol['Market Category'],
                'round_lot_size'         => $symbol['Round Lot Size'],
                'security_name'          => $symbol['Security Name'],
                'symbol'                 => $symbol['Symbol'],
                'test_issue'             => $symbol['Test Issue'],
            ]);

        }
    }

    /**
     *  Call nasdak api to list compay symbols
     * @param
     * @return json
     */
    private function callNasdakService()
    {
        return Http::get(config('app.nasdaq_company_symbol_url'))->json();
    }
}
