<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends \TCG\Voyager\Models\Transaction{
    use HasFactory;

    protected $fillable = ['bank_transaction_id'];

}
