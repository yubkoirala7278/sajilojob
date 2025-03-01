@extends('layouts.app')

@section('content')

    <!-- Header start -->

    @include('includes.header')

    <!-- Header end -->

    <!-- Inner Page Title start -->

    @include('includes.inner_page_title', ['page_title'=>__('Company Detail')])

    <!-- Inner Page Title end -->
    <style>
        .company-bg-image {
            background: linear-gradient(rgba(255, 255, 255, .1), rgba(255, 255, 255, .1)), url('https://sajilojob.com/company_bg_images/{{ $company->bg_image }}');
            background-repeat: no-repeat;
            background-size: cover;
            height: 250px;
        }

        .company-gradient {
            background: -moz-linear-gradient(top, transparent 0, rgba(0, 0, 0, .88) 97%, rgba(0, 0, 0, .88) 100%);
            background: -webkit-linear-gradient(top, transparent, rgba(0, 0, 0, .88) 97%, rgba(0, 0, 0, .88));
            background: linear-gradient(180deg, transparent, rgba(0, 0, 0, .88) 97%, rgba(0, 0, 0, .88));
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#00000000", endColorstr="#e0000000", GradientType=0);
            margin: inherit !important;
            padding: inherit !important;
        }

        .detail-company {
            width: 10%;
        }

        .detail-company img {
            width: 100%;
        }

        .title {
            font-size: 24px !important;
            font-weight: 600 !important;
        }

        .desi {
            font-size: 18px !important;
            margin-top: 10px !important;
        }

        .company-middle {
            width: 70%;

        }

        .company-right-side {
            width: 20%;
        }

        @media screen and (max-width: 992px) {
            .detail-company {
                width: 15%;
            }

            .company-middle {
                width: 35% !important;

            }

            .company-right-side {
                width: 50% !important;
            }
        }

        @media screen and (max-width: 560px) {
            .company-bg-image {
                height: 300px;
            }

            .detail-company {
                width: 30%;
            }

            .company-middle {
                width: 100%;

            }

            .company-right-side {
                width: 100%;
            }
        }

    </style>
    <div class="listpgWraper">

        <div class="container">

            @include('flash::message')

            <!-- Job Header start -->

            <div class="job-header">

                <div class="company-bg-image d-flex flex-column justify-content-end">
                    <div class="company-gradient">
                        <div class="d-sm-flex justify-content-between p-2">
                            <div class="detail-company p-0 m-0">
                                <a
                                    href="{{ route('company.detail', $company->slug) }}">{{ $company->printCompanyImage() }}</a>

                            </div>
                            <div class="align-self-center pl-sm-2" style="color: white;width:70%;">
                                <div class="title">{{ $company->name }}</div>
                                <div class="desi">{{ $company->getIndustry('industry') }}</div>
                                <div class="loctext"><i style="color:white;" class="fa fa-history" aria-hidden="true"></i>

                                    {{ __('Member Since') }}, {{ $company->created_at->format('M d, Y') }}</div>

                                <div class="loctext"><i style="color:white;" class="fa fa-map-marker"
                                        aria-hidden="true"></i>

                                    {{ $company->location }}</div>
                            </div>
                            <div class="company-right-side pl-sm-2">
                                @if (!Auth::user() && !Auth::guard('company')->user())

                                    <h5>Login to View contact details</h5>

                                    <a href="{{ route('login') }}" class="btn">Login</a>

                                @else

                                    <div class="candidateinfo">

                                        @if (!empty($company->phone))

                                            <div class="loctext"><i style="color:white;" class="fa fa-phone"
                                                    aria-hidden="true"></i> <a style="color:white;"
                                                    href="tel:{{ $company->phone }}">{{ $company->phone }}</a></div>

                                        @endif

                                        @if (!empty($company->email))

                                            <div class="loctext"><i style="color:white;" class="fa fa-envelope"
                                                    aria-hidden="true"></i> <a style="color:white;"
                                                    href="mailto:{{ $company->email }}">{{ $company->email }}</a>
                                            </div>

                                        @endif

                                        @if (!empty($company->website))

                                            <div class="loctext"><i style="color:white;" class="fa fa-globe"
                                                    aria-hidden="true"></i> <a style="color:white;"
                                                    href="{{ $company->website }}"
                                                    target="_blank">{{ $company->website }}</a>
                                            </div>

                                        @endif

                                        <div class="cadsocial"> {!! $company->getSocialNetworkHtml() !!} </div>

                                    </div>

                                @endif
                            </div>
                        </div>

                    </div>

                    {{-- <div class="col-md-8 col-sm-8"> --}}

                    <!-- Candidate Info -->

                    {{-- <div class="candidateinfo">

                            <div class="userPic"><a
                                    href="{{ route('company.detail', $company->slug) }}">{{ $company->printCompanyImage() }}</a>

                            </div>

                            <div class="title">{{ $company->name }}</div>

                            <div style="color:black;" class="desi">{{ $company->getIndustry('industry') }}</div>

                            <div style="color:black;" class="loctext"><i style="color:#373092;" class="fa fa-history"
                                    aria-hidden="true"></i>

                                {{ __('Member Since') }}, {{ $company->created_at->format('M d, Y') }}</div>

                            <div style="color:black;" class="loctext"><i style="color:#373092;" class="fa fa-map-marker"
                                    aria-hidden="true"></i>

                                {{ $company->location }}</div>

                            <div class="clearfix"></div>

                        </div> --}}

                    {{-- </div> --}}

                    {{-- <div class="col-md-4 col-sm-4"> --}}

                    <!-- Candidate Contact -->

                    {{-- @if (!Auth::user() && !Auth::guard('company')->user())

                            <h5>Login to View contact details</h5>

                            <a href="{{ route('login') }}" class="btn">Login</a>

                        @else

                            <div class="candidateinfo">

                                @if (!empty($company->phone))

                                    <div class="loctext"><i style="color:#373092;" class="fa fa-phone"
                                            aria-hidden="true"></i> <a style="color:black;"
                                            href="tel:{{ $company->phone }}">{{ $company->phone }}</a></div>

                                @endif

                                @if (!empty($company->email))

                                    <div class="loctext"><i style="color:#373092;" class="fa fa-envelope"
                                            aria-hidden="true"></i> <a style="color:black;"
                                            href="mailto:{{ $company->email }}">{{ $company->email }}</a></div>

                                @endif

                                @if (!empty($company->website))

                                    <div class="loctext"><i style="color:#373092;" class="fa fa-globe"
                                            aria-hidden="true"></i> <a style="color:black;" href="{{ $company->website }}"
                                            target="_blank">{{ $company->website }}</a>
                                    </div>

                                @endif

                                <div class="cadsocial"> {!! $company->getSocialNetworkHtml() !!} </div>

                            </div>

                        @endif --}}



                    {{-- </div> --}}

                    {{-- </div> --}}

                </div>



                <!-- Buttons -->

                <div class="jobButtons">
                    @if (Auth::check() && Auth::user()->isFavouriteCompany($company->slug))
                        <a href="{{ route('remove.from.favourite.company', $company->slug) }}" class="btn"><i
                            class="fa fa-floppy-o" aria-hidden="true"></i> {{ __('Favourite Company') }} </a> @else
                        <a href="{{ route('add.to.favourite.company', $company->slug) }}" class="btn"><i
                                class="fa fa-floppy-o" aria-hidden="true"></i> {{ __('Add to Favourite') }}</a>
                        @endif <a href="{{ route('report.abuse.company', $company->slug) }}" class="btn report"><i
                                class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ __('Report Abuse') }}</a> <a href="javascript:;" onclick="send_message()" class="btn"><i
                                class="fa fa-envelope" aria-hidden="true"></i> {{ __('Send Message') }}</a>
                </div>

            </div>



            <!-- Job Detail start -->

            <div class="row">

                <div class="col-md-8">

                    <!-- About Employee start -->

                    <div class="job-header">

                        <div class="contentbox">

                            <h5 style="color:#373092">{{ __('About Company') }}</h5>

                            <p>{!! $company->description !!}</p>

                        </div>

                    </div>



                    <!-- Opening Jobs start -->

                    <div class="relatedJobs">

                        <h5 style="color:#373092">{{ __('Job Openings') }}</h5>

                        <ul class="searchList">

                            @if (isset($company->jobs) && count($company->jobs))

                                @foreach ($company->jobs as $companyJob)

                                    <!--Job start-->

                                    <li>

                                        <div class="row">

                                            <div class="col-md-8 col-sm-8">

                                                <div class="jobimg"><a
                                                        href="{{ route('job.detail', [$companyJob->slug]) }}"
                                                        title="{{ $companyJob->title }}">
                                                        {{ $company->printCompanyImage() }} </a></div>

                                                <div class="jobinfo">

                                                    <h3><a href="{{ route('job.detail', [$companyJob->slug]) }}"
                                                            title="{{ $companyJob->title }}">{{ $companyJob->title }}</a>
                                                    </h3>

                                                    <div class="companyName"><a
                                                            href="{{ route('company.detail', $company->slug) }}"
                                                            title="{{ $company->name }}">{{ $company->name }}</a>
                                                    </div>

                                                    <div class="location">

                                                        <label class="fulltime"
                                                            title="{{ $companyJob->getJobType('job_type') }}">{{ $companyJob->getJobType('job_type') }}</label>

                                                        <label class="partTime"
                                                            title="{{ $companyJob->getJobShift('job_shift') }}">{{ $companyJob->getJobShift('job_shift') }}</label>

                                                        - <span>{{ $companyJob->getCity('city') }}</span>
                                                    </div>

                                                </div>

                                                <div class="clearfix"></div>

                                            </div>

                                            <div class="col-md-4 col-sm-4">

                                                <div class="listbtn"><a
                                                        href="{{ route('job.detail', [$companyJob->slug]) }}">{{ __('View Detail') }}</a>

                                                </div>

                                            </div>

                                        </div>

                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($companyJob->description), 150, '...') }}
                                        </p>

                                    </li>

                                    <!--Job end-->

                                @endforeach

                            @endif



                            <!-- Job end -->

                        </ul>

                    </div>

                </div>

                <div class="col-md-4">

                    <!-- Company Detail start -->

                    <div class="job-header">

                        <div class="jobdetail">

                            <h5 style="color:#373092">{{ __('Company Detail') }}</h5>

                            <ul class="jbdetail">

                                <li class="row">

                                    <div class="col-md-6 col-xs-6">{{ __('Is Email Verified') }}</div>

                                    <div class="col-md-6 col-xs-6">
                                        <span>{{ ((bool) $company->verified) ? 'Yes' : 'No' }}</span>

                                    </div>

                                </li>

                                <li class="row">

                                    <div class="col-md-6 col-xs-6">{{ __('Total Employees') }}</div>

                                    <div class="col-md-6 col-xs-6"><span>{{ $company->no_of_employees }}</span></div>

                                </li>

                                <li class="row">

                                    <div class="col-md-6 col-xs-6">{{ __('Established In') }}</div>

                                    <div class="col-md-6 col-xs-6"><span>{{ $company->established_in }}</span></div>

                                </li>

                                <li class="row">

                                    <div class="col-md-6 col-xs-6">{{ __('Current jobs') }}</div>

                                    <div class="col-md-6 col-xs-6">

                                        <span>{{ $company->countNumJobs('company_id', $company->id) }}</span>
                                    </div>

                                </li>

                            </ul>

                        </div>

                    </div>



                    <!-- Google Map start -->

                    <!--<div class="job-header">-->

                    <!--    <div class="jobdetail">-->
                    <!--        <iframe src="https://maps.google.it/maps?q={{ urlencode(strip_tags($company->map)) }}&output=embed" allowfullscreen></iframe>-->
                    <!--    </div>-->

                    <!--</div>-->

                </div>

            </div>

        </div>

    </div>

    <!-- Modal -->

    <div class="modal fade" id="sendmessage" role="dialog">

        <div class="modal-dialog">



            <!-- Modal content-->

            <div class="modal-content">

                <form action="" id="send-form">

                    @csrf

                    <input type="hidden" name="company_id" id="company_id" value="{{ $company->id }}">

                    <div class="modal-header">

                        <h4 class="modal-title">Send Message</h4>

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>

                    <div class="modal-body">

                        <div class="form-group">

                            <textarea class="form-control" name="message" id="message" cols="10" rows="7"></textarea>

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
        .formrow iframe {

            height: 78px;

        }

    </style>

