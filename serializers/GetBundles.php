<?

class GetBundles
{
	public static $command_id = 116;

	static function handle($callback, $user_id, $input)
	{
		if ($callback->versions[$user_id] == '1.27')
		{
			$j =
				'[
                {
                    "expireInSeconds":0,
                    "code":"51",
                    "order":0,
                    "discount":0,
                    "votes":50,
                    "items":
                    [
                        {
                            "awardKind":6,
                            "count":0,
                            "itemId":3001
                        },
                        {
                            "awardKind":6,
                            "count":0,
                            "itemId":3002
                        },
                    ]
                },
                
                {
                    "expireInSeconds":0,
                    "code":"52",
                    "order":0,
                    "discount":0,
                    "votes":20,
                    "items":
                    [
                        {
                            "awardKind":6,
                            "count":0,
                            "itemId":3003
                        },
                        {
                            "awardKind":6,
                            "count":0,
                            "itemId":3004
                        },
                    ]
                },
            ]';
		}
		elseif ($callback->versions[$user_id] >= '1.28')
		{
			$j =
				'[
                {
                    "expireInSeconds":0,
                    "code":"72",
                    "order":0,
                    "discount":0,
                    "votes":50,
                    "items":
                    [
                        {
                            "awardKind":6,
                            "count":0,
                            "itemId":3030
                        },
                        {
                            "awardKind":6,
                            "count":0,
                            "itemId":3031
                        },
                        {
                            "awardKind":6,
                            "count":0,
                            "itemId":3032
                        },
                        {
                            "awardKind":6,
                            "count":0,
                            "itemId":3033
                        }
                    ]
                },
                
                {
                    "expireInSeconds":0,
                    "code":"71",
                    "order":0,
                    "discount":0,
                    "votes":20,
                    "items":
                    [
                        {
                            "awardKind":6,
                            "count":0,
                            "itemId":3020
                        },
                        {
                            "awardKind":6,
                            "count":0,
                            "itemId":3021
                        },
                        {
                            "awardKind":6,
                            "count":0,
                            "itemId":3022
                        },
                        {
                            "awardKind":6,
                            "count":0,
                            "itemId":3023
                        }
                    ]
                },
            ]';
		}

		$jadditional =
			'[
                {
                    "expireInSeconds":16964001,
                    "code":"501",
                    "order":5,
                    "discount":15,
                    "votes":14,
                    "items":
                    [
                        {
                            "awardKind":5,
                            "count":20,
                            "itemId":80
                        },
                        {
                            "awardKind":5,
                            "count":20,
                            "itemId":72
                        }
                    ]
                },
                
                {
                    "expireInSeconds":16964001,
                    "code":"502",
                    "order":6,
                    "discount":20,
                    "votes":32,
                    "items":
                    [
                        {
                            "awardKind":5,
                            "count":50,
                            "itemId":80
                        },
                        
                        {
                            "awardKind":5,
                            "count":50,
                            "itemId":72
                        }
                    ]
                },
                
                {
                    "expireInSeconds":16964001,
                    "code":"503",
                    "order":7,
                    "discount":30,
                    "votes":54,
                    "items":
                    [
                        {
                            "awardKind":5,
                            "count":100,
                            "itemId":80
                        },
                        {
                            "awardKind":5,
                            "count":100,
                            "itemId":72
                        }
                    ]
                },
                
                {
                    "expireInSeconds":375141,
                    "code":"999",
                    "order":8,
                    "discount":10,
                    "votes":45,
                    "items":
                    [
                        {
                            "awardKind":5,
                            "count":70,
                            "itemId":106
                        },
                       
                        {
                            "awardKind":5,
                            "count":30,
                            "itemId":121
                        },
                        
                        {
                            "awardKind":5,
                            "count":30,
                            "itemId":128
                        },
                        
                        {
                            "awardKind":5,
                            "count":70,
                            "itemId":134
                        },
                        
                        {
                            "awardKind":5,
                            "count":50,
                            "itemId":122
                        },
                        
                        {
                            "awardKind":5,
                            "count":30,
                            "itemId":119
                        }
                    ]
                },
                
                {
                    "expireInSeconds":2621541,
                    "code":"101",
                    "order":12,
                    "discount":40,
                    "votes":32,
                    "items":
                    [
                        {
                            "awardKind":10,
                            "count":-1,
                            "itemId":24
                        },
                        
                        {
                            "awardKind":10,
                            "count":-1,
                            "itemId":81
                        },
                        
                        {
                            "awardKind":10,
                            "count":-1,
                            "itemId":40
                        },
                        
                        {
                            "awardKind":8,
                            "count":0,
                            "itemId":1003
                        },
                        
                        {
                            "awardKind":8,
                            "count":0,
                            "itemId":2028
                        }
                    ]
                },
                
                {
                    "expireInSeconds":2621541,
                    "code":"102",
                    "order":15,
                    "discount":45,
                    "votes":41,
                    "items":
                    [
                        {
                            "awardKind":10,
                            "count":-1,
                            "itemId":60
                        },
                        
                        {
                            "awardKind":10,
                            "count":-1,
                            "itemId":74
                        },
                        
                        {
                            "awardKind":8,
                            "count":0,
                            "itemId":1041
                        },
                        
                        {
                            "awardKind":8,
                            "count":0,
                            "itemId":2033
                        }
                    ]
                },
                
                {
                    "expireInSeconds":2621541,
                    "code":"104",
                    "order":19,
                    "discount":35,
                    "votes":33,
                    "items":
                    [
                        {
                            "awardKind":10,
                            "count":-1,
                            "itemId":82
                        },
                        
                        {
                            "awardKind":10,
                            "count":-1,
                            "itemId":48
                        },
                        
                        {
                            "awardKind":10,
                            "count":-1,
                            "itemId":42
                        }
                    ]
                },
                
                {
                    "expireInSeconds":2621541,
                    "code":"108",
                    "order":23,
                    "discount":40,
                    "votes":44,
                    "items":
                    [
                        {
                            "awardKind":10,
                            "count":-1,
                            "itemId":24
                        },
                        
                        {
                            "awardKind":10,
                            "count":-1,
                            "itemId":30
                        },
                        
                        {
                            "awardKind":10,
                            "count":-1,
                            "itemId":41
                        },
                        
                        {
                            "awardKind":8,
                            "count":0,
                            "itemId":1029
                        },
                        
                        {
                            "awardKind":8,
                            "count":0,
                            "itemId":2010
                        }
                    ]
                },
                
                {
                    "expireInSeconds":2621541,
                    "code":"112",
                    "order":26,
                    "discount":35,
                    "votes":46,
                    "items":
                    [
                        {
                            "awardKind":10,
                            "count":-1,
                            "itemId":81
                        },
                        
                        {
                            "awardKind":10,
                            "count":-1,
                            "itemId":56
                        },
                        
                        {
                            "awardKind":8,
                            "count":0,
                            "itemId":1080
                        },
                        
                        {
                            "awardKind":8,
                            "count":0,
                            "itemId":2029
                        },
                        
                        {
                            "awardKind":9,
                            "count":1,
                            "itemId":3
                        }
                    ]
                },
                
                {
                    "expireInSeconds":3831141,
                    "code":"801",
                    "order":29,
                    "discount":0,
                    "votes":60,
                    "items":
                    [
                        {
                            "awardKind":6,
                            "count":23,
                            "itemId":1701
                        },
                        {
                            "awardKind":6,
                            "count":23,
                            "itemId":2023
                        }
                    ]
                },
                
                {
                    "expireInSeconds":3831141,
                    "code":"802",
                    "order":31,
                    "discount":0,
                    "votes":5,
                    "items":
                    [
                        {
                            "awardKind":6,
                            "count":23,
                            "itemId":1038
                        }
                    ]
                },
                
                {
                    "expireInSeconds":3831141,
                    "code":"803",
                    "order":34,
                    "discount":0,
                    "votes":80,
                    "items":
                    [
                        {
                            "awardKind":6,
                            "count":23,
                            "itemId":1711
                        },
                        {
                            "awardKind":6,
                            "count":23,
                            "itemId":2036
                        }
                    ]
                },
                
                {
                    "expireInSeconds":3831141,
                    "code":"806",
                    "order":37,
                    "discount":0,
                    "votes":40,
                    "items":
                    [
                        {
                            "awardKind":6,
                            "count":23,
                            "itemId":2039
                        }
                    ]
                },
                
                {
                    "expireInSeconds":3831141,
                    "code":"813",
                    "order":40,
                    "discount":0,
                    "votes":40,
                    "items":
                    [
                        {
                            "awardKind":6,"count":23,"itemId":1149
                        }
                    ]
                },
                
                {
                    "expireInSeconds":3831141,
                    "code":"814",
                    "order":43,
                    "discount":0,
                    "votes":40,
                    "items":
                    [
                        {
                            "awardKind":6,
                            "count":23,
                            "itemId":2031
                        }
                    ]
                }
            ]';

		$bundles = sjson_decode($j);
		$bundles_additional = sjson_decode($jadditional);
		return [$bundles, $bundles_additional];
	}
}