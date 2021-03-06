<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class UpdateMatchScore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updatescore{match_id}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates Match score description';

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
    public function handle()
    {

        $match_id = $this->argument('match_id');
        $this->match_player_score($match_id);
    }
    public function getIdOfTerm($game_terms, $word)
    {


        foreach ($game_terms as $key => $term) {


            if ($term['name'] == $word) return $term['id'];
        }


    }

    function insertPlayerData($game_terms, $player_id, $match_id, $score, $search_key)
    {

        \App\MatchPlayerScore::updateOrCreate(
            ['player_id' => $player_id,
            'match_id' => $match_id,
            'game_term_id' => $this->getIdOfTerm($game_terms, $search_key)
        ],['player_term_count' => $score]);


        return  ;
    }
    public function add_player($pid){
        $api_key=config('const.cricapi_key');

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://cricapi.com/api/playerStats',[
            'query' => ['apikey' => $api_key,'pid'=>$pid]
        ]);
        $body=$res->getBody();
        $result=\GuzzleHttp\json_decode($body->getContents());
        $res =(array)$result;
        //public\uploads\player_pictures\2017\03
        $image=explode("/",$res['imageURL']);
        $image=end($image);
        $dlimage=file_get_contents($res['imageURL']);
       //file_put_contents('uploads/cricapi/'.$image,$dlimage);
        \App\Player::addPlayer($res['fullName'],$image,$pid);

    }
    public function match_player_score($cric_match_api)
    {
        $match_id = \App\Match::where('cricapi_match_id', $cric_match_api)->first()->id;
        $api_key = config('const.cricapi_key');
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://cricapi.com/api/fantasySummary', [
            'query' => ['apikey' => config('const.cricapi_key'), 'unique_id' => $cric_match_api]
        ]);
        $body = $res->getBody();
        $result = \GuzzleHttp\json_decode($body->getContents());
        $res = (array)$result;
        $player_data=[];
        $game_terms = \App\GameTerm::where('game_id', 1)->get()->toArray();
        foreach ($res['data']->batting[0]->scores as $key => $player) {
            $player=(array)$player;
            $player_id = \App\Player::where('cricapi_pid', $player['pid'])->first();
            if (empty($player_id)) {
                $this->add_player($player['pid']);
            } else {
                $player_id = $player_id['id'];
                $player_data[]=$this->insertPlayerData($game_terms, $player_id, $match_id, $player['SR'], 'SR');
                $player_data[]=$this->insertPlayerData($game_terms, $player_id, $match_id, $player['6s'], '6s');
                $player_data[]=$this->insertPlayerData($game_terms, $player_id, $match_id, $player['4s'], '4s');
                $player_data[]=$this->insertPlayerData($game_terms, $player_id, $match_id, $player['R'], 'R');
                $player_data[]=$this->insertPlayerData($game_terms, $player_id, $match_id, $player['R'], 'Runs');
            }
           // \App\MatchPlayerScore::updateOrCreate($player_data);
            $player_data=[];


        }
        if(!empty($res['data']->batting[1])){
            foreach ($res['data']->batting[1]->scores as $key => $player) {
                $player=(array)$player;
                $player_id = \App\Player::where('cricapi_pid', $player['pid'])->first();
                if (empty($player_id)) {
                    $this->add_player($player['pid']);
                } else {
                    $player_id = $player_id['id'];
                    $player_data[]=$this->insertPlayerData($game_terms, $player_id, $match_id, $player['SR'], 'SR');
                    $player_data[]=$this->insertPlayerData($game_terms, $player_id, $match_id, $player['6s'], '6s');
                    $player_data[]=$this->insertPlayerData($game_terms, $player_id, $match_id, $player['4s'], '4s');
                    $player_data[]=$this->insertPlayerData($game_terms, $player_id, $match_id, $player['R'], 'R');
                    $player_data[]=$this->insertPlayerData($game_terms, $player_id, $match_id, $player['R'], 'Runs');
                }
                // \App\MatchPlayerScore::updateOrCreate($player_data);
                $player_data=[];


            }

        }
        foreach ($res['data']->bowling[0]->scores as $key => $player) {
            $player=(array)$player;
            $player_id = \App\Player::where('cricapi_pid', $player['pid'])->first();
            if (empty($player_id)) {

            } else {
                $player_id = $player_id['id'];
                $player_data[]=$this->insertPlayerData($game_terms, $player_id, $match_id, $player['W'], 'W');
                $player_data[]=$this->insertPlayerData($game_terms, $player_id, $match_id, $player['Econ'], 'Econ');

            }
           // \App\MatchPlayerScore::updateOrCreate($player_data);
            $player_data=[];


        }
        if(!empty($res['data']->bowling[1])) {
            foreach ($res['data']->bowling[1]->scores as $key => $player) {
                $player = (array)$player;
                $player_id = \App\Player::where('cricapi_pid', $player['pid'])->first();
                if (empty($player_id)) {

                } else {
                    $player_id = $player_id['id'];
                    $player_data[] = $this->insertPlayerData($game_terms, $player_id, $match_id, $player['W'], 'W');
                    $player_data[] = $this->insertPlayerData($game_terms, $player_id, $match_id, $player['Econ'], 'Econ');

                }
                // \App\MatchPlayerScore::updateOrCreate($player_data);
                $player_data = [];


            }
        }



        die;
    }
}
