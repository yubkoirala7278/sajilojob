@extends('layouts.app')
@section('content')
    <!-- Header start -->
    @include('includes.header')
    <!-- Header end -->
    <!-- Inner Page Title start -->
    @include('includes.inner_page_title', ['page_title'=>__('Job Detail')])
    <!-- Inner Page Title end -->
    @include('flash::message')
    @include('includes.inner_top_search')
    @php
    $company = $job->getCompany();
    @endphp
    <div class="listpgWraper">
        <div class="container">
            @include('flash::message')

            <style>
                .bg-image {
                    background: linear-gradient(rgba(255, 255, 255, .1), rgba(255, 255, 255, .1)), url('http://localhost/sajilojob/company_bg_images/{{ $company->bg_image }}');
                    background-repeat: no-repeat;
                    background-size: cover;
                    height: 250px;
                }

                .detail-company {
                    width: 13%;
                }

                .detail-company img {
                    width: 100%;
                }

                .company-gradient {
                    background: -moz-linear-gradient(top, transparent 0, rgba(0, 0, 0, .88) 97%, rgba(0, 0, 0, .88) 100%);
                    background: -webkit-linear-gradient(top, transparent, rgba(0, 0, 0, .88) 97%, rgba(0, 0, 0, .88));
                    background: linear-gradient(180deg, transparent, rgba(0, 0, 0, .88) 97%, rgba(0, 0, 0, .88));
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#00000000", endColorstr="#e0000000", GradientType=0);
                    margin: inherit !important;
                    padding: inherit !important;
                }

                @media screen and (max-width: 560px) {
                    .detail-company {
                        width: 20% !important;
                    }

                    .bg-image {
                        height: 150px;
                    }
                }

            </style>
            <!-- Job Detail start -->
            <div class="row">
                <div class="col-lg-7">

                    <!-- Job Header start -->
                    <div class="job-header">
                        <div class="bg-image d-flex flex-column justify-content-end">
                            <div class="company-gradient">
                                <div class="d-flex p-2">
                                    <div class="detail-company p-0 m-0">
                                        <a
                                            href="{{ route('company.detail', $company->slug) }}">{{ $company->printCompanyImage() }}</a>

                                    </div>
                                    <div class="align-self-center pl-2">
                                        <a style="font-size:16px;color:white;text-decoration:none;"
                                            href="{{ route('company.detail', $company->slug) }}">{{ $company->name }}</a>
                                        <h4 class="mt-1" style="color:white;">{{ $job->title }}</h4>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- Job Detail start -->
                        <div class="jobmainreq">
                            <div class="jobdetail">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 style="color:#373092"><i class="fa fa-align-left" aria-hidden="true"></i>
                                            {{ __('Job Detail') }}</h5>
                                    </div>
                                    <div style="color:#BCB7B6">
                                        Views : {{ $job->views }} |<span style="color:black;"> Apply Before:
                                            {{ $job->applyBefore() }} days </span>
                                    </div>
                                </div>


                                <style>
                                    .jbdetail-hover li:hover {
                                        background: rgb(187, 185, 185);
                                        color: black;
                                    }



                                    .jbdetail-hover li {
                                        padding: 10px;
                                    }

                                </style>
                                <ul class="jbdetail jbdetail-hover">
                                    <li class="row">
                                        <div class="col-md-4 col-xs-5 mb-sm-0 mb-2 detail-li">{{ __('Job Location') }}:
                                        </div>
                                        <div class="col-md-8 col-xs-7">
                                            @if ((bool) $job->is_freelance)
                                                <span>Freelance</span>
                                            @else
                                                <span>{{ $job->getLocation() }}</span>
                                            @endif
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-md-4 col-xs-5 mb-sm-0 mb-2 detail-li">{{ __('Job Category') }}:
                                        </div>
                                        <div class="col-md-8 col-xs-7">
                                            <span>{{ $company->industry->industry }}</span>
                                        </div>
                                    </li>
                                    <!--<li class="row">-->
                                    <!--    <div class="col-md-4 col-xs-5">{{ __('Company') }}:</div>-->
                                    <!--    <div class="col-md-8 col-xs-7"><a-->
                                    <!--            href="{{ route('company.detail', $company->slug) }}">{{ $company->name }}</a>-->
                                    <!--    </div>-->
                                    <!--</li>-->

                                    <li class="row">
                                        <div class="col-md-4 col-xs-5 mb-sm-0 mb-2 detail-li">
                                            {{ __('Employment Type') }}:</div>
                                        <div class="col-md-8 col-xs-7"><span style="color:#373092"
                                                class="permanent">{{ $job->getJobType('job_type') }}</span></div>
                                    </li>
                                    <!--<li class="row">-->
                                    <!--    <div class="col-md-4 col-xs-5">{{ __('Shift') }}:</div>-->
                                    <!--    <div class="col-md-8 col-xs-7"><span style="color:red"-->
                                    <!--            class="freelance">{{ $job->getJobShift('job_shift') }}</span></div>-->
                                    <!--</li>-->
                                    @if (!empty($job->getCareerLevel('career_level')))

                                        <li class="row">
                                            <div class="col-md-4 col-xs-5 mb-sm-0 mb-2 detail-li">
                                                {{ __('Career Level') }}:</div>
                                            <div class="col-md-8 col-xs-7">
                                                <span>{{ $job->getCareerLevel('career_level') }}</span>
                                            </div>
                                        </li>
                                    @endif
                                    <li class="row">
                                        <div class="col-md-4 col-xs-5 mb-sm-0 mb-2 detail-li">
                                            {{ __('No. of Vacancy/s') }}:</div>
                                        <div class="col-md-8 col-xs-7"><span>{{ $job->num_of_positions }}</span></div>
                                    </li>
                                    <li class="row">
                                        <div class="col-md-4 col-xs-5 mb-sm-0 mb-2 detail-li">{{ __('Salary') }}:</div>
                                        <div class="col-md-8 col-xs-7">
                                            <span>
                                                @if (!Auth::user() && !Auth::guard('company')->user())
                                                    <a href="{{ route('login') }}"><i class="fa fa-sign-in"
                                                            aria-hidden="true"></i>
                                                        {{ __('Login to View Salary') }} </a>
                                                @else
                                                    @if (!(bool) $job->hide_salary)
                                                        <div style="color:black;" class="salary">
                                                            {{-- {{ $job->getSalaryPeriod('salary_period') }} --}}
                                                            <strong>
                                                                {{-- @if (!empty($job->salary_to))
                                                                    {{ $job->salary_currency . ' ' . $job->salary_from }}
                                                                    -
                                                                    {{ $job->salary_currency . ' ' . $job->salary_to }}
                                                                @else
                                                                    {{ $job->salary_currency . ' ' . $job->salary_from }}
                                                                @endif --}}
                                                                @if (!empty($job->salary))
                                                                    @if ($job->salary == 'negotiable' || $job->salary == 'Negotiable')
                                                                        Negotiable
                                                                    @else
                                                                        NPR. {{ $job->salary }}
                                                                    @endif

                                                                @else
                                                                    Negotiable
                                                                @endif

                                                            </strong>
                                                        </div>
                                                    @endif
                                                @endif
                                            </span>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-md-4 col-xs-5 mb-sm-0 mb-2 detail-li">{{ __('Gender') }}:</div>
                                        <div class="col-md-8 col-xs-7"><span>{{ $job->getGender('gender') }}</span></div>
                                    </li>

                                    <li class="row">
                                        <div class="col-md-4 col-xs-5 mb-sm-0 mb-2 detail-li">{{ __('Apply Before') }}:
                                        </div>
                                        <div class="col-md-8 col-xs-7">
                                            <span>{{ $job->expiry_date->format('M d, Y') }}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="jspecification mb-4" style="background:#fff;">
                        <div class="jobmainreq">
                            <div class="jobdetail">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 style="color:#373092"><i class="fa fa-align-left" aria-hidden="true"></i>
                                            {{ __('Job Specification') }}</h5>
                                    </div>
                                </div>
                                <style>
                                    .skill-li li {
                                        margin-bottom: 5px !important;
                                    }

                                    .spec-li li {
                                        list-style: disc !important;
                                        margin: 5px 5px 10px 50px;
                                    }

                                </style>
                                <ul class="jbdetail jbdetail-hover">
                                    <li class="row">
                                        <div class="col-md-4 col-xs-5 mb-sm-0 mb-2 detail-li">
                                            {{ __('Education Level') }}:</div>
                                        <div class="col-md-8 col-xs-7">
                                            <span>{{ $job->getDegreeLevel('degree_level') }}</span>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-md-4 col-xs-5 mb-sm-0 mb-2 detail-li">
                                            {{ __('Experience Required') }}:
                                        </div>
                                        <div class="col-md-8 col-xs-7">
                                            <span>{{ $job->getJobExperience('job_experience') }}</span>
                                        </div>
                                    </li>
                                    <li class="row skill-li">
                                        <div class="col-md-4 col-xs-5 mb-sm-0 mb-2 detail-li">
                                            {{ __('Skills Required') }}:</div>
                                        <div class="col-md-8 col-xs-7">
                                            <ul class="skillslist">
                                                {!! $job->getJobSkillsList() !!}
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                @if (!empty($job->specification))
                                    <div class="spec-li ">
                                        <p style="font-weight:700;">Other Specification</p>
                                        <p class="mt-3">{!! html_entity_decode($job->specification) !!}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Job Description start -->
                    <div class="job-header">
                        <div class="contentbox">
                            <h5 style="color:#373092"><i class="fa fa-file-text-o" aria-hidden="true"></i>
                                {{ __('Job Description') }}</h5>
                            <p>{!! $job->description !!}</p>
                        </div>
                    </div>

                    @if (!empty($job->benefits))
                        <div class="job-header benefits">
                            <div class="contentbox">
                                <h5 style="color:#373092"><i class="fa fa-file-text-o" aria-hidden="true"></i>
                                    {{ __('Benefits') }}</h5>
                                <p>{!! $job->benefits !!}</p>
                            </div>
                        </div>
                    @endif


                    <hr>
                    <div class="jobButtons">
                        <a href="{{ route('email.to.friend', $job->slug) }}" class="btn"><i class="fa fa-envelope"
                                aria-hidden="true"></i> {{ __('Email to Friend') }}</a>
                        @if (Auth::check() && Auth::user()->isFavouriteJob($job->slug))
                            <a href="{{ route('remove.from.favourite', $job->slug) }}" class="btn"><i
                                    class="fa fa-floppy-o" aria-hidden="true"></i> {{ __('Favourite Job') }} </a>
                        @else
                            <a href="{{ route('add.to.favourite', $job->slug) }}" class="btn"><i class="fa fa-floppy-o"
                                    aria-hidden="true"></i> {{ __('Add to Favourite') }}</a>
                        @endif
                        <a href="{{ route('report.abuse', $job->slug) }}" class="btn report"><i
                                class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ __('Report Abuse') }}</a>
                    </div>

                    <!-- Job Description end -->


                </div>
                <!-- related jobs end -->

                <div class="col-lg-5">
                    <div class="jobButtons applybox">
                        @if ($job->isJobExpired())
                            <span class="jbexpire"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                {{ __('Job is expired') }}</span>
                        @elseif(Auth::check() && Auth::user()->isAppliedOnJob($job->id))
                            <a href="javascript:;" class="btn apply applied"><i class="fa fa-paper-plane"
                                    aria-hidden="true"></i> {{ __('Already Applied') }}</a>
                        @else
                            <a href="{{ route('apply.job', $job->slug) }}" style="background:#373092;border:none"
                                class="btn apply"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                {{ __('Apply Now') }}</a>
                        @endif
                    </div>


                    <div class="companyinfo">
                        <h5 style="color:#373092"><i class="fa fa-building-o" aria-hidden="true"></i>
                            {{ __('Company Overview') }}</h5>
                        <div class="companylogo mt-2">
                            <a
                                href="{{ route('company.detail', $company->slug) }}">{{ $company->printCompanyImage() }}</a>
                        </div>
                        <div class="title mt-3">
                            <a style="font-size:16px;"
                                href="{{ route('company.detail', $company->slug) }}">{{ $company->name }}</a>
                        </div>
                        <div style="color:red;" class="ptext">{{ $company->getLocation() }}</div>
                        <div class="opening">
                            <a style="color:#373092" href="{{ route('company.detail', $company->slug) }}">
                                {{ App\Company::countNumJobs('company_id', $company->id) }}
                                {{ __('Current Jobs Openings') }}
                            </a>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="companyoverview">

                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($company->description), 250, '...') }} <a
                                    href="{{ route('company.detail', $company->slug) }}">Read More</a></p>
                        </div>
                    </div>



                    <!-- more job by same company start -->
                    <div class="relatedJobs">
                        <h4 style="color:#373092">{{ __('Other Jobs By This Company') }}</h4>
                        <ul class="searchList">
                            @if (isset($sameCompanyJobs) && count($sameCompanyJobs))
                                @foreach ($sameCompanyJobs as $sameCompanyJob)
                                    <?php $sameCompany = $sameCompanyJob->getCompany(); ?>
                                    @if (null !== $sameCompany)
                                        <!--Job start-->
                                        <li>
                                            <div class="jobinfo">
                                                <h6><a style="color:#373092"
                                                        href="{{ route('job.detail', [$sameCompanyJob->slug]) }}"
                                                        title="{{ $sameCompanyJob->title }}">{{ $sameCompanyJob->title }}</a>
                                                </h6>
                                                <div class="companyName"><a
                                                        href="{{ route('company.detail', $sameCompany->slug) }}"
                                                        title="{{ $sameCompany->name }}">{{ $sameCompany->name }}</a>
                                                </div>
                                                <div class="location"><span
                                                        style="color:red !important">{{ $sameCompanyJob->getCity('city') }}</span>
                                                </div>
                                                <div class="location">
                                                    <label
                                                        class="fulltime">{{ $sameCompanyJob->getJobType('job_type') }}</label>
                                                    <label
                                                        class="partTime">{{ $sameCompanyJob->getJobShift('job_shift') }}</label>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                        </li>
                                        <!--Job end-->
                                    @endif
                                @endforeach
                            @endif

                            <!-- Job end -->
                        </ul>
                    </div>


                    <!-- similar jobs start -->
                    <div class="relatedJobs">
                        <h4 style="color:#373092">{{ __('Similar Jobs') }}</h4>
                        <ul class="searchList">
                            @if (isset($similarJobs) && count($similarJobs))
                                @foreach ($similarJobs as $similarJob)
                                    <?php $relatedJobCompany = $similarJob->getCompany(); ?>
                                    @if (null !== $relatedJobCompany)
                                        <!--Job start-->
                                        <li>
                                            <div class="jobinfo">
                                                <h6><a style="color:#373092"
                                                        href="{{ route('job.detail', [$similarJob->slug]) }}"
                                                        title="{{ $similarJob->title }}">{{ $similarJob->title }}</a>
                                                </h6>
                                                <div class="companyName"><a
                                                        href="{{ route('company.detail', $relatedJobCompany->slug) }}"
                                                        title="{{ $relatedJobCompany->name }}">{{ $relatedJobCompany->name }}</a>
                                                </div>
                                                <div class="location"><span
                                                        style="color:red">{{ $similarJob->getCity('city') }}</span>
                                                </div>
                                                <div class="location">
                                                    <label
                                                        class="fulltime">{{ $similarJob->getJobType('job_type') }}</label>
                                                    <label
                                                        class="partTime">{{ $similarJob->getJobShift('job_shift') }}</label>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                        </li>
                                        <!--Job end-->
                                    @endif
                                @endforeach
                            @endif

                            <!-- Job end -->
                        </ul>
                    </div>

                    <!-- Google Map start -->
                    {{-- <div class="job-header">
                        <div class="jobdetail">
                            <h3><i class="fa fa-map-marker" aria-hidden="true"></i> {{ __('Google Map') }}</h3>
                            <div class="gmap">
                                {!! $company->map !!}
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection
@push('styles')
    <style type="text/css">
        .view_more {
            display: none !important;
        }

    </style>
@endpush
@push('scripts')
    <script>
        $(document).ready(function($) {
            $("form").submit(function() {
                $(this).find(":input").filter(function() {
                    return !this.value;
                }).attr("disabled", "disabled");
                return true;
            });
            $("form").find(":input").prop("disabled", false);

            $(".view_more_ul").each(function() {
                if ($(this).height() > 100) {
                    $(this).css('height', 100);
                    $(this).css('overflow', 'hidden');
                    //alert($( this ).next());
                    $(this).next().removeClass('view_more');
                }
            });



        });
    </script>
@endpush
