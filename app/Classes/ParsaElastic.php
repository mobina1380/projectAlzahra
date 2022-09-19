<?php


namespace App\Classes;


use Elasticsearch\ClientBuilder;

class ParsaElastic
{
    public $index = '';
    public $params = '';
    public $perPage = 30;
    public $additionalParams = [];
    public $debug = false;
    public $highlight = false;
    public $clientOptions = [
        'timeout' => 1000,
        'connect_timeout' => 1000
    ];
    private $elasticsearch;

    public function __construct()
    {
        $hosts = [
            [
                'host' => env('ELASTICSEARCH_HOSTS',"elastic.najaf4.ik8.ir"),
                'port' => env('ELASTICSEARCH_PORT', '80'),
                'scheme' => env('ELASTICSEARCH_SCHEME', 'http'),
                'user' => env('ELASTICSEARCH_USERNAME',"elahimanesh"),
                'pass' => env('ELASTICSEARCH_PASSWORD',"B@yekGolHamB@harmishe!")
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

    }

    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    public function setClientOpstions($opts)
    {
        $this->clientOpstions = $opts;
        return $this;
    }

    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }
    public function debug()
    {
        $this->debug = true;
        return $this;
    }
    public function highlight($text)
    {
        $this->highlight= $text;
        return $this;
    }

    public function perPage($perPage)
    {
        $this->perPage = $perPage;
        return $this;
    }
    public function additionalParams($params)
    {
        $this->additionalParams = $params;
        return $this;
    }

    public function search($body, $paginate = false, $page = 1)
    {
        $response = [];
        if ($paginate) {
            $body['from'] = ($page - 1) * $this->perPage;
            $body['size'] = $this->perPage;

        }

        $countResponse = null;
        $response = $this->query($this->index, $body);
//dd($response);
        if ($paginate) {
            $totalBody = $body;
            unset($totalBody['size'], $totalBody['from'], $totalBody['aggs']);
            $response['_count'] = $this->count($this->index, $totalBody);
        }

        return $response;

    }

    public function getById($id)
    {
        $body = [
            'query' => [
                'match' => [
                    '_id' => $id
                ]
            ],
            "aggs" => [
                "categories" => [
                    "terms" => [
                        "field" => "category",
                        "size" => 20
                    ],
                    "aggs" => [
                        "subcategories" => [
                            "terms" => [
                                "field" => "sub_category",
                                "size" => 20
                            ]
                        ]
                    ]
                ]
            ]
        ];
        return $this->query($this->index, $body);
    }

    public function query($index, $body, $clientOptions = [], $size = null)
    {

        return $this->_query('search', $index, $body, $clientOptions, $size = null);
    }

    public function count($index, $body, $clientOptions = [])
    {

        return $this->_query('count', $index, $body, $clientOptions);


    }

    private function _query($call, $index, $body, $clientOptions = [], $size = null)
    {
        $params ['index'] = $index;
        if(!empty($this->additionalParams)){
            foreach ($this->additionalParams as $index => $additionalParam) {
                $params[$index] = $additionalParam;
            }
        }

        if($this->highlight){
            $body["highlight"] = $this->highlight;
        }

        if (!empty($size))
            $params['size'] = $size;
        $params['body'] = $body;
        if (!empty($clientOptions))
            $params['client'] = $this->clientOptions;

        if($this->debug){
            print json_encode($params);
            exit;
        }
        try {
            $response = $this->elasticsearch->$call($params);
//            dd($response);die();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return $response;
    }

}
