<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class addsquad extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addsquad{match_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Squad of matches';

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
    function checkPlayerInDb($products, $field, $value)
    {

        foreach ($products as $key => $product) {
            if ($product[$field]== $value) {
                return true;
            }
        }
        return false;

    }
    public function handle()
    {
        $match_id = $this->argument('match_id');
        $dbplayers = \App\Player::all()->toArray();
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://cricapi.com/api/fantasySquad', [
            'query' => ['apikey' => config('const.cricapi_key'), 'unique_id' => $match_id]
        ]);
        $body = $res->getBody();
        $result = \GuzzleHttp\json_decode($body->getContents());
        $res = (array)$result;
        if(empty($res['error'])) {
            foreach ($res['squad'] as $team) {
                foreach ($team->players as $players) {
                    $check=$this->checkPlayerInDb($dbplayers, 'cricapi_pid', $players->pid);
                    if ($check) {

                    } else {
                        \App\Player::addPlayer($players->name, NULL, $players->pid);
                       
                    }

                }

            }
        }else{
            dd('squad not available');
        }
        die;


    }
}
