<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\JobPostedMailableUser;
use Mail;

class sendAlertUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;
    protected $user_name;
    protected $link;
    protected $company_name;

    public function __construct($user, $user_name,$link,$company_name)
    {
        $this->user=$user;
        $this->user_name=$user_name;
        $this->link=$link;
        $this->company_name=$company_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)->queue(new JobPostedMailableUser($this->user, $this->user_name, $this->link, $this->company_name));
    }
}
