<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded = array('id');
    protected $fillable = ['name', 'category_id', 'area_id', 'description', 'image_url'];

    public function getArea()//修正
    {
        return '#'.optional($this->area)->name;
    }

    public function getCategory()//修正
    {
        return '#'.optional($this->category)->name;
    }

        public function Area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function Category()
    {
        return $this->belongsTo('App\Models\Category');
    }

}
