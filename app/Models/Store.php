<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name',
        'category_id',
        'area_id',
        'description',
        'image_url'
    ];

    public function getArea() //修正
    {
        return '#' . optional($this->area)->name;
    }

    public function getCategory() //修正
    {
        return '#' . optional($this->category)->name;
    }

    public function Area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function Category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public static function toDetail($store_id)
    {
        $query = self::query();
        $query->where('id', "$store_id");

        $results = $query->first();
        return $results;
    }

    public function reserve()
    {
        return $this->hasOne('App\Models\Reserve');
    }

    public static function doSearch($area, $category, $content)
    {
        $query = self::query();
        if (!empty($area)) {
            $query->where('area_id', "$area");
        }
        if (!empty($category)) {
            $query->where('category_id', "$category");
        }
        if (!empty($content)) {
            $query->where('name', 'like', "%{$content}%");
        }

        $results = $query->get();
        return $results;
    }
}
