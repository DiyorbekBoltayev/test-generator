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
                    $savol[5]=1;
                    $savol[6]=0;
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


        $variantlar=[];
        for($j=0;$j<$n-1;$j++){

            $olindi=[0,0,0,0];
            $rn=$savollar[$j];
            rmatn1:
            $ri=rand(1,4);
            if($olindi[$ri-1]){
                goto rmatn1;
            }
            $rn[1]=$savollar[$j][$ri];
            if($ri==1){
                $rn[5]=1;
            }
            if($ri==1){
                $olindi[0]=1;
            }if($ri==2){
                $olindi[1]=1;
            }if($ri==3){
                $olindi[2]=1;
            }if($ri==4){
                $olindi[3]=1;
            }
            rmatn2:
            $ri=rand(1,4);
            if($olindi[$ri-1]){
                goto rmatn2;
            }
            $rn[2]=$savollar[$j][$ri];
            if($ri==1){
                $rn[5]=2;
            }
            if($ri==1){
                $olindi[0]=1;
            }if($ri==2){
                $olindi[1]=1;
            }if($ri==3){
                $olindi[2]=1;
            }if($ri==4){
                $olindi[3]=1;
            }
            rmatn3:
            $ri=rand(1,4);
            if($olindi[$ri-1]){
                goto rmatn3;
            }
            $rn[3]=$savollar[$j][$ri];
            if($ri==1){
                $rn[5]=3;
            }
            if($ri==1){
                $olindi[0]=1;
            }if($ri==2){
                $olindi[1]=1;
            }if($ri==3){
                $olindi[2]=1;
            }if($ri==4){
                $olindi[3]=1;
            }
            rmatn4:
            $ri=rand(1,4);
            if($olindi[$ri-1]){
                goto rmatn4;
            }
            $rn[4]=$savollar[$j][$ri];
            if($ri==1){
                $rn[5]=4;
            }
            if($ri==1){
                $olindi[0]=1;
            }if($ri==2){
                $olindi[1]=1;
            }if($ri==3){
                $olindi[2]=1;
            }if($ri==4){
                $olindi[3]=1;
            }
            $savollar[$j]=$rn;





        }


for ($t=0;$t<8;$t++){
    $variant=[];
    for ($i=0;$i<25;$i++){
        random: $rand=rand(0,199);
        if($savollar[$rand][6]){
            goto random;
        }
        $variant[]=$savollar[$rand];
        $savollar[$rand][6]=1;


    }
    $variantlar[]=$variant;
}
dd($variantlar);





    }

}


