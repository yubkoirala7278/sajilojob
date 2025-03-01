<div class="section">
    <div class="container" style="box-shadow: 3px 8px 15px rgba(0, 0, 0, 0.2);">
        <!-- title start -->
        <div class="titleTop pt-3 text-center">
            <h5>{{ __('Top Hiring') }} <span style="color:#373092" ;>{{ __('Companies') }}</span></h5>
        </div>
        <!-- title end -->
        <ul class="employerList owl-carousel">
            <!--employer-->
            @if (isset($topHiringCompanies) && count($topHiringCompanies))
                @foreach ($topHiringCompanies as $company_id)
                    <?php
                    $company = App\Company::where('id', '=', $company_id)
                    ->active()
                    ->first();
                    if (null !== $company) { ?>

                    <li class="item" data-toggle="tooltip" data-placement="bottom" title="{{ $company->name }}"
                        data-original-title="{{ $company->name }}">
                        <div class="empint">
                            <a href="{{ route('company.detail', $company->slug) }}"
                                title="{{ $company->name }}">{{ $company->printCompanyImage() }}</a>

                        </div>
                    </li>
                    <?php }
                    ?>
                @endforeach
            @endif
        </ul>

    </div>


    <!--<div class="largebanner shadow3">-->
    <!--    <div class="adin">-->
    <!--        {!! $siteSetting->index_page_below_top_employes_ad !!}-->
    <!--    </div>-->
    <!--    <div class="clearfix"></div>-->
    <!--</div>-->



</div>
