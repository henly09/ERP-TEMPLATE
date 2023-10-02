<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vouchreqs extends Model
{
    use HasFactory;
    protected $fillable = [
        'particulars',
        'amount',
        'requested_by',
        'check_by',
        'cust_id',
        'comments',
    ];
}
