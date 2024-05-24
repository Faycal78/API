<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmPresaleIco extends Model
{
    use HasFactory;

    protected $table = 'em_presale_ico';

    protected $fillable = [
        'transaction_id',
        'wallet_id',
        'email',
        'usdvalue',
        'tokensquantity',
        'amoutbought',
        'typecrypto',
    ];

    public $timestamps = true;
}
