<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoeModel extends Model
{
    use HasFactory;
    protected $table = 'shoes';
    protected $fillable = [
        'brand',
        'color',
        'cust_Id',
        'material'
    ];
}
