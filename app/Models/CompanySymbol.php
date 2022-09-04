<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySymbol extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'financial_status',
        'markey_category',
        'round_lot_size',
        'security_name',
        'symbol',
        'test_issue'
    ];
}
