<?php

namespace App\Http\Controllers;

use App;
use App\Seo;
use App\Job;
use App\Company;
use App\FunctionalArea;
use App\Country;
use App\Video;
use App\State;
use App\Testimonial;
use App\Slider;
use App\Blog;
use Illuminate\Http\Request;
use Redirect;
use App\Traits\CompanyTrait;
use App\Traits\FunctionalAreaTrait;
use App\Traits\CityTrait;
use App\Traits\JobTrait;
use App\Traits\Active;
use App\Helpers\DataArrayHelper;

class IndexController extends Controller
{

    use CompanyTrait;
    use FunctionalAreaTrait;
    use CityTrait;
    use JobTrait;
    use Active;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topCompanyIds = $this->getCompanyIdsAndNumJobs(16);
        $topHiringCompanies = $this->topHiringCompanies();
        $topFunctionalAreaIds = $this->getFunctionalAreaIdsAndNumJobs(32);
        $topIndustryIds = $this->getIndustryIdsFromCompanies(32);
        $topCityIds = $this->getCityIdsAndNumJobs(32);
        $topStateIds = State::where('country_id',153)->orderBy('state','asc')->limit(8)->get();
        $featuredJobs = Job::active()->featured()->notExpire()->orderBy('id', 'desc')->get();
        $topJobs = Job::active()->where('is_top',1)->notExpire()->limit(15)->orderBy('id', 'desc')->get();
        $latestJobs = Job::active()->where('is_hot',1)->notExpire()->orderBy('id', 'desc')->limit(15)->get();
        $blogs = Blog::orderBy('id', 'desc')->where('lang', 'like', \App::getLocale())->limit(3)->get();
        $video = Video::getVideo();
        $testimonials = Testimonial::langTestimonials();

        $functionalAreas = DataArrayHelper::langFunctionalAreasArray();
        $countries = DataArrayHelper::langCountriesArray();
		$sliders = Slider::langSliders();

        $seo = SEO::where('seo.page_title', 'like', 'front_index_page')->first();
        return view('welcome')
                        ->with('topCompanyIds', $topCompanyIds)
                        ->with('topHiringCompanies', $topHiringCompanies)
                        ->with('topFunctionalAreaIds', $topFunctionalAreaIds)
                        ->with('topCityIds', $topCityIds)
                        ->with('topStateIds', $topStateIds)
                        ->with('topIndustryIds', $topIndustryIds)
                        ->with('featuredJobs', $featuredJobs)
                        ->with('topJobs', $topJobs)
                        ->with('latestJobs', $latestJobs)
                        ->with('blogs', $blogs)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('countries', $countries)
						->with('sliders', $sliders)
                        ->with('video', $video)
                        ->with('testimonials', $testimonials)
                        ->with('seo', $seo);
    }

    public function setLocale(Request $request)
    {
        $locale = $request->input('locale');
        $return_url = $request->input('return_url');
        $is_rtl = $request->input('is_rtl');
        $localeDir = ((bool) $is_rtl) ? 'rtl' : 'ltr';

        session(['locale' => $locale]);
        session(['localeDir' => $localeDir]);

        return Redirect::to($return_url);
    }

}
