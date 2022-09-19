<?php

namespace App\Http\Controllers;

use App\Classes\ParsaElastic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public $faIndex = 'question_fa';
    public $arIndex = 'question_ar';
    public $enIndex = 'question_en';
    public $treeIndex = 'subject_tree';
    //
    public function __construct()
    {

    }
    public function index()
    {
        return view('sitemap');
    }




    public function getAllQu(){
        if (Cache::has('generateFaQa')) {
            $generateFaQa = Cache::get('generateFaQa');
        } else {
            $generateFaQa =($this->generateFaQa());
            Cache::put('stats', $generateFaQa, now()->addMinutes(2 * 24 * 60));
        }
        if (Cache::has('generateEnQa')) {
            $generateEnQa = Cache::get('generateEnQa');
        } else {
            $generateEnQa =($this->generateEnQa());
            Cache::put('stats', $generateEnQa, now()->addMinutes(2 * 24 * 60));
        }
        if (Cache::has('generateArQa')) {
            $generateArQa = Cache::get('generateArQa');
        } else {
            $generateArQa =($this->generateArQa());
            Cache::put('stats', $generateArQa, now()->addMinutes(2 * 24 * 60));
        }
//        $generateFaQa =  ($this->generateFaQa());
        $arrayId=[];
        $arrayIdFa=[];
        $arrayIdEn=[];
        if(isset($generateArQa['hits']['hits'])){
          for($i=0;$i<sizeof($generateArQa['hits']['hits']); $i++){
              $arrayId[]=($generateArQa['hits']['hits'][$i]['_id']);
          }
      }
        if(isset($generateFaQa['hits']['hits'])) {
            for ($i = 0; $i < sizeof($generateFaQa['hits']['hits']); $i++) {
                $arrayIdFa[] = ($generateFaQa['hits']['hits'][$i]['_id']);
            }
        }
        if(isset($generateEnQa['hits']['hits'])) {
            for ($i = 0; $i < sizeof($generateEnQa['hits']['hits']); $i++) {
                $arrayIdEn[] = ($generateEnQa['hits']['hits'][$i]['_id']);
            }
        }
            return view('sitemap', ['arrayId'=>$arrayId,'arrayIdFa'=>$arrayIdFa,'arrayIdEn'=>$arrayIdEn]);


    }
    public function generateArQa()
    {

        $params = [
            'query' => [
                'match_all'=> new \stdClass()

            ]
        ];
        $results = (new ParsaElastic())
            ->setIndex($this->arIndex)
            ->additionalParams(['track_total_hits' => true, 'size' => 1000])
            //->debug()
            ->search($params, false);
      return $results;

    }
    public function generateEnQa()
    {

        $params = [
            'query' => [
                'match_all'=> new \stdClass()

            ]
        ];
        $results = (new ParsaElastic())
            ->setIndex($this->enIndex)
            ->additionalParams(['track_total_hits' => true, 'size' => 1000])
            //->debug()
            ->search($params, false);
   return $results;
    }
    public function generateFaQa()
    {

        $params = [
            'query' => [
                'match_all'=> new \stdClass()

            ]
        ];
        $results = (new ParsaElastic())
            ->setIndex($this->faIndex)
            ->additionalParams(['track_total_hits' => true, 'size' => 1000])
            //->debug()
            ->search($params, false);
    return $results;

    }



public function createIdAr(){
    $txt_file = fopen('ID-ar.json','r');
    $a = 1;
    $string=[];
    while ($line = fgets($txt_file)) {

        //$string[]=explode(',', $line);
        $string[]=$line;

        $a++;
    }
    fclose($txt_file);
    return view('sitemap',['string'=>$string]);
}







}
