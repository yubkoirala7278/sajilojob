{!! APFrmErrHelp::showOnlyErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'package_job') !!}">
        {!! Form::label('package_job', 'Package Job?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $package_job_1 = 'checked="checked"';
            $package_job_2 = '';
            $package_job_3 = '';
            if (old('package_job', isset($package) ? $package->package_job : 'top_job') == 'hot_job') {
                $package_job_1 = '';
                $package_job_2 = 'checked="checked"';
                $package_job_3 = '';
            }
            if (old('package_job', isset($package) ? $package->package_job : 'feature_job') == 'feature_job') {
                $package_job_1 = '';
                $package_job_2 = '';
                $package_job_3 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="top_job" name="package_job" type="radio" value="Top Job" {{ $package_job_1 }}>
                Top Job </label>
            <label class="radio-inline">
                <input id="hot_job" name="package_job" type="radio" value="Hot Job" {{ $package_job_2 }}>
                Hot Job </label>
            <label class="radio-inline">
                <input id="feature_job" name="package_job" type="radio" value="Feature Job" {{ $package_job_3 }}>
                Feature Job </label>
        </div>
        {!! APFrmErrHelp::showErrors($errors, 'package_job') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'package_title') !!}"> {!! Form::label('package_title', 'Package Title', ['class' => 'bold']) !!}
        {!! Form::text('package_title', null, ['class' => 'form-control', 'id' => 'package_title', 'placeholder' => 'Package Title']) !!}
        {!! APFrmErrHelp::showErrors($errors, 'package_title') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'package_price') !!}"> {!! Form::label('package_price', 'Package Price', ['class' => 'bold']) !!}
        {!! Form::text('package_price', null, ['class' => 'form-control', 'id' => 'package_price', 'placeholder' => 'Package Price']) !!}
        {!! APFrmErrHelp::showErrors($errors, 'package_price') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'package_num_days') !!}"> {!! Form::label('package_num_days', 'Package num days', ['class' => 'bold']) !!}
        {!! Form::text('package_num_days', null, ['class' => 'form-control', 'id' => 'package_num_days', 'placeholder' => 'Package num days']) !!}
        {!! APFrmErrHelp::showErrors($errors, 'package_num_days') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'package_num_listings') !!}"> {!! Form::label('package_num_listings', 'Package num listings*', ['class' => 'bold']) !!}
        {!! Form::text('package_num_listings', null, ['class' => 'form-control', 'id' => 'package_num_listings', 'placeholder' => 'Package num listings']) !!}
        {!! APFrmErrHelp::showErrors($errors, 'package_num_listings') !!}
        *On how many jobs a job seeker can apply<br />
        **How many jobs an employer can post </div>

    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'package_for') !!}">
        {!! Form::label('package_for', 'Package for?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $package_for_1 = 'checked="checked"';
            $package_for_2 = '';
            $package_for_3 = '';
            if (old('package_for', isset($package) ? $package->package_for : 'job_seeker') == 'employer') {
                $package_for_1 = '';
                $package_for_2 = 'checked="checked"';
                $package_for_3 = '';
            }
            if (old('package_for', isset($package) ? $package->package_for : 'cv_search') == 'cv_search') {
                $package_for_1 = '';
                $package_for_2 = '';
                $package_for_3 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="job_seeker" name="package_for" type="radio" value="job_seeker" {{ $package_for_1 }}>
                Job Seeker </label>
            <label class="radio-inline">
                <input id="employer" name="package_for" type="radio" value="employer" {{ $package_for_2 }}>
                Employer </label>
            <label class="radio-inline">
                <input id="cv_search" name="package_for" type="radio" value="cv_search" {{ $package_for_3 }}>
                Cv Search </label>
        </div>
        {!! APFrmErrHelp::showErrors($errors, 'package_for') !!}
    </div>
    <div class="form-actions"> {!! Form::button('Update <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', ['class' => 'btn btn-large btn-primary', 'type' => 'submit']) !!} </div>
</div>
