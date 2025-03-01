<div class="section">
    <style>
        .quicklinks a:hover {
            color: black !important;
        }

    </style>
    <div style="border: 0.5px solid #CCCAD2;">
        <div class="titleTop p-2 pl-3">
            <h5 class="m-0">{{ __('Jobs By Functional Area') }}</h5>
        </div>
        <!--Quick Links menu Start-->
        <div class="p-2" style="border-top: 0.5px solid #CCCAD2;">
            <ul class="quicklinks">
                @php
                    $functionalAreas = App\FunctionalArea::getUsingFunctionalAreas(10);
                    
                @endphp
                @foreach ($functionalAreas as $functionalArea)
                    @php
                        $jobs = App\Job::notExpire()->where('functional_area_id', $functionalArea->id)->get();
                        $count = 0;
                        foreach ($jobs as $job) {
                            $count++;
                        }
                    @endphp

                    <li class="mt-1 mb-2 pl-2"><a style="text-decoration:none;"
                            href="{{ route('job.list', ['functional_area_id[]' => $functionalArea->functional_area_id]) }}">{{ $functionalArea->functional_area }}
                            ({{ $count }})</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0"
        nonce="rhzdjRnT"></script>
    <hr>
    <hr>
    <hr>
    <div class="fb-page" data-href="https://www.facebook.com/sajilojob" data-tabs="timeline" data-width=""
        data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
        data-show-facepile="false">
        <blockquote cite="https://www.facebook.com/sajilojob" class="fb-xfbml-parse-ignore"><a
                href="https://www.facebook.com/sajilojob">Sajilo Job</a></blockquote>
    </div>
</div>
