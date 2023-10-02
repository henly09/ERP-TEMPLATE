<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disbursement extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_amount',
        'beg_bank_balance',
        'col_per_dccr',
        'dis_per_dccr',
        'bank_balance',
        'vouch_id',
        'cust_id',
    ];
}