@endpush

@push('scripts')

    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('click', '#send_company_message', function() {

                var postData = $('#send-company-message-form').serialize();

                $.ajax({

                    type: 'POST',

                    url: "{{ route('contact.company.message.send') }}",

                    data: postData,

                    //dataType: 'json',

                    success: function(data) {

                        response = JSON.parse(data);

                        var res = response.success;

                        if (res == 'success') {

                            var errorString = '<div role="alert" class="alert alert-success">' +

                                response.message + '</div>';

                            $('#alert_messages').html(errorString);

                            $('#send-company-message-form').hide('slow');

                            $(document).scrollTo('.alert', 2000);

                        } else {

                            var errorString =
                                '<div class="alert alert-danger" role="alert"><ul>';

                            response = JSON.parse(data);

                            $.each(response, function(index, value) {

                                errorString += '<li>' + value + '</li>';

                            });

                            errorString += '</ul></div>';

                            $('#alert_messages').html(errorString);

                            $(document).scrollTo('.alert', 2000);

                        }

                    },

                });

            });

        });



        function send_message() {

            const el = document.createElement('div')

            el.innerHTML =

                "Please <a class='btn' href='{{ route('login') }}' onclick='set_session()'>log in</a> as a Canidate and try again."

            @if (Auth::check())
            
                $('#sendmessage').modal('show');
            
            @else
            
                swal({
            
                title: "You are not Loged in",
            
                content: el,
            
                icon: "error",
            
                button: "OK",
            
                });
            
            @endif

        }

        if ($("#send-form").length > 0) {

            $("#send-form").validate({

                validateHiddenInputs: true,

                ignore: "",



                rules: {

                    message: {

                        required: true,

                        maxlength: 5000

                    },

                },

                messages: {



                    message: {

                        required: "Message is required",

                    }



                },

                submitHandler: function(form) {

                    $.ajaxSetup({

                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }

                    });

                    @if (null !== Auth::user())
                    
                        $.ajax({
                    
                        url: "{{ route('submit-message') }}",
                    
                        type: "POST",
                    
                        data: $('#send-form').serialize(),
                    
                        success: function(response) {
                    
                        $("#send-form").trigger("reset");
                    
                        $('#sendmessage').modal('hide');
                    
                        swal({
                    
                        title: "Success",
                    
                        text: response["msg"],
                    
                        icon: "success",
                    
                        button: "OK",
                    
                        });
                    
                        }
                    
                        });
                    
                    @endif

                }

            })

        }
    </script>

@endpush
