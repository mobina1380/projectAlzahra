<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ViewController extends Controller
{

    public function newquestion()
    {
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        return view($dir . '.newquestion');

    }

    public function questionOthersite()
    {
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        return view($dir . '.questionOthersite');

    }

    public function aboutus()
    {
        $lang = LaravelLocalization::setLocale();
        if(isset($lang)){
            return view('rtl.aboutus');
        }




    }

    //start serveices
    public function AnswerSearch()
    {
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        return view($dir . '.componentServices.service1');

    }

    public function SimilarQuestion()
    {
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        return view($dir . '.componentServices.service2');

    }

    public function ErrorCorrection()
    {
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        return view($dir . '.componentServices.service3');

    }

    public function Recommended()
    {
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        return view($dir . '.componentServices.service4');

    }

    public function KeywordExtraction()
    {
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        return view($dir . '.componentServices.service5');

    }

    public function QuestionTextSummary()
    {
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        return view($dir . '.componentServices.service6');

    }

    public function Classification()
    {
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        return view($dir . '.componentServices.service7');

    }

    public function KnowledgeBased()
    {
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        return view($dir . '.componentServices.service8');

    }

    //end services
    public function signin()
    {
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        return view($dir . '.signin');

    }

    public function signup()
    {
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        return view($dir . '.signup');

    }



    public function privacy()
    {
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        return view('.privacy.privacy');

    }








}
