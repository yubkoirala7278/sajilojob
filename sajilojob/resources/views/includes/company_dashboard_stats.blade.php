<ul class="row profilestat">
    <style>
        .box-hover-company {
            border-top: 2px solid #373092;
        }

        .box-hover-company:hover {
            box-shadow: 3px 8px 30px rgba(0, 0, 0, 0.2);
            border-top: 2px solid red;
        }

    </style>
    <li class="col-md-4 col-6">
        <div class="inbox box-hover-company"> <i class="fa fa-clock-o" aria-hidden="true"></i>
            <h6><a href="{{ route('posted.jobs') }}">{{ Auth::guard('company')->user()->countOpenJobs() }}</a></h6>
            <strong>{{ __('Open Jobs') }}</strong>
        </div>
    </li>
    <li class="col-md-4 col-6">
        <div class="inbox box-hover-company"> <i class="fa fa-check" aria-hidden="true"></i>
            <h6>
                <a href="{{ route('posted.jobs.all') }}">{{ Auth::guard('company')->user()->countTotalJobs() }}</a>
            </h6>
            <strong>{{ __('Job Posted') }}</strong>
        </div>
    </li>
    <li class="col-md-4 col-6">
        <div class="inbox box-hover-company"> <i class="fa fa-user-o" aria-hidden="true"></i>
            <h6>
                <a style="color: #373092">
                    {{ Auth::guard('company')->user()->countApplieUsers() }}
                </a>
            </h6>
            <strong>{{ __('No. of Applicants') }}</strong>
        </div>
    </li>
    <li class="col-md-4 col-6">
        <div class="inbox box-hover-company"> <i class="fa fa-eye" aria-hidden="true"></i>
            <h6>
                <a style="color: #373092">{{ Auth::guard('company')->user()->totalViews() }}</a>
            </h6>
            <strong>{{ __('Total Views') }}</strong>
        </div>
    </li>
    <li class="col-md-4 col-6">
        <div class="inbox box-hover-company"> <i class="fa fa-users" aria-hidden="true"></i>
            <h6><a
                    href="{{ route('company.followers') }}">{{ Auth::guard('company')->user()->countFollowers() }}</a>
            </h6>
            <strong>{{ __('Followers') }}</strong>
        </div>
    </li>
    {{-- <li class="col-md-4 col-6">
        <div class="inbox"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <h6><a href="{{route('company.messages')}}">{{Auth::guard('company')->user()->countCompanyMessages()}}</a></h6>
            <strong>{{__('Messages')}}</strong> </div>
    </li> --}}
</ul>
