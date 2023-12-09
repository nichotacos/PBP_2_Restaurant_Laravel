<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionCart extends Model
{
    use HasFactory;
    protected $table = 'transactions_cart';
    protected $primaryKey = 'id';
    protected $fillable = [
        'transactionId',
        'cartId',
    ];
}
