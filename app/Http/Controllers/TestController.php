<?php

namespace App\Http\Controllers;

use Faker\Core\File;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function check( Request $request){

        $json = json_encode(file_get_contents($request->file), true);
        $text=json_decode($json);$i=0;

        $k=0;
        $savollar=[];
       $n=strlen($text);
       $mas=explode('?',$text);
dd($mas);

    }
}
