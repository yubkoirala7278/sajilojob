<!--Footer-->
{{-- <div class="largebanner shadow3">
    <div class="adin">
        {!! $siteSetting->above_footer_ad !!}
    </div>
    <div class="clearfix"></div>
</div> --}}
<style>
    .footer-lis a:hover{
        color:#373092 !important;
    }
</style>

<div class="footerWrap">
    <div class="container">
        <div class="row">

            <!--Quick Links-->
            <div class="col-md-3 col-sm-6">
                <h5>{{ __('Quick Links') }}</h5>
                <!--Quick Links menu Start-->
                <ul class="quicklinks footer-lis">
                    <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>



                    @foreach ($show_in_footer_menu as $footer_menu)
                        @php
                            $cmsContent = App\CmsContent::getContentBySlug($footer_menu->page_slug);
                        @endphp

                        <li class="{{ Request::url() == route('cms', $footer_menu->page_slug) ? 'active' : '' }}"><a
                                href="{{ route('cms', $footer_menu->page_slug) }}">{{ $cmsContent->page_title }}</a>
                        </li>
                    @endforeach
                    <li class="postad"><a href="{{ route('post.job') }}">{{ __('Post a Job') }}</a></li>
                    <li><a href="{{ route('contact.us') }}">{{ __('Contact Us') }}</a></li>
                    <li><a href="{{ route('faq') }}">{{ __('FAQs') }}</a></li>
                </ul>
            </div>
            <!--Quick Links menu end-->

            <div class="col-md-3 col-sm-6">
                <h5>{{ __('Jobs By State') }}</h5>
                <!--Quick Links menu Start-->
                <ul class="quicklinks footer-lis">
                    @php
                        $stateAreas = App\State::getUsingStateAreas(10);
                    @endphp
                    @foreach ($stateAreas as $stateArea)
                        <li><a
                                href="{{ route('job.list', ['state_id[]' => $stateArea->state_id]) }}">{{ $stateArea->state }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>

            <!--Jobs By Industry-->
            <div class="col-md-3 col-sm-6">
                <h5>{{ __('Jobs By Industry') }}</h5>
                <!--Industry menu Start-->
                <ul class="quicklinks footer-lis">
                    @php
                        $industries = App\Industry::getUsingIndustries(10);
                    @endphp
                    @foreach ($industries as $industry)
                        <li><a
                                href="{{ route('job.list', ['industry_id[]' => $industry->industry_id]) }}">{{ $industry->industry }}</a>
                        </li>
                    @endforeach
                </ul>
                <!--Industry menu End-->
                <div class="clear"></div>
            </div>

            <!--About Us-->
            <div class="col-md-3 col-sm-12">
                <h5>{{ __('Contact Us') }}</h5>
                <div class="address">{{ $siteSetting->site_street_address }}</div>
                <div class="email"> <a
                        href="mailto:{{ $siteSetting->mail_to_address }}">{{ $siteSetting->mail_to_address }}</a>
                </div>
                <div class="phone"> <a
                        href="tel:{{ $siteSetting->site_phone_primary }}">{{ $siteSetting->site_phone_primary }}</a>

                </div>
                <div class="phone"> <a
                        href="tel:{{ $siteSetting->site_phone_secondary }}">{{ $siteSetting->site_phone_secondary }}</a>

                </div>
                <div class="website">
                    <a taget="_blank" href="sajilojob.com">www.sajilojob.com</a>

                </div>
                <!-- Social Icons -->
                <div class="social">@include('includes.footer_social')</div>
                <!-- Social Icons end -->

            </div>
            <!--About us End-->


        </div>
    </div>
</div>
<!--Footer end-->
<!--Copyright-->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="bttxt">{{ __('Copyright') }} &copy; {{ date('Y') }}
                    {{ $siteSetting->site_name }}.
                    {{ __('All Rights Reserved') }}. </div>
            </div>
            <div class="col-md-4">
                <!--<div class="paylogos"><img src="{{ asset('/') }}images/payment-icons.png" alt="" /></div>-->
                 <div class="paylogos">Designed & Developed by <a href="https://freelancernepal.com.np" target="_blank">freelancerunit</a></div>
            </div>
        </div>

    </div>
</div>
