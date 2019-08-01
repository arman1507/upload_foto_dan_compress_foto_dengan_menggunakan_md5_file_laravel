<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_telepon extends Model
{
     protected $table = "tabel_inputangka62";
     protected $primarykey = "nomor_telepon_id";
     protected $fillable = [ "nomor_telepon" ]; 
}
