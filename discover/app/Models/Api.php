<?php

// app/Api.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Api extends Model
{
    protected $table = 'apis'; // Explicitly specifying the table name

    protected $fillable = ['api_name', 'api_url', 'categories', 'created_by', 'updated_by'];


    public function apiData()
    {
        return $this->hasMany(ApiData::class);
    }
}

