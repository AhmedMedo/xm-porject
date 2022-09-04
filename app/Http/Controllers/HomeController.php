<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use App\Models\CompanySymbol;
use App\Services\RapidApiService;
use App\Http\Requests\SearchRequest;
use App\Jobs\SendSearchResultJob;
use App\Repositories\CompanySymbolRepository;

class HomeController extends Controller
{
    //

    protected $companySymbolRepository;
    protected $rapidApiService;

    public function __construct(CompanySymbolRepository $companySymbolRepository , RapidApiService $rapidApiService)
    {
        $this->companySymbolRepository = $companySymbolRepository;
        $this->rapidApiService = $rapidApiService;
    }


    public function index()
    {
        $symbols =  $this->companySymbolRepository->get(['company_name' , 'symbol']);
        return view('home',compact('symbols'));
    }

    public function search(SearchRequest $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $company = $this->companySymbolRepository->findBySymbol($request->compay_symbol);

        $prices = $this->rapidApiService->getHistoricalData(
                $request->compay_symbol ,
                $start_date ,
                $end_date
            );

        if(empty($prices))
        {
            return redirect()->route('home')->with('errorMessage' , 'No Data found for '.$company->company_name);
        }

        $date_ranges = [];
        $open_prices = [];
        $close_prices = [];

        foreach($prices as $price)
        {
            array_push($date_ranges , $price['date']);
            array_push($open_prices , $price['open']);
            array_push($close_prices , $price['close']);
        }


        dispatch(new SendSearchResultJob($prices , $company , $start_date , $end_date , $request->email));


        return view('result' , compact('prices' , 'date_ranges' , 'open_prices' , 'close_prices' , 'start_date' , 'end_date' , 'company'));
    }

    public function testSearch()
    {
        $start_date = '2022/08/31';
        $end_date = '2022/09/03';
        $company = $this->companySymbolRepository->findBySymbol('AAOI');

        $prices = $this->rapidApiService->getHistoricalData(
                'AAOI' ,
                $start_date ,
                $end_date
            );

        return PDF::loadView('search_pdf' , compact('prices' , 'start_date' , 'end_date' , 'company'))->stream('test.pdf');
    }

}
