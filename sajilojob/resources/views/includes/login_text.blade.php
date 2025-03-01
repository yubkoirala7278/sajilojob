<div class="userloginbox">
    <div class="container">

        <!--<p></p>-->

        @if (!Auth::user() && !Auth::guard('company')->user())
            <div class="titleTop">
                <h3>{{ __('Are You Looking For Job!') }} </h3>
            </div>
            <div class="viewallbtn"><a style="background:#373092" href="{{ route('register') }}">
                    {{ __('Get Started Today') }} </a></div>
        @elseif(Auth::user())
            <div class="titleTop">
                <h3>{{ __('Are You Looking For Job!') }} </h3>
            </div>
            <div class="viewallbtn"><a style="background:#373092"
                    href="{{ url('my-profile') }}">{{ __('Build Your CV') }} </a></div>
        @else
            <div class="titleTop">
                <h3>{{ __('Are You Looking For Job Seeker!') }} </h3>
            </div>
            <div class="viewallbtn"><a style="background:#373092"
                    href="{{ url('post-job') }}">{{ __('Post a Job') }} </a></div>
        @endif
    </div>
</div>
