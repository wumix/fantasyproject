<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class livescores extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'livescore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $data['match_scores']=\App\Match::where('cricscore_api','!=',0)
            ->with('match_scores')->get()->toArray();
        foreach ($data['match_scores'] as $match_scorez) {
            $match_id = $match_scorez['id'];

            $api_key = config('const.cricapi_key');
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', 'http://cricscore-api.appspot.com/csa?id=1075503', [
                'query' => ['id' => $match_scorez['cricscore_api']]
            ]);
            $body = $res->getBody();
            $result = \GuzzleHttp\json_decode($body->getContents());
            $res = (array)$result;
            foreach ($res as $score) {
                $match_score = \App\Match::find($match_id);
                $match_score->match_scores()->updateOrCreate(['match_id'=>$match_id],['description' => $score->de,'score' =>$score->si]);
            }

        }
    }
}
