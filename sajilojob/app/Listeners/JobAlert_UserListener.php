<?php

namespace App\Listeners;

use Mail;
use App\Events\JobAlert_User;
use App\Mail\JobAlert_UserMailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class JobPostedListener implements ShouldQueue
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CompanyRegistered  $event
     * @return void
     */
    public function handle(JobAlert_User $event)
    {
        $company = $event->job->getCompany();
        $users = User::all();
        foreach($users as $user){
            $data = [
              'subject' => 'Employer/Company " asadasd  " has posted new job on "' . config('app.name'),
              'email' => $user->email,
              'name' => "abababa",
              'user_name'=>$user->name,
              'link' => route('job.detail', ['testing']),
            ];
            
            Mail::send('emails.job_posted_message_user', $data, function ($msg) use ($data) {
                    $msg->from(config('mail.recieve_to.address'), config('mail.recieve_to.name'));
                    $msg->to($data['email'])->subject($data['subject']);
                });
        }
        // Mail::send(new JobAlert_UserMailable($event->job));
    }

}
