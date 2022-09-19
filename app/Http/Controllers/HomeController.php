<?php

namespace App\Http\Controllers;

use App\Classes\Classification;
use App\Classes\SpellCorrection;
use App\Classes\TagRecommander;
use App\Models\Articles;
use App\Models\Category;
use App\Models\comments;
use App\Models\events;
use App\Models\news;
use App\Models\User;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use App\Classes\ParsaElastic;
use App\Classes\SearchParams;
use \Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use function PHPUnit\Framework\returnArgument;

class HomeController extends Controller
{
    public $searchIndex = 'question_*';
    public $autoCompleteIndex = 'autocomplete';
    public $relatedIndex = 'relation_*';
    public $relatedIndex2 = 'questions';
    public $relatedIndex3 = 'fa_relation';
    public $treeIndex = 'subject_tree';
    public $treeIndex2 = 'tags_tree';
    public $faIndex = 'question_fa';
    public $arIndex = 'question_ar';
    public $enIndex = 'question_en';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function autocomplete(Request $request)
    {
        $terms = $this->_autoCompelete($request->input('term'));

        $result = [];
        if (is_array($terms) && count($terms) > 0) {
            $terms = collect($terms);
            $result = $terms->map(function ($term) {
                return [
                    'label' => $term['_source']['key'],
                    'value' => $term['_source']['key']
                ];
            });
        }
        return $result;

    }

