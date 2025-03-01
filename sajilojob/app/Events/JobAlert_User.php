<?php

namespace App\Events;

use App\Job;
use App\User;
use App\Company;
use App\JobApply;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;

class JobAlert_User
{

    use SerializesModels;

    public $job;
    public $jobApply;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Job $job, JobApply $jobApply)
    {
        $this->job = $job;
        $this->jobApply = $jobApply;
    }

}
