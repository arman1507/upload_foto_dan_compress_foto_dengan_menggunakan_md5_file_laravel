<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use App\m_log_image;//model db
class CompressUpload_C extends Controller
{
    public function default(){
        return view('tes-upload');
    }
    public function upload(Request $req){
        $this->validate($req, [
			'f-u' => 'required', //validator dari input file
		]);
        //ambil nama file
        $f_photo = $req->file('f-u');
        $f_name = $f_photo->getClientOriginalName();
        $f_save = 'uploads/file';
        //compress dan resize
        $manager = new ImageManager(array('driver'=>'GD'));
        //ambil nilai width
        $img_rescale = $manager->make($f_photo);
        $img_rescale->orientate();
        $w = $img_rescale->width();
        $h = $img_rescale->height();
        $r = $w/$h;
        //seleksi potrait atau landscape
        if($r > 1){
            $tmp_w = 1366;
            $tmp_h = null;
        }else{
            $tmp_w = null;
            $tmp_h = 1366;
        }
        //resize dan compress
        $img_rescale->resize($tmp_w, $tmp_h, function($constraint){
            $constraint->aspectRatio();
        })->save($f_save.$f_name,60);
        $f_size = filesize($f_save.$f_name);
        $f_md5 = md5_file($f_save.$f_name);
        //input databse
        $data = m_log_image::all();
        $dat = m_log_image::all()->count();
        $input = new m_log_image;
        $input->img_comp_namafile = $f_name;
        $input->img_comp_size = $f_size;
        $input->md5nya = $f_md5;
       
        if($dat < 1){
            $input->save(); return redirect()->back()->with('message', 'IT WORKS!');
        }else{
        foreach($data as $p){
        if($f_md5==$p->md5nya){
            
            return redirect()->back()->with('message', 'Data Sudah Pernah diupload sebelumnya');}  //data sudah diupload sebelumnya
        else{$input->save(); return redirect()->back()->with('message', 'IT WORKS!');}
    }
}               
    }
    
}