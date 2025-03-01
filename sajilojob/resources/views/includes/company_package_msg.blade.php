<style>
    .msg-company {
        border-top: 2px solid #373092;
    }

    .msg-company:hover {
        border-top: 2px solid red;
    }

</style>
<div class="instoretxt msg-company">
    <div class="credit">{{ __('Your Package is') }}: <strong style="color: #373092;">{{ $package->package_job }} -
            {{ $package->package_title }} -
            {{ $siteSetting->default_currency_code }}{{ $package->package_price }}</strong></div>
    <div class="credit">{{ __('Package Duration') }} :
        <strong
            style="color: #373092;">{{ Auth::guard('company')->user()->package_start_date->format('d M, Y') }}</strong>
        -
        <strong
            style="color: #373092;">{{ Auth::guard('company')->user()->package_end_date->format('d M, Y') }}</strong>
    </div>
    <div class="credit">{{ __('Available Job Post') }} :
        <strong style="color: #373092;">{{ Auth::guard('company')->user()->availed_jobs_quota }}</strong> /
        <strong style="color: #373092;">{{ Auth::guard('company')->user()->jobs_quota }}</strong>
    </div>

</div>
