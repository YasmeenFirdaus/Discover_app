<?php

// app/Api.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AddApi extends Model 
{
    protected $table = 'add_api'; // Explicitly specifying the table name

    protected $fillable = ['api_name', 'api_url', 'category', 'created_by', 'updated_by'];


    public function apiData()
    {
        return $this->hasMany(ApiData::class);
    }
}

