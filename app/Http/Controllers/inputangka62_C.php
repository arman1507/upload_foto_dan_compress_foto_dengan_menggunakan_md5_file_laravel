<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_telepon;

class inputangka62_C extends Controller
{
    public function default(){
        $nomor = "62";
        return view('tes-input-62',['n' => $nomor] );
    }

    public function input(request $req){
        $f_name = $req->idnegara.$req->area1.$req->area2.$req->area3;
        $input = new m_telepon;
        $input->nomor_telepon = $f_name;
        $input->save();
        return redirect('/notelepon');
        //echo 'Nomor :'.$f_name;
    }
}
