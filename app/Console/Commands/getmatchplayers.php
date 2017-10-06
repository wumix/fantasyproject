<?php

namespace App\Console\Commands;
use Guzzle\Http\Client;
use Illuminate\Console\Command;

class getmatchplayers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'matchplayers';
    //php artisan matchplayers

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get match players';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function addPlayerStats($pid){

        $api_key=config('const.cricapi_key');
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://cricapi.com/api/playerStats',[
            'query' => ['apikey' => $api_key,'pid'=>$pid]
        ]);
        $body=$res->getBody();
        $result=\GuzzleHttp\json_decode($body->getContents());
        $res =(array)$result;
        $syncdata = [];
        $player_id=\App\Player::where('cricapi_pid',$pid)->first()->id;
        \App\PlayerStatDetail::where('player_id', $player_id)->delete();
        foreach($res['data'] as $fkey=>$batbowl){
            foreach ($batbowl as $skey=>$gameforamt){
                //skey gives us formats key i.e listA,T20i,Batting bowling
                //fkey gives us batting blowling
                $format_id=\App\Format::where('name',$skey)->first()->id;
                $playing_cat_id= \App\PlayingCategory::where('name',$fkey)->first()->id;
                foreach($gameforamt as $tkey=>$types){
                    //type tell weather its 50 twty of etc

                    $type_id=\App\Type::where('name',$tkey)->first()->id;


                    // echo $tkey=.' '.$types;
                    $syncdata = array(
                        array(
                            'player_id' =>$player_id,
                            'format_id' =>$format_id,
                            'type_id' => $type_id,
                            'score'=>$types,
                            'playing_category'=>$playing_cat_id
                        )


                    );

                    \App\PlayerStatDetail::insert($syncdata);


                }



            }
        }
        die;


    }
    public function handle()
    {
        $t= \App\Player::where('id',1)->with('player_stats_details')->get()->toArray();
        $this->addPlayerStats(253802);


    }
}
