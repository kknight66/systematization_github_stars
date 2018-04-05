<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StarTag extends Model
{
    protected $table = "tag";
    protected $fillable = ["user_id","star_id","tag_name"];
}
