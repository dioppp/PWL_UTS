<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BundleModel extends Model
{
    use HasFactory;
    protected $table = 'bundles';
    protected $fillable = [
        'name',
        'price'
    ];
}
