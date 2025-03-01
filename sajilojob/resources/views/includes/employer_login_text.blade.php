@if (!Auth::user() && !Auth::guard('company')->user())
    <div class="emploginbox ">
        <div class="container ">
            <div class="d-md-flex">
                <div class="titleTop col-md-8">
                    <div style="color:#373092" class="subtitle mb-3">{{ __('Are You Looking For Candidates!') }}</div>
                    <h3>{{ __('Post a Job Today') }} </h3>
                    <h4>{{ __('and hire the right Candidates') }}</h4>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nunc ex, maximus vel felis ut,
                        vestibulum tristique enim. Proin eu nulla est. Maecenas tempor euismod suscipit. Sed at libero
                        ante.
                        Vestibulum nec odio lacus.</p> --}}
                </div>


                <div class="col-md-4">
                    {{-- <div class="viewallbtn"><a href="{{ route('register') }}">{{ __('Post a Job') }}</a></div> --}}
                    <a style="background:#373092" class="w-50 btn btn-success btn-lg viewallbtn border-0"
                        href="{{ route('register') }}">{{ __('Post a Job') }}</a>
                </div>
            </div>
        </div>
    </div>
@endif
