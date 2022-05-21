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
       $mas=explode("ANSWER: A",$text);


        $n=count($mas);
        echo $n;
        for($j=0;$j<$n-1;$j++){
            $m=strlen($mas[$j]);


                    $savol=[];
                    $savol[0]="";
                    $savol[1]="";
                    $savol[2]="";
                    $savol[3]="";
                    $savol[4]="";
                    $z=0;
                    for($k=0;$k<$m;$k++){

                        if(($mas[$j][$k]=='A' && $mas[$j][$k+1]=='.' && $mas[$j][$k+2]==' ')
                            || ($mas[$j][$k]=='B' && $mas[$j][$k+1]=='.' && $mas[$j][$k+2]==' ')
                            || ($mas[$j][$k]=='C' && $mas[$j][$k+1]=='.' && $mas[$j][$k+2]==' ')
                            ||($mas[$j][$k]=='D' && $mas[$j][$k+1]=='.' && $mas[$j][$k+2]==' ') ){
                            $k+=2; $z+=1;

                        }
                        $savol[$z].=$mas[$j][$k];

                    }
                    $savollar[]=$savol;




            }

        dd($savollar);

    }
}
