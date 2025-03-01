<div class="section">
    <div style="border: 0.5px solid #CCCAD2;border-bottom:none !important;">
        <!-- title start -->
        <div class="titleTop p-2">
            <h5 class="m-0"><i style="color:blue;" class="fa fa-bullseye" aria-hidden="true"></i> {{ __('Featured') }} <span style="color:#373092">{{ __('Jobs') }}</span></h5>
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
        <!--Featured Job start-->
        <ul class="jobslist newjbox row">
            @if (isset($featuredJobs) && count($featuredJobs))
                @foreach ($featuredJobs as $featuredJob)
                    <?php $company = $featuredJob->getCompany(); ?>
                    @if (null !== $company)
                        <!--Job start-->
                        <li class="col-lg-4 col-sm-6 pl-0 pr-0" style="border: 0.5px solid #CCCAD2">
                            <div class="jobint">
                                <div class="row">
                                    <div class="col-4 mt-2 pl-1">
                                        <a class="img-company" href="{{ route('job.detail', [$featuredJob->slug]) }}"
                                            title="{{ $featuredJob->title }}">
                                            {{ $company->printCompanyImage() }}
                                        </a>
                                    </div>
                                    <div class="col-8 pr-0 pl-0">
                                        <div class="company">
                                            <h4>
                                                <a><b>
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($company->name), 25, '...') }}
                                                </b></a>
                                            </h4>
                                            <!--- <span>{{ $featuredJob->getCity('city') }}</span>-->
                                        </div>
                                        <div class="pb-2 title-job">
                                            <a href="{{ route('job.detail', [$featuredJob->slug]) }}"
                                                title="{{ $featuredJob->title }}"><b>{{ \Illuminate\Support\Str::limit(strip_tags($featuredJob->title), 23, '...') }}</b></a>
                                        </div>
                                        <div class="jobloc">
                                            <label class="fulltime"
                                                title="{{ $featuredJob->getJobType('job_type') }}">{{ $featuredJob->getJobType('job_type') }}</label>

                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-3 col-md-3"><a
                                            href="{{ route('job.detail', [$featuredJob->slug]) }}"
                                            class="applybtn">{{ __('View Detail') }}</a></div> --}}
                                </div>
                            </div>
                        </li>
                        <!--Job end-->
                    @endif
                @endforeach
            @endif

        </ul>
        <!--Featured Job end-->
        <!--button start-->
        <div class="d-flex justify-content-end p-2" style="border: 0.5px solid #CCCAD2;">
            <a href="{{ route('job.list', ['is_featured' => 1]) }}" style="text-decoration:none;color:darkblue;"><i class="fa fa-eye" aria-hidden="true"></i> View All</a>
        </div>
        <!--button end-->
    </div>
</div>
