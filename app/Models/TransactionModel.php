<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
      'user_id',
      'shoe_id',
      'bund_id',
      'delivery',
      'status'
    ];
}
