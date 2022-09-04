<?php

namespace App\Jobs;

use PDF;
use Illuminate\Bus\Queueable;
use App\Mail\SendSearchResultMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendSearchResultJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $prices;

    public $company;

    public $start_date;

    public $end_date;

    public $email;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($prices , $company , $start_date  , $end_date , $email)
    {
        $this->prices = $prices;

        $this->company = $company;

        $this->start_date = $start_date;

        $this->end_date = $end_date;

        $this->email = $email;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $contents = $this->generatePDF();
        $path = $this->storePDF($contents);
        Mail::to($this->email)->send(new SendSearchResultMail($this->company , $this->start_date , $this->end_date , $path));
    }


    private function generatePDF()
    {

        $prices = $this->prices;
        $start_date = $this->start_date;
        $end_date = $this->end_date;
        $company = $this->company;
        return PDF::loadView('search_pdf' , compact('prices' , 'start_date' , 'end_date' , 'company'))->output();

    }


        /**
     * @param $contents
     * @return string
     */
    private function storePDF($contents): string
    {
        $path = 'pdf/' . time() . '.pdf';
        Storage::put($path, $contents);
        return $path;
    }
}
