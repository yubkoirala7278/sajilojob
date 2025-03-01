<style>
    .package_top_job:hover {
        color: rgb(78, 76, 76);
    }

    .package-main {
        background: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px;
        border-top: 2px solid #373092;
    }

    .package-main:hover {
        box-shadow: 3px 8px 30px rgba(0, 0, 0, 0.2);
        border-top: 2px solid red;
    }

    .package_title {
        font-weight: 900;
        font-size: 18px;
        padding: 5px;
    }

    .package_price {
        padding: 5px;
        font-size: 16px;
        font-weight: 600;
        color: #373092;
    }

    .package_job {
        /* color: rgb(114, 111, 111); */
        font-size: 14px;
    }

    .package_duration {
        /* color: rgb(114, 111, 111); */
        font-size: 14px;
    }

    @media screen and (max-width: 992px) {
        .package_job {
            font-size: 15px !important;
        }

        .package-main {
            text-align: center !important;
        }
    }

</style>
<div class="paypackages">
    <!---four-paln-->
    <div class="four-plan">
        <h3 class="mb-4">{{ __('Upgrade Package') }}</h3>
        {{-- TOP JOBS --}}
        <div>
            <h4 class="p-2 package_top_job" style="">{{ __('Top Job Packages') }}</h4>
            <div class="row">
                @foreach ($packages as $package)
                    @if ($package->package_job == 'Top Job')
                        <div class="package-main ml-3 mr-2 col-md-2 col-sm-6 col-xs-12 mb-4">
                            <div class="package_title">
                                {{ $package->package_title }}
                            </div>
                            <div class="package_price">
                                {{ $siteSetting->default_currency_code }} {{ $package->package_price }}
                            </div>
                            <div class="package_job pt-2 pb-2">
                                Can post jobs : <p class="text-center">{{ $package->package_num_listings }}</p>
                            </div>
                            <div class="package_duration pt-2 pb-2 text-center">
                                @if ($package->package_num_days / 30 >= 12)
                                    Package Duration :
                                    <p class="mt-2">1 Year</p>
                                @elseif($package->package_num_days/30 >= 6 && $package->package_num_days/30 < 12)
                                        Package Duration : <p class="mt-2">6 Months
                                        </p>
                                    @elseif($package->package_num_days/30 >= 3 &&
                                        $package->package_num_days/30 < 6) Package Duration : <p class="mt-2">3 Months
                                            </p>
                                        @else Package
                                            Duration : <p class="mt-2">1 Month
                                            </p>
                                @endif
                            </div>
                            <div class="p-2">
                                <a href="javascript:void(0)" style="background: #373092;color:white;" class="btn btn-sm"
                                    data-toggle="modal"
                                    data-target="#buypack{{ $package->id }}">{{ __('Buy Now') }}</a>
                            </div>
                            <div class="modal fade" id="buypack{{ $package->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            <div class="invitereval">
                                                <!--<h3>Please Choose Your Payment Method to Pay</h3>	-->

                                                <div class="totalpay">{{ __('Total Amount to pay') }}:
                                                    <strong>{{ $package->package_price }}</strong>
                                                </div>

                                                <p><small style="color:red;">Note:Please add company
                                                        name
                                                        and package
                                                        title
                                                        in
                                                        remarks while paying.</small></p>
                                                <div>
                                                    <img src="{{ asset('/images/fonepay.jpg') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif
                @endforeach
            </div>
        </div>
        <hr>
        {{-- HOT JOBS --}}
        <div>
            <h4 class="p-2 package_top_job" style="">{{ __('Hot Job Packages') }}</h4>
            <div class="row">
                @foreach ($packages as $package)
                    @if ($package->package_job == 'Hot Job')
                        <div class="package-main ml-3 mr-2 col-md-2 col-sm-6 col-xs-12 mb-4">
                            <div class="package_title">
                                {{ $package->package_title }}
                            </div>
                            <div class="package_price">
                                {{ $siteSetting->default_currency_code }} {{ $package->package_price }}
                            </div>
                            <div class="package_job p-2">
                                Can post jobs : <p class="text-center">{{ $package->package_num_listings }}</p>
                            </div>
                            <div class="package_duration pt-2 pb-2 text-center">
                                @if ($package->package_num_days / 30 >= 12)
                                    Package Duration :
                                    <p class="mt-2">1 Year</p>
                                @elseif($package->package_num_days/30 >= 6 && $package->package_num_days/30 < 12)
                                        Package Duration : <p class="mt-2">6 Months
                                        </p>
                                    @elseif($package->package_num_days/30 >= 3 &&
                                        $package->package_num_days/30 < 6) Package Duration : <p class="mt-2">3 Months
                                            </p>
                                        @else Package
                                            Duration : <p class="mt-2">1 Month
                                            </p>
                                @endif
                            </div>
                            <div class="p-2">
                                <a href="javascript:void(0)" style="background: #373092;color:white;" class="btn btn-sm"
                                    data-toggle="modal"
                                    data-target="#buypack{{ $package->id }}">{{ __('Buy Now') }}</a>
                            </div>
                            <div class="modal fade" id="buypack{{ $package->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            <div class="invitereval">
                                                <!--<h3>Please Choose Your Payment Method to Pay</h3>	-->

                                                <div class="totalpay">{{ __('Total Amount to pay') }}:
                                                    <strong>{{ $package->package_price }}</strong>
                                                </div>

                                                <p><small style="color:red;">Note:Please add company name and package
                                                        title
                                                        in
                                                        remarks while paying.</small></p>
                                                <div>
                                                    <img src="{{ asset('/images/fonepay.jpg') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif
                @endforeach
            </div>
        </div>
        <hr>

        {{-- FEATURE JOBS --}}
        <div>
            <h4 class="p-2 package_top_job" style="">{{ __('Feature Job Packages') }}</h4>
            <div class="row">
                @foreach ($packages as $package)
                    @if ($package->package_job == 'Feature Job')
                        <div class="package-main ml-3 mr-2 col-md-2 col-sm-6 col-xs-12 mb-4">
                            <div class="package_title">
                                {{ $package->package_title }}
                            </div>
                            <div class="package_price">
                                {{ $siteSetting->default_currency_code }} {{ $package->package_price }}
                            </div>
                            <div class="package_job p-2">
                                Can post jobs : <p class="text-center">{{ $package->package_num_listings }}</p>
                            </div>
                            <div class="package_duration pt-2 pb-2 text-center">
                                @if ($package->package_num_days / 30 >= 12)
                                    Package Duration :
                                    <p class="mt-2">1 Year</p>
                                @elseif($package->package_num_days/30 >= 6 && $package->package_num_days/30 < 12)
                                        Package Duration : <p class="mt-2">6 Months
                                        </p>
                                    @elseif($package->package_num_days/30 >= 3 &&
                                        $package->package_num_days/30 < 6) Package Duration : <p class="mt-2">3 Months
                                            </p>
                                        @else Package
                                            Duration : <p class="mt-2">1 Month
                                            </p>
                                @endif
                            </div>
                            <div class="p-2">
                                <a href="javascript:void(0)" style="background: #373092;color:white;" class="btn btn-sm"
                                    data-toggle="modal"
                                    data-target="#buypack{{ $package->id }}">{{ __('Buy Now') }}</a>
                            </div>
                            <div class="modal fade" id="buypack{{ $package->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            <div class="invitereval">
                                                <!--<h3>Please Choose Your Payment Method to Pay</h3>	-->

                                                <div class="totalpay">{{ __('Total Amount to pay') }}:
                                                    <strong>{{ $package->package_price }}</strong>
                                                </div>

                                                <p><small style="color:red;">Note:Please add company name and package
                                                        title
                                                        in
                                                        remarks while paying.</small></p>
                                                <div>
                                                    <img src="{{ asset('/images/fonepay.jpg') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!---end four-paln-->
</div>
