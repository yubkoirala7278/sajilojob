<?php

namespace App\Traits;

use DB;
use File;
use ImgUploader;
use App\Company;
use App\Job;
use Carbon\Carbon;

trait CompanyTrait
{

    private function deleteCompanyLogo($id)
    {
        try {
            $company = Company::findOrFail($id);
            $image = $company->logo;
            if (!empty($image)) {
                File::delete(ImgUploader::real_public_path() . 'company_logos/thumb/' . $image);
                File::delete(ImgUploader::real_public_path() . 'company_logos/mid/' . $image);
                File::delete(ImgUploader::real_public_path() . 'company_logos/' . $image);
            }
            return 'ok';
        } catch (ModelNotFoundException $e) {
            return 'notok';
        }
    }
    
    private function deleteCompanyBgImage($id)
    {
        try {
            $company = Company::findOrFail($id);
            $image = $company->bg_image;
            if (!empty($image)) {
                File::delete(ImgUploader::real_public_path() . 'company_bg_images/thumb/' . $image);
                File::delete(ImgUploader::real_public_path() . 'company_bg_images/mid/' . $image);
                File::delete(ImgUploader::real_public_path() . 'company_bg_images/' . $image);
            }
            return 'ok';
        } catch (ModelNotFoundException $e) {
            return 'notok';
        }
    }

    private function getCompanyIdsAndNumJobs($limit = 16)
    {
        return DB::table('jobs')
                        ->select('company_id', DB::raw('COUNT(jobs.company_id) AS num_jobs'))
                        ->groupBy('company_id')
                        ->orderBy('num_jobs', 'DESC')
                        ->limit($limit)
                        ->get();
    }

    private function topHiringCompanies(){
        $jobs = Job::where('expiry_date', '>' ,Carbon::now())->orderBy('company_id','asc')->active()->get();
        $count = 0;
        $data = array();
        foreach($jobs as $job){
            if($count != $job->company_id){
                $company = Company::find($job->company_id);
                if($company->is_featured == 0){
                    array_push($data,$company->id);
                }
            }
            $count = $job->company_id;
        }
        $companies = Company::where('is_featured',1)->active()->get();
        foreach ($companies as $company){
            array_push($data,$company->id);
        }

        return $data;
    }

    private function getIndustryIdsFromCompanies($limit = 16)
    {
        $companies = Company::select('industry_id')->active()->whereHas('jobs', function ($query) {
                    $query->where('expiry_date', '>' ,Carbon::now())->active()->notExpire();
                })->withCount(['jobs' => function ($query) {
                        $query->active()->notExpire();
                    }])->get();

        $industries_array = [];
        foreach ($companies as $company) {
            if (isset($industries_array[$company->industry_id])) {
                $industries_array[$company->industry_id] = $industries_array[$company->industry_id] + $company->jobs_count;
            } else {
                $industries_array[$company->industry_id] = $company->jobs_count;
            }
        }
        arsort($industries_array);
        return array_slice($industries_array, 0, $limit - 1, true);
    }

    private function getCompanySEO($company)
    {
        $title = $company->name;
		
		$description = 'Company ';
        $keywords = '';

        $description .= ' ' . $company->name;
        $keywords .= $company->name . ',';

        $description .= ' ' . $company->getIndustry('industry');
        $keywords .= $company->getIndustry('industry') . ',';

        $description .= ' ' . $company->getOwnershipType('ownership_type');
        $keywords .= $company->getOwnershipType('ownership_type') . ',';

        $description .= ' ' . $company->location;
        $keywords .= $company->location . ',';

        //$description .= ' ' . $company->description;
        //$keywords .= $company->description . ',';

        $description .= ' ' . $company->getCountry('country');
        $keywords .= $company->getCountry('country') . ',';

        $description .= ' ' . $company->getState('state');
        $keywords .= $company->getState('state') . ',';

        $description .= ' ' . $company->getCity('city');
        $keywords .= $company->getCity('city') . ',';

        $seo = (object) array(
                    'seo_title' => $title,
                    'seo_description' => $description,
                    'seo_keywords' => $keywords,
                    'seo_other' => ''
        );
        return $seo;
    }

}
