<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Closeddate extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'store_id',
        'date',
    ];

    public static function searchDate($store_id, $date)
    {
        return self::query()->where('store_id', $store_id)->where('date', $date)->exists();
    }
}
