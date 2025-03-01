@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>$cmsContent->page_title])
<!-- Inner Page Title end -->
<div class="about-wraper">
    <div class="container">
        <div class="row">
            <style>
                h5{
                    margin-bottom:0px;
                }
            </style>
            <div class="col-md-12">
                <h2>ABOUT SAJILOJOB</h2>
                <hr>
                <p>We are sajilojob.com, one of the leading and growing job portal in Nepal. We collect every possible job options available all over the Nepal. sajilojob.com is cost-effective and user-friendly platform to accumulate job options. Millions of seekers visit our page from all over the Nepal.

                </p>
                <p class="mt-3">sajilojob.com, supports in training & recruiting the suitable candidates available as per requirement of company as a part of its services. sajilojob.com will be forwarding the suitable candidate as per employer’s requirement.
                </p>
                <h4 class="mt-3">Benefits for Employers.</h4>
                <h5>Access to more, better candidates.</h5>
                <p>(We are constantly recruiting, we have huge number of candidates looking for placement which gives us huge advantage on getting your vacancy in front of the right candidate, pretty much immediately.)
                </p>
                <h5 class="mt-3">Save time.</h5>
                <p>
                    (We do filter and screen CVs in multiple levels before it reaches you. By doing so your organization will have more time to spend with right candidates.)
                </p>
                <h5 class="mt-3">Market Knowledge.</h5>
                <p>
                    (It is our job to keep up to date with the latest news, developments and current affairs in the industry you are recruiting for. Our insights enable us to guide you through the entire process, advising you of any changes that affects the process.)
                </p>
                <h5 class="mt-3">Recruitment Knowledge.</h5>
                <p>
                    (Our recruitment knowledge will be on your side, we will be making sure your job advert ranks highly, using popular keywords and effectively screening CVs, filtering out weaker candidates early on in the process assuring that you will end up with better candidates.)
                </p>
                <h5 class="mt-3">Employer Branding.</h5>
                <p>
                    (We will represent you professionally throughout the entire process, but we will also ensure that candidates get a feel for your company culture and brand as well. We are on your side and we will back you every step of the way.)
                </p>
                <p>
                    As a whole, we will help you hire faster and highly qualified candidates keeping your professional appearance.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">{!! $siteSetting->cms_page_ad !!}</div>
            <div class="col-md-3"></div>
        </div>
    </div>  
</div>
@include('includes.footer')
@endsection