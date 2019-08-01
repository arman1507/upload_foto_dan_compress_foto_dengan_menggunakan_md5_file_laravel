<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_log_image extends Model
{
     protected $table = "log_image";
     protected $primarykey = "img_comp_id";
     protected $fillable = ["img_comp_namefile", "img_comp_size" ]; 
}
