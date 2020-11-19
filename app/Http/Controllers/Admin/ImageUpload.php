<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageUpload extends Controller
{
    public function Upload(Request $request)
    {

      $path =  $request->file('image')->store('uploads','public');
        return view('/admin/upload',['path'=> $path]);
    }
}

