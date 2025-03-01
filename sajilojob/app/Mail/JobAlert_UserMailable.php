<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class JobAlert_UserMailable extends Mailable
{

    use SerializesModels;

    public $job;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job)
    {
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $company = $this->job->getCompany();
        $users = User::all();
        foreach($users as $user){
            $data = [
              'subject' => 'Employer/Company "' . $company->name . '" has posted new job on "' . config('app.name'),
              'email' => $user->email,
              'name' => $company->name,
              'user_name'=>$user->name,
              'link' => route('job.detail', [$job->slug]),
            ];
            
            return  Mail::send('emails.job_posted_message_user', $data, function ($msg) use ($data) {
                    $msg->from(config('mail.recieve_to.address'), config('mail.recieve_to.name'));
                    $msg->to($data['email'])->subject($data['subject']);
                });
        }
         
    }

}
