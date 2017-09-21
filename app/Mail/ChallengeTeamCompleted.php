<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChallengeTeamCompleted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sendername;
    public $reciever;
    public function __construct($sendername,$recievername)
    {
        $this->sendername=$sendername;
        $this->reciever=$recievername;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@gamithonfantasy.com')->view('mail.challenge_team_complete');
    }
}
