@extends('layouts.app')
@section('content')
    <!-- Header start -->
    @include('includes.header')
    <!-- Header end -->
    <!-- Search start -->
    @include('includes.search')
    <!-- Search End -->
    <!-- Top Employers start -->
     @include('includes.top_employers')
    <!-- Top Employers ends -->
    <!-- Popular Searches start -->

    <!-- Popular Searches ends -->
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-sm-8">
                <!-- Top Jobs start -->
                @include('includes.top_jobs')
                <!-- Top Jobs start -->
                <!-- Latest Jobs start -->
                @include('includes.latest_jobs')
                <!-- Latest Jobs ends -->
                <!-- Featured Jobs start -->
                @include('includes.featured_jobs')
                <!-- Featured Jobs ends -->
            </div>
            <div class="col-lg-3 col-sm-4">
                @include('includes.right_sidebar')
            </div>
        </div>
    </div>
    
    <!-- Login box start -->
    @include('includes.login_text')
    <!-- Login box ends -->
    <!-- How it Works start -->
    @include('includes.how_it_works')
    <!-- How it Works Ends -->
    <!-- Testimonials start -->
    {{-- @include('includes.testimonials') --}}
    <!-- Testimonials End -->
    <!-- Video start -->
    {{-- @include('includes.video') --}}
    <!-- Video end -->
    <!-- Login box start -->
    @include('includes.employer_login_text')
    <!-- Login box ends -->
    <!-- Testimonials start -->
    @include('includes.home_blogs')
    <!-- Testimonials End -->
    <!-- Subscribe start -->
    {{-- @include('includes.subscribe') --}}
    <!-- Subscribe End -->
    @include('includes.sticky_footer')
    @include('includes.footer')
@endsection
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
        });
    </script>
    @include('includes.country_state_city_js')
@endpush
