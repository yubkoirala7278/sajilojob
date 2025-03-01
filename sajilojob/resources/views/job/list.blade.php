@extends('layouts.app')

@section('content')
    <!-- Header start -->
    @include('includes.header')
    <!-- Header end -->
    <!-- Inner Page Title start -->
    @include('includes.inner_page_title', ['page_title'=>__('Job Listing')])
    @include('flash::message')
    @include('includes.inner_top_search')
    <!-- Inner Page Title end -->
    <div class="listpgWraper">
        <div class="container">
            <form action="{{ route('job.list') }}" method="get">
                <!-- Search Result and sidebar start -->
                <div class="row">
                    @include('includes.job_list_side_bar')
                    <div class="col-lg-6 col-sm-12">
                        <!-- Search List -->
                        <ul class="searchList">
                            <!-- job start -->
                            @if (isset($jobs) && count($jobs)) <?php
                                $count_1 = 1; ?> @foreach ($jobs as $job)
                                    @php $company = $job->getCompany(); @endphp
                                    <?php if (isset($company)) { ?>
                                    <?php if ($count_1 == 7) { ?>
                                    <!--<li class="inpostad">{!! $siteSetting->listing_page_horizontal_ad !!}</li>-->
                                    <?php }  ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8">
                                                <div class="jobimg">{{ $company->printCompanyImage() }}</div>
                                                <div class="jobinfo">
                                                    <h3><a href="{{ route('job.detail', [$job->slug]) }}"
                                                            title="{{ $job->title }}">{{ $job->title }}</a></h3>
                                                    <div class="companyName"><a
                                                            href="{{ route('company.detail', $company->slug) }}"
                                                            title="{{ $company->name }}">{{ $company->name }}</a></div>
                                                    <div class="location">
                                                        <label class="fulltime"
                                                            title="{{ $job->getJobType('job_type') }}">{{ $job->getJobType('job_type') }}</label>
                                                        - <span>{{ $job->getCity('city') }}</span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="listbtn"><a
                                                        href="{{ route('job.detail', [$job->slug]) }}">{{ __('View Details') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($job->description), 150, '...') }}
                                        </p>
                                    </li>
                                    <?php $count_1++; ?>
                                    <?php } ?>
                                    <!-- job end -->
                                @endforeach @endif
                            <!-- job end -->
                        </ul>
                        <!-- Pagination Start -->
                        <div class="pagiWrap">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="showreslt">
                                        {{ __('Showing Pages') }} : {{ $jobs->firstItem() }} -
                                        {{ $jobs->lastItem() }} {{ __('Total') }} {{ $jobs->total() }}
                                    </div>
                                </div>
                                <div class="col-md-7 text-right">
                                    @if (isset($jobs) && count($jobs))
                                        {{ $jobs->appends(request()->query())->links() }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Pagination end -->
                    </div>
                    <div class="col-lg-3 col-sm-6 pull-right">
                        <div class="jobreqbtn">
                            <div class="bg-light p-3 text-center mb-3">
                                <div class="h4 pb-2"><b>New to Sajilo Job?</b></div>
                                @if (Auth::guard('company')->check())
                                    <a href="{{ route('post.job') }}" class="btn"><i class="fa fa-file-text"
                                            aria-hidden="true"></i>
                                        {{ __('Post Job') }}</a>
                                @else
                                    <a href="{{ url('my-profile#cvs') }}" class="btn"><i class="fa fa-file-text"
                                            aria-hidden="true"></i>
                                        {{ __('Upload Your Resume') }}</a>
                                @endif

                                <div class="jobalert-seperator">
                                    <span>or</span>
                                </div>
                                <a href="{{ route('register') }}" class="btn"><i class="fa fa-user-o"
                                        aria-hidden="true"></i>
                                    {{ __('Register with us') }}</a>
                            </div>
                            <div class="bg-light p-3">
                                <div class="h4 text-center"><b>Free Job Alert</b></div>
                                <p class="text-center mt-3">Get an email on jobs matching your criteria
                                </p>
                                <p class="text-center mt-3 mb-3">No registration required</p>
                                @if (Request::get('search') != '' || Request::get('functional_area_id') != '' || Request::get('country_id') != '' || Request::get('state_id') != '' || Request::get('city_id') != '' || Request::get('city_id') != '')
                                    <a class="btn btn-job-alert text-center" href="javascript:;">
                                        <i class="fa fa-bell" style="font-size:1.125rem;"></i> {{ __('Save Job Alert') }}
                                    </a>
                                @else
                                    <a class="btn btn-job-alert-disabled" disabled href="javascript:;">
                                        <i class="fa fa-bell" style="font-size:1.125rem;"></i>
                                        {{ __('Save Job Alert') }}</a>
                                @endif
                            </div>
                        </div>
                        {{-- fb page connect --}}
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0"
                                                nonce="P4elTUjy"></script>
                        <div class="h4 text-center mb-3">Connect with us</div>
                        <div class="fb-page" data-href="https://www.facebook.com/sajilojob" data-tabs="timeline"
                            data-width="" data-height="400" data-small-header="true" data-adapt-container-width="true"
                            data-hide-cover="false" data-show-facepile="false">
                            <blockquote cite="https://www.facebook.com/sajilojob" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/sajilojob">Sajilo Job</a></blockquote>
                        </div>

                        <!-- Sponsord By -->
                        <div class="sidebar mt-4">
                            <h4 class="widget-title">{{ __('Sponsord By') }}</h4>
                            <div class="gad">{!! $siteSetting->listing_page_vertical_ad !!}</div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="show_alert" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="submit_alert">
                    @csrf
                    <input type="hidden" name="search" value="{{ Request::get('search') }}">

                    <input type="hidden" name="country_id" value="@if (isset(Request::get('country_id')[0])) {{ Request::get('country_id')[0] }} @endif">

                    <input type="hidden" name="state_id" value="@if (isset(Request::get('state_id')[0])) {{ Request::get('state_id')[0] }} @endif">

                    <input type="hidden" name="city_id" value="@if (isset(Request::get('city_id')[0])) {{ Request::get('city_id')[0] }} @endif">

                    <input type="hidden" name="functional_area_id" value="@if (isset(Request::get('functional_area_id')[0])) {{ Request::get('functional_area_id')[0] }} @endif">

                    {{-- <input type="hidden" name="top_state_id" value="@if (isset(Request::get('top_state_id')[0])) {{ Request::get('top_state_id')[0] }} @endif"> --}}

                    <div class="modal-header">
                        <h4 class="modal-title">Job Alert</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h3>Get the latest <strong>{{ ucfirst(Request::get('search')) }}</strong> jobs @if (Request::get('location') != '') in
                                <strong>{{ ucfirst(Request::get('location')) }}</strong>
                            @endif sent
                            straight to your inbox</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email"
                                value="@if (Auth::check()) {{ Auth::user()->email }} @endif">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection
@push('styles')
    <style type="text/css">
        .searchList li .jobimg {
            min-height: 80px;
        }

        .hide_vm_ul {
            height: 100px;
            overflow: hidden;
        }

        .hide_vm {
            display: none !important;
        }

        .view_more {
            cursor: pointer;
        }

        .jobalert-seperator {
            margin-bottom: 10px;
            position: relative;
        }

        .jobalert-seperator::before {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            content: "";
            background: #222;
            height: 2px;
            margin-top: -1px;
        }

        .jobalert-seperator span {
            display: inline-block;
            vertical-align: top;
            background: #fff;
            padding: 10px;
            position: relative;
            z-index: 2;
        }

    </style>

@endpush

@push('scripts')
    <script>
        $('.btn-job-alert').on('click', function() {
            $('#show_alert').modal('show');
        })
        $(document).ready(function($) {
            $("#search-job-list").submit(function() {
                $(this).find(":input").filter(function() {
                    return !this.value;
                }).attr("disabled", "disabled");
                return true;
            });
            $("#search-job-list").find(":input").prop("disabled", false);
            $(".view_more_ul").each(function() {
                if ($(this).height() > 100) {
                    $(this).addClass('hide_vm_ul');
                    $(this).next().removeClass('hide_vm');
                }
            });
            $('.view_more').on('click', function(e) {
                e.preventDefault();
                $(this).prev().removeClass('hide_vm_ul');
                $(this).addClass('hide_vm');
            });
        });
        if ($("#submit_alert").length > 0) {
            $("#submit_alert").validate({
                rules: {
                    email: {
                        required: true,
                        maxlength: 5000,
                        email: true
                    }
                },
                messages: {
                    email: {
                        required: "Email is required",
                    }
                },
                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('subscribe.alert') }}",
                        type: "GET",
                        data: $('#submit_alert').serialize(),
                        success: function(response) {
                            $("#submit_alert").trigger("reset");
                            $('#show_alert').modal('hide');
                            swal({
                                title: "Success",
                                text: response["msg"],
                                icon: "success",
                                button: "OK",
                            });
                        }
                    });
                }
            })
        }
    </script>
    @include('includes.country_state_city_js')
@endpush