    public function home(Request $request)
    {
     $news=$this->News();
     $events=$this->Events();


        if (Cache::has('tree')) {
            $tree = Cache::get('tree');
        } else {
            $tree = $this->allTree();
            Cache::put('stats', $tree, now()->addMinutes(2 * 24 * 60));
        }
        $treeUl =  ($this->print_tree($tree, $tree[0]));

        $data = [];
        if (Cache::has('stats') && false) {
            $data = Cache::get('stats');

        } else {
            $stats = $this->getStats();

            if (isset($stats['aggregations']) && !empty($stats['aggregations'])) {

                $data = $stats['aggregations'];


                $data['total'] = $stats['hits']['total']['value'];


                if (strpos(LaravelLocalization::getLocalizedURL(), '/fa') !== false) {
                    $pp = 'question_fa';
                }
                if (strpos(LaravelLocalization::getLocalizedURL(), '/ar') !== false) {
                    $pp = 'question_ar';
                }
                if (strpos(LaravelLocalization::getLocalizedURL(), '/en') !== false) {
                    $pp = 'question_en';
                }

                $getLatest = $this->getLatest('10', $pp);
                $getLatestquestion = $getLatest['hits']['hits'];
                $getview = $this->getView('10', $pp);
                $getviewquestion = $getview['hits']['hits'];


                Cache::put('stats', $data, now()->addMinutes(120));
            }
        }


        return view('index', compact('data'), ['getLatestquestion' => $getLatestquestion, 'getviewquestion' => $getviewquestion,'tree'=>$tree,'treeUl'=>$treeUl,'news'=>$news,'events'=>$events]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function allTree()
    {

        $params = [
            'sort' => [
                'parent_id' => [
                    'order' => 'asc',
                ]
            ],
            'query' => [
                'match_all'=> new \stdClass()
//                'query_string' => [
//                    'default_field' => 'parent_id',
//                    'query' => $id
//                ]
            ]
        ];
        $results = (new ParsaElastic())
            ->setIndex($this->treeIndex)
            ->additionalParams(['track_total_hits' => true, 'size' => 500000])
            //->debug()
            ->search($params, false);
        if(!$results['hits']['hits'])
            return false;
        $treeArr = [];
        $tree = $results['hits']['hits'];
        foreach ($tree as $i => $arr){
            $id = $arr['_id'];
            $name = $arr['_source']['topic'];
            $parent = $arr['_source']['parent_id'];
            $treeArr[$parent][$id] = ['id'=> $id, 'name'=> $name, "parent"=> $parent];
        }
        return $treeArr;
    }
    function print_tree($tree, $nodes){

        $str = '';
       $arraycolor=['#072227','#35858B','#4FBDBA','#1e7b7c'];
        $randomNumber = random_int(0,3);

        foreach ($nodes as $id=> $nodeArray){
            $truncated = Str::limit($nodeArray['name'], 40 , ' ...');
            $str.= "<ul>";
            $str.= "<li class='nav-item'>";
            if(isset($tree[$id])){

                $str.="    <button class='btn btn-toggle align-items-center  text-dark rounded collapsed vazirfont pt-2' data-bs-toggle='collapse' data-bs-target='#home-collapse{$nodeArray['id']}' aria-expanded='false' style='color:{$arraycolor[$randomNumber]} !important;'>
                 {$truncated}

                    </button>";
                $str.= "<div class='collapse' id='home-collapse{$nodeArray['id']}' >";
                $str.= "<ul class='btn-toggle-nav list-unstyled fw-normal pb-1 small mo' id=''>";
                $str.=   "<li>";
                $str.=   "<ul>";
                $str.= $this->print_tree($tree, $tree[$id]);
                $str.=   "</ul>";
                $str.=   "</li>";
                $str.= "</ul>";
                $str.= "</div>";
            }
            else{
                $str.="<a href=".route('search',['q'=>$nodeArray['name']])."><button class='btn btn-toggle align-items-center  text-dark rounded collapsed vazirfont pt-2' data-bs-toggle='collapse' data-bs-target='#home-collapse{$nodeArray['id']}' aria-expanded='false' style='color:{$arraycolor[$randomNumber]} !important;'>
                 {$truncated}
                    </button></a>";

            }


            $str.= "</li>";
            $str.= "</ul>";
        }
        return $str;
    }
    function print_tree_OtherPage($tree, $nodes){

        $str = '';
        $arraycolor=['#072227','#35858B','#4FBDBA','#1e7b7c'];
        $randomNumber = random_int(0,3);

        foreach ($nodes as $id=> $nodeArray){
            $truncated = Str::limit($nodeArray['name'], 15 , ' ...');
            $str.= "<ul>";
            $str.= "<li class='nav-item'>";
            if(isset($tree[$id])){

                $str.="    <button class='btn btn-toggle align-items-center  text-dark rounded collapsed vazirfont pt-2 ' data-bs-toggle='collapse' data-bs-target='#home-collapse{$nodeArray['id']}' aria-expanded='false' style='color:{$arraycolor[$randomNumber]} !important;'>
                 {$truncated}

                    </button>";
                $str.= "<div class='collapse' id='home-collapse{$nodeArray['id']}' >";
                $str.= "<ul class='btn-toggle-nav list-unstyled fw-normal pb-1 small mo' id=''>";
                $str.=   "<li>";
                $str.=   "<ul>";
                $str.= $this->print_tree_OtherPage($tree, $tree[$id]);
                $str.=   "</ul>";
                $str.=   "</li>";
                $str.= "</ul>";
                $str.= "</div>";
            }
            else{
                $str.="<a href=".route('search',['q'=>$nodeArray['name']])."><button class='btn btn-toggle align-items-center  text-dark rounded collapsed vazirfont pt-2' data-bs-toggle='collapse' data-bs-target='#home-collapse{$nodeArray['id']}' aria-expanded='false' style='color:{$arraycolor[$randomNumber]} !important;'>
                 {$truncated}
                    </button></a>";

            }


            $str.= "</li>";
            $str.= "</ul>";
        }
        return $str;
    }
    public  function  facetsearch(Request $request){
        if (Cache::has('tree')) {
            $tree = Cache::get('tree');
        } else {
            $tree = $this->allTree();
            Cache::put('stats', $tree, now()->addMinutes(2 * 24 * 60));
        }
        $treeUl =  ($this->print_tree($tree, $tree[0]));
        $results = $this->facet($request);

        if (strpos(LaravelLocalization::getLocalizedURL(), '/fa') !== false) {
            $pp = 'question_fa';
        }
        if (strpos(LaravelLocalization::getLocalizedURL(), '/ar') !== false) {
            $pp = 'question_ar';
        }
        if (strpos(LaravelLocalization::getLocalizedURL(), '/en') !== false) {
            $pp = 'question_en';
        }
        $getLatest = $this->getLatest('10', $pp);
        $getLatestquestion = $getLatest['hits']['hits'];

        return view('rtl.Facets', ['results' =>$results,'getLatestquestion'=>$getLatestquestion,'treeUl'=>$treeUl]);
    }
    public function facet(Request $request)
    {

        $queryString = '';
        $tagsQ = [];
        if(!empty($request->input('tags'))) {
            foreach ($request->input('tags') as $i => $tag)
                $tagsQ[] = 'tags: "' . $tag . '"';
        }
        $queryString = join(' AND ', $tagsQ);
        $langQ = [];

        if(!empty($request->input('langs'))){
            foreach ($request->input('langs') as $i=>$lang)
                $langQ[] =  'language: '.$lang;

            if(!empty($queryString))
                $queryString.=' AND ';

            $queryString.= join(' AND ', $langQ);
        }


        $sourceQ = [];

        if(!empty($request->input('source'))){
            foreach ($request->input('source') as $i=>$source)
                $sourceQ[] =  'source: '.$source;

            if(!empty($queryString))
                $queryString.=' AND ';

            $queryString.= join(' AND ', $sourceQ);
        }
        if(!empty($request->input('question'))){
            if(!empty($queryString))
                $queryString.=' AND ';
            $queryString.= 'question: ('.$request->input('question').')';
        }

        //  $query = "tags: \"عدم تحريف\" AND language:fa AND question:(در شأن صحابه نازل شده)";
       // $query = "tags: \"\" AND language:fa AND question:(در شأن صحابه نازل شده)";
        //dd($query);
        $params = SearchParams::facet($queryString);
        $results = (new ParsaElastic())
            ->setIndex($this->searchIndex)
            //->debug()
            ->search($params, false);
        $aggre = $results['aggregations'];
        $data = $this->makeDataRecordsReady($results['hits']['hits'],true,true);
        $took = $results['took'];
        $data = array_map([$this, '_format'], $data);
        $total = $results['hits']['total']['value'];#$results['_count']['count'];

        return [
            'data' => $data,
            'took' => $took,
             'aggre'=>$aggre
        ];

    }
    public function maketree(Request $request)
    {


        $params = [
            'query' => [
                'query_string' => [
                    'default_field'=>'parent_id',
                    'query'=> 0
                ]
            ]
        ];
        $results = (new ParsaElastic())
            ->setIndex($this->treeIndex)
            ->search($params, false);

        return $results;
    }
    public function maketreebyId(Request $request,$id)
    {

        $query = $id ?? '*';
        $params = [
            'query' => [
                'query_string' => [
                    'default_field'=>'parent_id',
                    'query'=> $id
                ]
            ]
        ];
        $results = (new ParsaElastic())
            ->setIndex($this->treeIndex)
            ->search($params, false);
        return $results;

    }
    public function search(Request $request)
    {
        if (Cache::has('tree')) {
            $tree = Cache::get('tree');
        } else {
            $tree = $this->allTree();
            Cache::put('stats', $tree, now()->addMinutes(2 * 24 * 60));
        }
        $treeUl =  ($this->print_tree_OtherPage($tree, $tree[0]));
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';

        $spellCorrection = new SpellCorrection();
        $newText = $request->input('q');
        $newText = $spellCorrection->query($request->input('q'));
        if (json_decode($newText)) {
            $_tmp = json_decode($newText, true);

            $newText = $_tmp['Output'];

        }
        $results = $this->getSearchResult($request,true);

        if (strpos(LaravelLocalization::getLocalizedURL(), '/fa') !== false) {
            $pp = 'question_fa';
        }
        if (strpos(LaravelLocalization::getLocalizedURL(), '/ar') !== false) {
            $pp = 'question_ar';
        }
        if (strpos(LaravelLocalization::getLocalizedURL(), '/en') !== false) {
            $pp = 'question_en';
        }
        $getLatest = $this->getLatest('10', $pp);
        $getLatestquestion = $getLatest['hits']['hits'];
        $maketree = $this->maketree($request);
        $tree=$maketree['hits']['hits'];
        $maketreebyId=[];
        $name=[];

        for($i=0;$i<sizeof($tree);$i++){
            $maketreebyId[] = $this->maketreebyId($request,$tree[$i]['_id']);
            $name[]=$tree[$i]['_source']['topic'];
        }
        if (empty($results)) {
            return view('404.blade.php');
        } else {
            return view($dir . '.searchreasult',
                [
                    'results' => $results,
                    'newText' => $newText,
                    'text' => $request->input('q'),
                    'getLatestquestion' => $getLatestquestion,
                    'name'=>$name,
                    'maketreebyId'=>$maketreebyId,
                    'treeUl'=>$treeUl
                ]);
        }

    }
    public function getById(Request $request, $id)
    {
        $comment=$this->comments($id);

        if (Cache::has('tree')) {
            $tree = Cache::get('tree');
        } else {
            $tree = $this->allTree();
            Cache::put('stats', $tree, now()->addMinutes(2 * 24 * 60));
        }
        $treeUl =  ($this->print_tree_OtherPage($tree, $tree[0]));
        $lang = App::getLocale();

        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        $results = $this->elasticsearchGetAllID($request, $id);
//        '6346262004037970'
        $simularityquestionlast=[];
        $relatedQuestion = ($this->getRelatedQuestion($id));

        for($i=0;$i<sizeof($relatedQuestion['hits']['hits']);$i++){
            $simularityquestionlast[] = ($this->simularity2($relatedQuestion['hits']['hits'][$i]['_source']['to']));
            array_push($simularityquestionlast[$i],$relatedQuestion['hits']['hits'][$i]['sort'][0]);
        }

        if (strpos(LaravelLocalization::getLocalizedURL(), '/fa') !== false) {
            $pp = 'question_fa';
        }
        if (strpos(LaravelLocalization::getLocalizedURL(), '/ar') !== false) {
            $pp = 'question_ar';
        }
        if (strpos(LaravelLocalization::getLocalizedURL(), '/en') !== false) {
            $pp = 'question_en';
        }
        $getLatest = $this->getLatest('10', $pp);
        $getLatestquestion = $getLatest['hits']['hits'];
        $getview = $this->getView('10', $pp);
        $getviewquestion = $getview['hits']['hits'];
        $maketree = $this->maketree($request);
        $tree=$maketree['hits']['hits'];
        $maketreebyId=[];
        $name=[];
        for($i=0;$i<sizeof($tree);$i++){
            $maketreebyId[] = $this->maketreebyId($request,$tree[$i]['_id']);
            $name[]=$tree[$i]['_source']['topic'];
        }

        return view($dir . '.questionview', ['results' => $results, 'relatedQuestion' => $relatedQuestion, 'getLatestquestion' => $getLatestquestion, 'id' => $id,'name'=>$name,'maketreebyId'=>$maketreebyId,'simularityquestionlast'=>$simularityquestionlast,'getviewquestion'=>$getviewquestion,'treeUl'=>$treeUl,'comment'=>$comment]);



    }
    public function tags(Request $request, $tag)
    {
        if (Cache::has('tree')) {
            $tree = Cache::get('tree');
        } else {
            $tree = $this->allTree();
            Cache::put('stats', $tree, now()->addMinutes(2 * 24 * 60));
        }
        $treeUl =  ($this->print_tree_OtherPage($tree, $tree[0]));
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        $results = $this->getAllTags($request, $tag);
        if (strpos(LaravelLocalization::getLocalizedURL(), '/fa') !== false) {
            $pp = 'question_fa';
        }
        if (strpos(LaravelLocalization::getLocalizedURL(), '/ar') !== false) {
            $pp = 'question_ar';
        }
        if (strpos(LaravelLocalization::getLocalizedURL(), '/en') !== false) {
            $pp = 'question_en';
        }
        $getLatest = $this->getLatest('10', $pp);
        $getLatestquestion = $getLatest['hits']['hits'];

        $data = $this->getSimilarTags($request, $tag);

        /*$tags = [];
        if (isset($data['data']) && count($data['data']) > 0) {
            foreach ($data['data'] as $index => $datum) {
                if (!empty($datum['tags']) && count($datum['tags']) > 0)
                    $tags = array_merge($tags, $datum['tags']);
            }
        }
        $tags = array_unique($tags);*/
        $maketree = $this->maketree($request);
        $tree=$maketree['hits']['hits'];
        $maketreebyId=[];
        $name=[];
        for($i=0;$i<sizeof($tree);$i++){
            $maketreebyId[] = $this->maketreebyId($request,$tree[$i]['_id']);
            $name[]=$tree[$i]['_source']['topic'];
        }

        return view($dir . '.tagresult', ['results' => $results, 'sim' => $data, 'getLatestquestion' => $getLatestquestion, 'tag' => $tag,'treeUl'=>$treeUl]);
    }
    public function getByCategory(Request $request, $cat)
    {
        if (Cache::has('tree')) {
            $tree = Cache::get('tree');
        } else {
            $tree = $this->allTree();
            Cache::put('stats', $tree, now()->addMinutes(2 * 24 * 60));
        }
        $treeUl =  ($this->print_tree_OtherPage($tree, $tree[0]));

        $lang = App::getLocale();
        //tree

        $gettree = $this->getBycategorytree($request, $cat);
        if (isset($gettree['hits']['hits'][0])) {
            $idtree = $gettree['hits']['hits'][0]['_source']['topic_id_1'];
            // dd($gettree); die();
            $treetag = $this->getByidtree($request, $idtree);
            // dd($treetag); die();
            for ($i = 0; $i < sizeof($treetag['hits']['hits']); $i++) {
                $tagsparam = $treetag['hits']['hits'][$i]['_source']['tag'];
                $getques = $this->getBytastree($request, $tagsparam);
                //  dd($getques); die();
            }
        }

        //end tree
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        if (strpos(LaravelLocalization::getLocalizedURL(), '/fa') !== false) {
            $pp = 'question_fa';
        }
        if (strpos(LaravelLocalization::getLocalizedURL(), '/ar') !== false) {
            $pp = 'question_ar';
        }
        if (strpos(LaravelLocalization::getLocalizedURL(), '/en') !== false) {
            $pp = 'question_en';
        }
        $getLatest = $this->getLatest('10', $pp);
        if(isset($getLatest))
        {
            $getLatestquestion = $getLatest['hits']['hits'];
        }
        $results = $this->getAllCategories($request, $cat);
        $maketree = $this->maketree($request);
        $tree=$maketree['hits']['hits'];
        $maketreebyId=[];
        $name=[];
        for($i=0;$i<sizeof($tree);$i++){
            $maketreebyId[] = $this->maketreebyId($request,$tree[$i]['_id']);
            $name[]=$tree[$i]['_source']['topic'];
        }

        return view($dir . '.Category', ['results' => $results, 'getLatestquestion' => $getLatestquestion, 'cat' => $cat,'treeUl'=>$treeUl]);
    }
    public function Treeclassification(Request $request, $cat)
    {
        $lang = App::getLocale();
        //tree
        global $getques;
        $gettree = $this->getBycategorytree($request, $cat);
        if (isset($gettree['hits']['hits'][0])) {
            $idtree = $gettree['hits']['hits'][0]['_source']['parent_id'];
            //dd($idtree); die();
            $treetag = $this->getByidtree($request, $idtree);
            //dd($treetag); die();
            for ($i = 0; $i < sizeof($treetag['hits']['hits']); $i++) {
                $tagsparam = $treetag['hits']['hits'][$i]['_source']['tag'];
                $getques = $this->getBytastree($request, $tagsparam);

            }
        }
        $data = $this->makeDataRecordsReady($getques['hits']['hits']);
        //end tree
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        if (strpos(LaravelLocalization::getLocalizedURL(), '/fa') !== false) {
            $pp = 'question_fa';
        }
        if (strpos(LaravelLocalization::getLocalizedURL(), '/ar') !== false) {
            $pp = 'question_ar';
        }
        if (strpos(LaravelLocalization::getLocalizedURL(), '/en') !== false) {
            $pp = 'question_en';
        }
        return view($dir . '.Treeclassification', ['data' => $data, 'cat' => $cat]);


    }
    public function dyscriptlinks(Request $request, $link, $persianname, $string)
    {

        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        $marja = $this->getSiteStats($link);

        return view($dir . '.layouts.dyscriptlinks', ['marja' => $marja, 'link' => $link, 'persianname' => $persianname, 'string' => $string]);

    }
    public function getByMarja(Request $request)
    {
        $lang = App::getLocale();
        $dir = in_array($lang, ['ar', 'fa', 'en']) ? 'rtl' : 'ltr';
        $results = $this->getAllmarja($request);

        return view($dir . '.Marja', ['results' => $results]);
    }
     // start tree
    public function getBycategorytree(Request $request, $cat)
    {
        $query = $cat ?? '*';
        $params = [
            'query' => [
                'query_string' => [
                    'default_field' => 'topic',
                    "query" => "\"$query\""
                ]
            ]
        ];
        $results = (new ParsaElastic())
            ->setIndex($this->treeIndex)
            ->search($params, false);

        return $results;
    }
    public function getByidtree(Request $request, $idtree)
    {

        $query = $idtree ?? '*';
        $params = [
            'query' => [
                'query_string' => [
                    'default_field' => 'topic_id_1',
                    'query' => $query
                ]
            ]
        ];
        $results = (new ParsaElastic())
            ->setIndex($this->treeIndex2)
            ->search($params, false);

        return $results;
    }
    public function getBytastree(Request $request, $tagsparam)
    {
        $query = $tagsparam ?? '*';
        $params = [
            'query' => [
                'query_string' => [
                    'default_field' => 'tags',
                    'query' => $query
                ]
            ]
        ];
        $results = (new ParsaElastic())
            ->setIndex($this->searchIndex)
            ->search($params, false);

        return $results;
    }
   //end tree
    public function getStats()
    {

        $params = SearchParams::stats();
        return (new ParsaElastic())
            ->setIndex($this->searchIndex)
            ->additionalParams(['track_total_hits' => true, 'size' => 0])
            //->debug()
            ->search($params, false);

    }
    public function getSiteStats($link)
    {
        //  $q = "www.porsemanequran.com";
        //   $q = $request;
        $q = $link;
        $params = [
            'query' => [
                'query_string' => [
                    'default_field' => 'source.url',
                    'query' => $q,
                ]
            ],
            "aggs" => [
                "marja_count" => [
                    "cardinality" => [
                        "field" => "marja",
                    ]
                ],
                "category_count" => [
                    "cardinality" => [
                        "field" => "category",
                    ]
                ],
                "view_count" => [
                    "sum" => [
                        "field" => "view",
                    ]
                ],
                "langs" => [
                    "terms" => [
                        "field" => "language",
                        "size" => 100
                    ]
                ],

            ]
        ];
        $page = 1;
        //$perPage = $request->get('limit', 30);

        $results = (new ParsaElastic())
            ->setIndex($this->searchIndex)
            //->additionalParams(['size' => 0])
            //->debug()
            ->search($params, false);

        return $results;


    }
    private function getSearchResult(Request $request,  $highlight = false)
    {

        $page = $request->input('section') ?? 1;
        $query = $request->input('q') ?? '*';
        $perPage = $request->get('limit', 30);
        if (!in_array($perPage, [20, 30, 50, 100]))
            $perPage = 30;

        $params = SearchParams::search($query);
        $results = (new ParsaElastic())
            ->setIndex($this->searchIndex)
            ->perPage($perPage);
        if($highlight){
            $results = $results->highlight([
                "order" => "score",
                "require_field_match" => "false",
                "tags_schema" => "styled",
                "pre_tags" => "<span style='color:orange;font-weight: bold;font-family:VazirBold'>",
                "post_tags" => "</span>",
                "fragment_size" => 150,
                "number_of_fragments" => 2,
                "fields" => [
                    "body" => [
                        "pre_tags" => [
                            "<span style='color:red;font-weight: bold'>"
                        ],
                        "post_tags" => [
                            "<\/span>"
                        ]
                    ],
                    //"body" => new \stdClass(),
                    "question*.*" => new \stdClass(),
                    "tags" => new \stdClass()
                ]
            ]);
        }
        //->debug()
        $results = $results->search($params, true, $page);
        $aggre = $results['aggregations'];

        $data = $this->makeDataRecordsReady($results['hits']['hits'],true,true);
        //dd($results); die();
        $took = $results['took'];
        //dd($results['hits']['total']['value']); die();
        $data = array_map([$this, '_format'], $data);
        $total = $results['hits']['total']['value'];#$results['_count']['count'];
        // $highlight = $results['hits']['hits']['highlight'];#$results['_count']['count'];

        $items = new LengthAwarePaginator($data, $total, $perPage, $page);
        $items->setPath('searchresult');
        return [
            'data' => $data,
            'items' => $items,
            'count' => $total,
            'resultsCount' => count($results['hits']['hits']),
            'query' => $query,
            'sec' => ceil($results['hits']['total']['value'] / 30),
            'aggre' => $aggre,
            'took' => $took,

        ];

    }
    private function getAllTags(Request $request, $tag)
    {
//        $query = $request->input('tag') ?? '*';
        $query = $tag ?? '*';
        $params = [
            'query' => [
                'query_string' => [
                    'default_field' => 'tags',
                    'query' => $query,
                ]
            ]
        ];
        return $this->commonSearch($request, $params);

    }
    public function getAllCategories(Request $request, $cat)
    {

        //   $query = $request->input('category') ?? '*';
        $query = $cat ?? '*';
        $params = [
            'query' => [
                'query_string' => [
                    'default_field' => 'category',
                    'query' => $query,
                ]
            ],
        ];
        return $this->commonSearch($request, $params);
    }
    public function getAllmarja(Request $request)
    {

        $query = $request->input('marja') ?? '*';
        $params = [
            'query' => [
                'query_string' => [
                    'default_field' => 'marja',
                    'query' => $query,
                ]
            ],
        ];
        return $this->commonSearch($request, $params);
    }
    public function getSimilarTags(Request $request, $tag)
    {
        //dd(123);
        // $query = $request->input('tag') ?? '*';
        $query = $tag ?? '*';
        $params = SearchParams::similarTags($query);
//        print_r(json_encode($params));

        $page = $request->input('section') ?? 1;
        //$query = $request->input('q') ?? '*';
        $perPage = $request->get('limit', 30);
        if (!in_array($perPage, [20, 30, 50, 100]))
            $perPage = 30;

        $results = (new ParsaElastic())
            ->setIndex($this->searchIndex)
            ->additionalParams(['size' => 0])
            //->debug()
            ->search($params, false);

        $data = $this->makeDataRecordsReady($results['hits']['hits']);
        return ($results['aggregations']['tags']['buckets']);


    }
    public function getLatest($perPage, $pp)
    {

        $params = [
            'sort' => [
                'date' => [
                    'order' => 'desc',
                ]
            ]
        ];
        $page = 1;

        //$perPage = $request->get('limit', 30);
        if (!in_array($perPage, [20, 30, 50, 100]))
            $perPage = 30;

        $results = (new ParsaElastic())
            ->setIndex($pp)
            //->additionalParams(['size' => 0])
            //->debug()
            ->search($params, false);

        return $results;

    }
    public function getView($perPage, $pp)
    {

        $params = [
            'sort' => [
                'view' => [
                    'order' => 'desc',
                ]
            ]
        ];
        $page = 1;
        //$perPage = $request->get('limit', 30);
        if (!in_array($perPage, [20, 30, 50, 100]))
            $perPage = 30;

        $results = (new ParsaElastic())
            ->setIndex($pp)
            //->additionalParams(['size' => 0])
            //->debug()
            ->search($params, false);

        return $results;

    }
    public function elasticsearchGetSimularityTags(Request $request, $exactCount = false)
    {
        if (isset($_GET["section"]) and is_numeric($_GET["section"])) {
            $section = $_GET["section"];

        } else {
            $section = 1;

        }
        $start = ($section - 1) * 30;


        $page = $request->input('section') ?? 1;
        //$page = $request->input('page') ?? 1;
        $query = $request->input('tag') ?? '*';
        $perPage = $request->get('limit', 30);
        if (!in_array($perPage, [20, 30, 50, 100]))
            $perPage = 30;
        $from = ($page - 1) * $perPage - 1;
        if (empty($from) && isset($section))
            $from = $section;
        $params = [
            'index' => 'question__*',

            //"_source"=> "source.url",
            'size' => $perPage,
            'from' => $from,

            'body' => [
                'query' => [
                    'query_string' => [
                        'default_field' => 'tags',
                        'query' => $query,
                    ]
                ],
                "aggs" => [
                    "tags" => [
                        "terms" => [
                            "field" => "tags",

                        ]
                    ],
                    "lang" => [
                        "terms" => [
                            "field" => "language",

                        ]
                    ],
                    "source" => [
                        "terms" => [
                            "field" => "source.url",

                        ]
                    ],

                    "marja" => [
                        "terms" => [
                            "field" => "marja",

                        ]
                    ],
                    "category" => [
                        "terms" => [
                            "field" => "category",

                        ]
                    ],
                ],

            ],
            'client' => [
                'timeout' => 1000,
                'connect_timeout' => 1000
            ]
        ];
        try {
            //dd(123);
            if ($exactCount) {

                $totalParams = $params;
                unset($totalParams['size']);
                unset($totalParams['from']);
                unset($totalParams['from']);
                unset($totalParams['body']['aggs']);
                $countResponse = $this->elasticsearch->count($totalParams);
            }

            $reponse = $this->elasticsearch->search($params);


            if ($reponse['hits']['hits'] == []) {
                return view('seachreasult', ['message' => "Щ…Щ‚ШЇШ§Ш±ЫЊ ЫЊШ§ЩЃШЄ Щ†ШґШЇ."]);
            }
            if ($exactCount && $countResponse)
                $total = $countResponse['count'];
            else
                $total = $reponse['hits']['total']['value'];

            $data = $this->makeDataRecordsReady($reponse['hits']['hits']);
            // $aggs = $this->extractAggregations($reponse["aggregations"]);
            $items = new \Illuminate\Pagination\LengthAwarePaginator($data, $total, $perPage, $page);
            $items->setPath('searchreasult');
            //$data = array_slice($data, $start, 30);
            $result = [
                'data' => $data,
                'items' => $items,
                //'aggs' => $aggs,
                'count' => $total,
                'resultsCount' => count($reponse['hits']['hits']),
                'query' => $query,
                'sec' => ceil($reponse['hits']['total']['value'] / 30)
            ];


            return $result;
            // dd($result);
            //return view('rtl.tagresult', ['result' => $result]);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function elasticsearchGetAllID(Request $request, $id)
    {

//        $query = $request->input('id') ?? '*';
        $query = $id ?? '*';

        $params = [
            'query' => [
                'query_string' => [
                    'default_field' => '_id',
                    'query' => $query,

                ]
            ]
        ];

        return $this->commonSearch($request, $params);

    }
    public function getRelatedOnes(string $questionID)
    {

        $params = [
            'sort' => [
                [
                    "similarity" => [
                        "order" => "desc"
                    ]
                ]
            ],
            'query' => [
                'match' => [
                    'from' => $questionID
                ]
            ]
        ];
        return (new ParsaElastic())
            ->setIndex($this->relatedIndex3)
//            ->perPage(15)
            ->search($params, false);

    }
    private function getRelatedQuestions(array $data)
    {
        $params = [
            'query' => [
                'bool' => [
                    'should' => [
                        [
                            "ids" => [
                                "values" => $data
                            ]
                        ]
                    ]
                ]
            ]
        ];
        $results = (new ParsaElastic())
            ->setIndex($this->relatedIndex2)
            //->perPage(15)
            ->search($params, false);
        //dd($results);
        return $results;
    }
    private function makeDataRecordsReady($data,$forList = true,$highlight=false)
    {

        $result = [];
        if (count($data) == 1 && !$forList) {
            $data[0]["_source"]["id"] = $data[0]["_id"];
            $result = $data[0]["_source"];
        } else {
            foreach ($data as $dataItem) {

                $dataItem["_source"]["id"] = $dataItem["_id"];
                $dataItem["_source"]["score"] = $dataItem["_score"];
                if($highlight){
                    if(isset($dataItem["highlight"]['question.stem'])) {
                        $dataItem["_source"]["highlight"] = $dataItem["highlight"];
                    }
                }
                $temp = @mb_strlen($dataItem["_source"]["answer"][0], "utf-8");
                if ($temp > 150)
                    $dataItem["_source"]["answer"] = mb_substr($dataItem["_source"]["answer"][0], 0) . " .";
                array_push($result, $dataItem["_source"]);
            }
        }
        return $result;
    }
    public function getRelatedQuestion($questionId)
    {

        $params = [
            'query' => [
                'query_string' => [
                    "query" => "from:{$questionId} OR to:{$questionId}"
                ]
            ],
            'sort' => [
                "similarity" => [
                    "order" => "desc"
                ]
            ]
        ];

        $result = (new ParsaElastic())
            ->setIndex($this->relatedIndex)
            ->perPage(15)
            //->debug()
            ->search($params, false);

        return $result;


    }
    public function comments($id)
    {

        return comments::where('user_id',$id)->get();
        // return comments::all()->where('user_id',2);

    }

    public function insertComment(Request $request,$id)
    {
//        return $request->all();


        //$validatior = Validator::make($request->all(), [
        $validated = $request->validate([
            'name' => 'required|string|alpha',
            'email' => 'email|required',
            'comment' => 'required|min:5'
        ], [
            'comment.required' => 'پر کردن ایت فیلد ضروری است ',
            'comment.min' => 'نظرتان کمتر از 5 کاراکتر نباید باشد',
        ]);
//        return $validatior->errors()->all();
//        if ($validatior->fails()) {
////            Session::flash('error','sorry! Error While Sendign Data!');
////            return  back();
//            return ["result" => $validatior->errors()->all(), "status" => false];
////            return  redirect('contact-us')->withErrors($validatior)->withInput();
//        }

        Comments::create([
            "user_id" => $id,
            "name" => $request->name,
            "email" => $request->email,
            "body" => $request->comment,

        ]);
        session()->flash('status','your ide generated succssfuly');
        return back();
//            return ["status" => true];


    }

    public function News()
    {
        return news::get();
    }
    public function Events()
    {
        return events::get();
    }

    public function showActivity($id)
    {
        $data=$this->author($id);
        return view('rtl.showActivity',['articles'=>$data['articles'],'user'=>$data['user'],'categories'=>$data['categories'],'id'=>$id,'name'=>$data['name']]);

    }
     public  function  author2($id){
      $data=$this->author($id);
     return view('Colleges.index',['articles'=>$data['articles'],'user'=>$data['user'],'categories'=>$data['categories'],'id'=>$id,'name'=>$data['name']]);
}
    public function author($id)
    {
        $categories=[];
        $articles = Articles::where('user_id', $id)->get();
         foreach ($articles as $article) {

             $user = User::find($article->user)->all();
         }
         $name=User::find($article->user)->first()->name;


        foreach ($articles as $article) {
            $categories[] = Category::find($article->category)->all();
        }
//        return $category;
 return [
     'articles'=>$articles,'user'=>$user,'categories'=>$categories,'id'=>$id,'name'=>$name
 ];
     // return view('Colleges.index',['articles'=>$articles,'user'=>$user,'categories'=>$categories,'id'=>$id,'name'=>$name]);
    }
    public function simularity2($questionId)
    {

        $params = [
            'query' => [
                'query_string' => [
                    "default_field"=> "_id",
                    "query" => $questionId
                ]
            ],

        ];

        $result = (new ParsaElastic())
            ->setIndex($this->searchIndex)
            ->perPage(15)
            //->debug()
            ->search($params, false);

        return $result;


    }
    private function commonSearch(Request $request, $params, $debug = false)
    {
        $page = $request->input('section') ?? 1;
        $query = $request->input('q') ?? '*';
        $perPage = $request->get('limit', 30);
        if (!in_array($perPage, [20, 30, 50, 100]))
            $perPage = 30;

        $results = (new ParsaElastic())
            ->setIndex($this->searchIndex)
            ->perPage($perPage);
        $debug && $results = $results->debug();
        //->debug(true)

        $results = $results->search($params, true, $page);

        $data = $this->makeDataRecordsReady($results['hits']['hits']);

        $data = array_map([$this, '_format'], $data);
        $total = $results['_count']['count'];
        $items = new LengthAwarePaginator($data, $total, $perPage, $page);
        $items->setPath('searchresult');
        return [
            'data' => $data,
            'items' => $items,
            'count' => $total,
            'resultsCount' => count($results['hits']['hits']),
            'query' => $query,
            'sec' => ceil($results['hits']['total']['value'] / 30)
        ];
    }
    protected function _autoCompelete($term)
    {
        $term = trim($term);
        if (strlen($term) < 2) {
            return false;
        }

        $q = '
{
        "function_score": {
            "query": {
                "bool": {
                    "must": [{
                            "bool": {
                                "should": [{
                                        "match_phrase": {
                                            "key.phrase_tags": {
                                                "query": "' . $term . '",
                                                "boost": 20
                                            }
                                        }
                                    }, {
                                        "match_phrase": {
                                            "key.stem": {
                                                "query": "' . $term . '",
                                                "boost": 2
                                            }
                                        }
                                    }, {
                                        "match": {
                                            "key.normal_tags": {
                                                "query": "' . $term . '",
                                                "boost": 6
                                            }
                                        }
                                    }, {
                                        "prefix": {
                                            "key.keyword": {
                                                "value": "' . $term . '",
                                                "boost": 5
                                            }
                                        }
                                    }
                                ]
                            }
                        }
                    ],
                    "must_not": {
                        "term": {
                            "type": "time"
                        }
                    }
                }
            },
            "boost": "15",
            "script_score": {
                "script": {
                    "source": "Math.log(2 + doc[\'doc_count\'].value)"
                }
            },
            "boost_mode": "multiply"
        }
    }                ';
        $q = json_decode($q);
        $params = [
            'index' => 'keyphrases_2',

            //"_source"=> "source.url",
            'size' => 15,

            'body' => [
                'query' => $q,

            ],
            'client' => [
                'timeout' => 1000,
                'connect_timeout' => 1000
            ]
        ];
        try {
            $hosts = [
                [
                    'host' => env('ELASTICSEARCH_HOSTS', "es-2.101dc.ir"),
                    'port' => env('ELASTICSEARCH_PORT', '80'),
                    'scheme' => env('ELASTICSEARCH_SCHEME', 'http'),
                    'user' => env('ELASTICSEARCH_USERNAME', "elahimanesh"),
                    'pass' => env('ELASTICSEARCH_PASSWORD', "B@yekGolHamB@harmishe!")
                ]
            ];
            try {
                $this->elasticsearch = ClientBuilder::create()
                    ->setHosts($hosts)
                    ->setRetries(5)
                    ->build();
            } catch (\Exception $e) {
                dump($e->getMessage());
            }

            $response = $this->elasticsearch->search($params);
            if ($response['hits']['hits'] == []) {
                return '';
            }
            $result = $response['hits']['hits'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return $result;

    }
    protected function _format($item)
    {
        $pattern = '/<(.*?)>(.*?)<\/.*?>/sim';
        $replacement = "<span class='$1'>$2</span>";
        $item['full_question'] = preg_replace($pattern, $replacement, $item['question']);
        //$item['full_answer'] = preg_replace($pattern, $replacement, $item['full_answer']);
        $item['answer'] = preg_replace($pattern, $replacement, $item['answer']);

        return $item;
    }
}








