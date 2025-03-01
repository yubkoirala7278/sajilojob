@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Contact Us')])
<!-- Inner Page Title end -->
<div class="inner-page"> 
    <!-- About -->
    <div class="container">
        <div class="contact-wrap">
            <div class="title"> <span>{{__('We Are Here For Your Help')}}</span>
                <h2>{{__('GET IN TOUCH FAST')}}</h2>
                <!--<p>-->
                <!--    {{__('Vestibulum at magna tellus. Vivamus sagittis nunc aliquet. Vivamin orci aliquam')}}-->
                <!--    <br>-->
                <!--    {{__('eros vel saphicula. Donec eget ultricies ipsmconsequat')}}-->
                <!--</p>-->
            </div>            
                <!-- Contact Info -->
                <div class="contact-now">
				<div class="row"> 
                    <div class="col-lg-4 column">
                        <div class="contact"> <span><i class="fa fa-home"></i></span>
                            <div class="information"> <strong>{{__('Address')}}:</strong>
                                <p>{{ $siteSetting->site_street_address }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Info -->
                    <div class="col-lg-4 column">
                        <div class="contact"> <span><i class="fa fa-envelope"></i></span>
                            <div class="information"> <strong>{{__('Email Address')}}:</strong>
                                <p><a href="mailto:{{ $siteSetting->mail_to_address }}">{{ $siteSetting->mail_to_address }}</a></p>
                                <p><a href="mailto:cv@sajilojob.com">cv@sajilojob.com</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Info -->
                    <div class="col-lg-4 column">
                        <div class="contact"> <span><i class="fa fa-phone"></i></span>
                            <div class="information"> <strong>{{__('Phone')}}:</strong>
                                <p><a href="tel:{{ $siteSetting->site_phone_primary }}">{{ $siteSetting->site_phone_primary }}</a></p>
                                <p><a href="tel:{{ $siteSetting->site_phone_secondary }}">{{ $siteSetting->site_phone_secondary }}</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Info --> 
                </div>
					<div class="row"> 
                <div class="col-lg-4 column"> 
                    <!-- Google Map -->
                    <div class="googlemap">
                         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.5036081233234!2d85.33687311474291!3d27.70173308279422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb192693d73b7b%3A0xd3bf0f9e59b362be!2sSajiloJob.com!5e0!3m2!1sen!2snp!4v1625120560994!5m2!1sen!2snp" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <!-- Contact form -->
                <div class="col-lg-8 column">
                    <div class="contact-form">
                        <div id="message"></div>
                        <form method="post" action="{{ route('contact.us')}}" name="contactform" id="contactform">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6{{ $errors->has('full_name') ? ' has-error' : '' }}">                  
                                    {!! Form::text('full_name', null, array('id'=>'full_name', 'placeholder'=>__('Full Name'), 'required'=>'required', 'autofocus'=>'autofocus')) !!}                
                                    @if ($errors->has('full_name')) <span class="help-block"> <strong>{{ $errors->first('full_name') }}</strong> </span> @endif
                                </div>
                                <div class="col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">                  
                                    {!! Form::text('email', null, array('id'=>'email', 'placeholder'=>__('Email'), 'required'=>'required')) !!}                
                                    @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif
                                </div>
                                <div class="col-md-6{{ $errors->has('phone') ? ' has-error' : '' }}">                  
                                    {!! Form::text('phone', null, array('id'=>'phone', 'placeholder'=>__('Phone'))) !!}                
                                    @if ($errors->has('phone')) <span class="help-block"> <strong>{{ $errors->first('phone') }}</strong> </span> @endif
                                </div>
                                <div class="col-md-6{{ $errors->has('subject') ? ' has-error' : '' }}">                  
                                    {!! Form::text('subject', null, array('id'=>'subject', 'placeholder'=>__('Subject'), 'required'=>'required')) !!}                
                                    @if ($errors->has('subject')) <span class="help-block"> <strong>{{ $errors->first('subject') }}</strong> </span> @endif
                                </div>
                                <div class="col-md-12{{ $errors->has('message_txt') ? ' has-error' : '' }}">                  
                                    {!! Form::textarea('message_txt', null, array('id'=>'message_txt', 'placeholder'=>__('Message'), 'required'=>'required')) !!}                
                                    @if ($errors->has('message_txt')) <span class="help-block"> <strong>{{ $errors->first('message_txt') }}</strong> </span> @endif
                                </div>
                                <div class="col-md-12{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response')) <span class="help-block"> <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                                </div>
                                <div class="col-md-12">
                                    <button title="" class="button" type="submit" id="submit">{{__('Submit Now')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
					 </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection