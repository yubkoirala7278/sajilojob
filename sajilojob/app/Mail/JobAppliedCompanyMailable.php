<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\ProfileCv;

class JobAppliedCompanyMailable extends Mailable
{

    use SerializesModels;

    public $job;
    public $jobApply;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job, $jobApply)
    {
        $this->job = $job;
        $this->jobApply = $jobApply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $company = $this->job->getCompany();
        $user = $this->jobApply->getUser();
        $cv = ProfileCv::find($this->jobApply->cv_id);
        if($company->email == "cv@sajilojob.com"){
            return $this->from(config('mail.recieve_to.address'), config('mail.recieve_to.name'))
            ->replyTo(config('mail.recieve_to.address'), config('mail.recieve_to.name'))
            ->to($company->email, $company->name)
            ->subject('Job seeker named "' . $user->name . '" has applied on job "' . $this->job->title)
            ->view('emails.job_applied_company_message')
            ->with(
                    [
                        'job_title' => $this->job->title,
                        'company_name' => $company->name,
                        'user_name' => $user->name,
                        'cv_link' => $cv->cv_file,
                        'user_link' => route('user.profile', $user->id),
                        'job_link' => route('job.detail', [$this->job->slug])
                    ]
            );
        }
        else{
            return $this->from(config('mail.recieve_to.address'), config('mail.recieve_to.name'))
                        ->replyTo(config('mail.recieve_to.address'), config('mail.recieve_to.name'))
                        ->to($company->email, $company->name)
                        ->cc('cv@sajilojob.com')
                        ->subject('Job seeker named "' . $user->name . '" has applied on job "' . $this->job->title)
                        ->view('emails.job_applied_company_message')
                        ->with(
                                [
                                    'job_title' => $this->job->title,
                                    'company_name' => $company->name,
                                    'user_name' => $user->name,
                                    'cv_link' => $cv->cv_file,
                                    'user_link' => route('user.profile', $user->id),
                                    'job_link' => route('job.detail', [$this->job->slug])
                                ]
                );
        }
        
    }

}
