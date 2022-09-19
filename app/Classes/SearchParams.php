<?php

namespace App\Classes;

class SearchParams
{

    public static function __callStatic($method, $args)
    {
        $method = 'get' . ucfirst($method) . 'Params';

        return call_user_func_array(
            array(get_called_class(), $method),
            $args
        );

    }


    protected static function getAutoCompleteParams()
    {
        $term = func_get_arg(0);
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
    }';
        $q = json_decode($q);
        return ['query' => $q];

    }

    protected static function getStatsParams()
    {
        return [

            "aggs" => [
                "tags" => [
                    "cardinality" => [
                        "field" => "tags",
                    ]
                ],
                "lang" => [
                    "cardinality" => [
                        "field" => "language",
                    ]
                ],
                "source" => [
                    "cardinality" => [
                        "field" => "source.url",
                    ]
                ],

                "marja" => [
                    "cardinality" => [
                        "field" => "marja",
                    ]
                ],
                "category" => [
                    "cardinality" => [
                        "field" => "category",
                    ]
                ],
            ],
        ];
    }

    protected static function getSiteStats()
    {

        return [
            'query' => [
                'query_string' => [
                    'default_field' => 'source.url',
                    'query' => func_get_arg(0),
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
    }

    protected static function getSimilarTagsParams()
    {
        return [
            'query' => [
                'query_string' => [
                    'default_field' => 'tags',
                    'query' => func_get_arg(0),
                ]
            ],
            "aggs" => [
                "tags" => [
                    "terms" => [
                        "field" => "tags",
                        "size" => 10
                    ]
                ],
                "lang" => [
                    "terms" => [
                        "field" => "language",
                        "size" => 100
                    ]
                ],
                "source" => [
                    "terms" => [
                        "field" => "source.url",
                        "size" => 10
                    ]
                ],

                "marja" => [
                    "terms" => [
                        "field" => "marja",
                        "size" => 10
                    ]
                ],
                "category" => [
                    "terms" => [
                        "field" => "category",
                        "size" => 10
                    ]
                ],
            ]
        ];
    }

    protected static function getSearchParams()
    {

        $param = func_get_arg(0);
        $query = '{
    "bool": {
      "must": [
        {
          "bool": {
            "should": [
              {
                "match_phrase": {
                  "question.phrase": {
                    "query": "'.$param.'",
                    "boost": 10
                  }
                }
              },
              {
                "match": {
                  "question.normal": {
                    "query": "'.$param.'",
                    "boost": 2
                  }
                }
              },
              {
                "match": {
                  "question.stem": {
                    "query": "'.$param.'",
                    "boost": 7
                  }
                }
              },
              {
                "match_phrase": {
                  "tags": {
                    "query": "'.$param.'",
                    "boost": 5
                  }
                }
              }
            ]
          }
        }
      ]
    }

  }';
        $q = json_decode($query);
        return [

            'query' => $q
            ,
            "aggs" => [
                "tags" => [
                    "terms" => [
                        "field" => "tags",
                        "size" => 30
                    ]
                ],
                "lang" => [
                    "terms" => [
                        "field" => "language",
                        "size" => 30
                    ]
                ],
                "id" => [
                    "terms" => [
                        "field" => "id",
                        "size" => 30
                    ]
                ],
                "source" => [
                    "terms" => [
                        "field" => "source.url",
                        "size" => 20
                    ]
                ],

                "marja" => [
                    "terms" => [
                        "field" => "marja",
                        "size" => 20
                    ]
                ],
                "category" => [
                    "terms" => [
                        "field" => "category",
                        "size" => 20
                    ]
                ],

            ],


        ];
    }

    protected static function getFacetParams()
    {

        return [
            'query' => [
                'query_string' => [
                    'default_field' => '',
                    'query' => func_get_arg(0),
                ]
            ],
            "aggs" => [
                "tags" => [
                    "terms" => [
                        "field" => "tags",
                        "size" => 10
                    ]
                ],
                "lang" => [
                    "terms" => [
                        "field" => "language",
                        "size" => 100
                    ]
                ],
                "source" => [
                    "terms" => [
                        "field" => "source.url",
                        "size" => 10
                    ]
                ],

                "marja" => [
                    "terms" => [
                        "field" => "marja",
                        "size" => 10
                    ]
                ],
                "category" => [
                    "terms" => [
                        "field" => "category",
                        "size" => 10
                    ]
                ],
            ]
        ];
    }


}
