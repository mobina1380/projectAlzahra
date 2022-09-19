<?php

namespace App\Http\Controllers;

use App\Classes\Classification;
use App\Classes\Summarization;
use App\Classes\TagRecommander;
use Illuminate\Http\Request;
use App\Classes\SpellCorrection;

class IndexController extends Controller
{

    public function index()
    {
        return view("rtl.componentServices.service3");
    }

    public function getReq(Request $request)
    {
        $spellCorrection = new SpellCorrection();
        return $spellCorrection->query($request->input('text'));
    }
    public function submitTag(Request $request)
    {
        $x = new TagRecommander();
        $d = $x->query($request->input('text'));
        return $d;
//        $spellCorrection = new SpellCorrection();
//        return $spellCorrection->query($request->input('text'));
//        $x = new TagRecommander();
//     //   return $x->query($request->input('text'));
//       dd( $x->query($request->input('text');
    }
    public function Summarization(Request $request)
    {
        $g = new Summarization();
        $f = $g->query($request->input('text'));
        return $f;
    }
    public function Classification(Request $request)
    {
       // return $request ; die();
        $c = new Classification();
        $cc = $c->query($request->input('text'),$request->input('model'),$request->input('lang'));
        return $cc;
    }
}
