<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    
    protected $table = "star";
    protected $fillable = ["user_id","full_name","part_name","html_url","description","stargazers_count","language","license","owner_url","owner_name"];
}
