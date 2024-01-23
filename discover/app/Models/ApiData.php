<?php

// app/ApiData.php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ApiData extends Model
{
    protected $table = 'api_data'; // Explicitly specifying the table name

    protected $fillable = [
        'api_id', 'category_id', 'title', 'description', 'image_url', 'source_name', 'source_url',
        'url', 'content_type', 'published_at', 'author_name', 'author_url', 'category', 'tags', 'metadata',
    ];

    public function api()
    {
        return $this->belongsTo(Api::class);
    }

    public function categoryMaster()
    {
        return $this->belongsTo(CategoryMaster::class, 'category_id');
    }
}

