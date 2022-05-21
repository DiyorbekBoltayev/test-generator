<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('createdocument');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $json = json_encode(file_get_contents($request->file), true);
        $text = json_decode($json);
        $text=(string)$text;
        $i = 0;

        $k = 0;
        $savollar = [];
        $n = strlen($text);
        $mas = explode("ANSWER: A", $text);


        $n = count($mas);

        for ($j = 0; $j < $n - 1; $j++) {
            $m = strlen($mas[$j]);


            $savol = [];
            $savol[0] = '';
            $savol[1] = '';
            $savol[2] = '';
            $savol[3] = '';
            $savol[4] = '';
            $savol[5] = 1;
            $savol[6] = 0;
            $z = 0;
            for ($k = 0; $k < $m; $k++) {

                if (($mas[$j][$k] == 'A' && $mas[$j][$k + 1] == '.' && $mas[$j][$k + 2] == ' ')
                    || ($mas[$j][$k] == 'B' && $mas[$j][$k + 1] == '.' && $mas[$j][$k + 2] == ' ')
                    || ($mas[$j][$k] == 'C' && $mas[$j][$k + 1] == '.' && $mas[$j][$k + 2] == ' ')
                    || ($mas[$j][$k] == 'D' && $mas[$j][$k + 1] == '.' && $mas[$j][$k + 2] == ' ')) {
                    $k += 2;
                    $z += 1;

                }
                $savol[$z] .= $mas[$j][$k];

            }
            $savollar[] = $savol;


        }


        $variantlar = [];
        for ($j = 0; $j < $n - 1; $j++) {

            $olindi = [0, 0, 0, 0];
            $rn = $savollar[$j];
            rmatn1:
            $ri = rand(1, 4);
            if ($olindi[$ri - 1]) {
                goto rmatn1;
            }
            $rn[1] = $savollar[$j][$ri];
            if ($ri == 1) {
                $rn[5] = 1;
            }
            if ($ri == 1) {
                $olindi[0] = 1;
            }
            if ($ri == 2) {
                $olindi[1] = 1;
            }
            if ($ri == 3) {
                $olindi[2] = 1;
            }
            if ($ri == 4) {
                $olindi[3] = 1;
            }
            rmatn2:
            $ri = rand(1, 4);
            if ($olindi[$ri - 1]) {
                goto rmatn2;
            }
            $rn[2] = $savollar[$j][$ri];
            if ($ri == 1) {
                $rn[5] = 2;
            }
            if ($ri == 1) {
                $olindi[0] = 1;
            }
            if ($ri == 2) {
                $olindi[1] = 1;
            }
            if ($ri == 3) {
                $olindi[2] = 1;
            }
            if ($ri == 4) {
                $olindi[3] = 1;
            }
            rmatn3:
            $ri = rand(1, 4);
            if ($olindi[$ri - 1]) {
                goto rmatn3;
            }
            $rn[3] = $savollar[$j][$ri];
            if ($ri == 1) {
                $rn[5] = 3;
            }
            if ($ri == 1) {
                $olindi[0] = 1;
            }
            if ($ri == 2) {
                $olindi[1] = 1;
            }
            if ($ri == 3) {
                $olindi[2] = 1;
            }
            if ($ri == 4) {
                $olindi[3] = 1;
            }
            rmatn4:
            $ri = rand(1, 4);
            if ($olindi[$ri - 1]) {
                goto rmatn4;
            }
            $rn[4] = $savollar[$j][$ri];
            if ($ri == 1) {
                $rn[5] = 4;
            }
            if ($ri == 1) {
                $olindi[0] = 1;
            }
            if ($ri == 2) {
                $olindi[1] = 1;
            }
            if ($ri == 3) {
                $olindi[2] = 1;
            }
            if ($ri == 4) {
                $olindi[3] = 1;
            }
            $savollar[$j] = $rn;


        }


        for ($t = 0; $t < 8; $t++) {
            $variant = [];
            for ($i = 0; $i < 25; $i++) {
                random:
                $rand = rand(0, 199);
                if ($savollar[$rand][6]) {
                    goto random;
                }
                $variant[] = $savollar[$rand];
                $savollar[$rand][6] = 1;


            }
            $variantlar[] = $variant;
        }


        //faylga yozish boshlandi

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
       $text= $section->addText('Alhamdulillah');
        for($m=0;$m<count($variantlar);$m++){
            $l=$m+1;
            $s='';
            $s=(string)$l;
            $s.='-variant';
            $text=$section->addText($s);
            for($t=0;$t<count($variantlar[$m]);$t++){
                $ll=$t+1;
                $s='';
                $s=(string)$ll;
                $s.='. ';

                $s.=(string)$variantlar[$m][$t][0];

                $text=$section->addText(htmlspecialchars($s));

                $s='A. ';
                $s.=(string)$variantlar[$m][$t][1];
                $text=$section->addText(htmlspecialchars($s));
                $s='B. ';
                $s.=(string)$variantlar[$m][$t][2];
                $text=$section->addText(htmlspecialchars($s));
                $s='C. ';
                $s.=(string)$variantlar[$m][$t][3];
                $text=$section->addText(htmlspecialchars($s));
                $s='D. ';
                $s.=(string)$variantlar[$m][$t][4];
                $text=$section->addText(htmlspecialchars($s));

            }
        }




        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $time=time();

        $objWriter->save("$time.docx");
        return response()->download(public_path("$time.docx"));


    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
