<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobPostedMailableUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $user_name;
    public $link;
    public $company_name;

    public function __construct($user,$user_name ,$link,$company_name)
    {
        $this->user=$user;
        $this->user_name=$user_name;
        $this->link=$link;
        $this->company_name=$company_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('emails.job_posted_message_user')->with('data', $this->data);
        return $this->view('emails.job_posted_message_user');
    }
}
