<?php
namespace App\Repositories;

use App\Models\CompanySymbol;

class CompanySymbolRepository
{

    public function get($fileds =[])
    {
        return count($fileds)? CompanySymbol::get($fileds) : CompanySymbol::get();
    }

    public function findBySymbol($symbol)
    {

        return CompanySymbol::where('symbol' , $symbol)->first();
    }

}
