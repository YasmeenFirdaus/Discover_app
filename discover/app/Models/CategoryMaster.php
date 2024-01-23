<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CategoryMaster extends Model
{
    protected $table = 'category_master'; // Explicitly specifying the table name

    protected $fillable = [
        'category_name'
    ];

    public function api()
    {
        return $this->belongsTo(ApiData::class);
    }
}