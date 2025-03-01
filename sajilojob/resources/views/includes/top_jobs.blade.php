<div class="section" >
    <div style="border: 0.5px solid #CCCAD2;border-bottom:none !important;">
        <!-- title start -->
        <div class="titleTop p-2">
            <h5 class="m-0"><i style="color:blue;" class="fa fa-star-o" aria-hidden="true"></i> {{ __('Top') }} <span style="color:#373092">{{ __('Jobs') }}</span></h5>
        </div>
        <!-- title end -->
        <style>
            .title-job a{
                text-decoration:none !important;
            }
            .title-job a:hover{
                color:black !important;
            }
            .company a:hover{
                color:black !important;
            }
            .img-company img{
                border: 0.5px solid #CCCAD2;
            }
        </style>
        <ul class="jobslist newjbox row">
            @if (isset($topJobs) && count($topJobs))
                @foreach ($topJobs as $topJob)
                    <?php $company = $topJob->getCompany(); ?>
                    @if (null !== $company)
                        <!--Job start-->
                        <li class="col-lg-4 col-sm-6 pl-0 pr-0" style="border: 0.5px solid #CCCAD2">
                            <div class="jobint ml-1">
                                <div class="row">
                                    <style>
                                        
                                    </style>
                                    <div class="col-4 mt-2 pl-0">
                                        <a class="img-company" href="{{ route('job.detail', [$topJob->slug]) }}"
                                            title="{{ $topJob->title }}">
                                            {{ $company->printCompanyImage() }}
                                        </a>
                                    </div>
                                    </style>
                                    <div class="col-8 pr-0 pl-0">
                                        <div class="company">
                                            <h4>
                                                <a><b>
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($company->name), 25, '...') }}
                                                </b></a>
                                            </h4>
                                        </div>
                                        <div class="pb-2 title-job">
                                            <a href="{{ route('job.detail', [$topJob->slug]) }}"
                                                title="{{ $topJob->title }}">{{ \Illuminate\Support\Str::limit(strip_tags($topJob->title ), 23, '...') }}</a>
                                        </div>
                                        <div class="jobloc">
                                            <label class="fulltime"
                                                title="{{ $topJob->getJobType('job_type') }}">{{ $topJob->getJobType('job_type') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--Job end-->
                    @endif
                @endforeach
            @endif
        </ul>
        </div>
        <!--view button-->
        <div class="d-flex justify-content-end p-2" style="border: 0.5px solid #CCCAD2;">
            <a href="{{ route('job.list', ['is_top' => 1]) }}" class="" style="text-decoration:none;color:darkblue;"><i class="fa fa-eye" aria-hidden="true"></i> View All</a>
        </div>
        <!--view button end-->
</div>
