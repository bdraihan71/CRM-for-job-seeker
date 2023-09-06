<?php

namespace App\Repositories;

use App\Models\Application;
use App\Models\Contact;
use App\Models\Country;
use App\Repositories\Interfaces\ApplicationRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;


class ApplicationRepository implements ApplicationRepositoryInterface
{

    public function getAllApplication()
    {
        try {
            return Application::where('user_id', auth()->user()->id)->latest()->get();
        } catch (Exception $exception) {
            Log::error("getAllApplication error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            throw new Exception($exception->getMessage());
        }
    }
    public function showCreateApplicationPage()
    {
        try {
            $countries = Country::get();
            $jobNatures = config('data.data.job_nature');
            $officeTypes = config('data.data.office_type');
            return [
                'countries' => $countries,
                'jobNatures' => $jobNatures,
                'officeTypes' => $officeTypes
            ];
        } catch (Exception $exception) {
            Log::error("create New Application error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            throw new Exception($exception->getMessage());
        }
    }
    public function getApplicationById($applicationId)
    {
        try {
            return  Application::findOrFail($applicationId);
        } catch (Exception $exception) {
            Log::error("getApplicationById error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            throw new Exception($exception->getMessage());
        }
    }

    public function createApplication($request)
    {
        try {
            $salary = ['min' => $request->input('salary_min'), 'max' => $request->input('salary_max')];
            $application = Application::create([
                'user_id' => auth()->user()->id,
                'job_title' => $request->job_title,
                'company_name' => $request->company_name,
                'job_source' => $request->job_source,
                'location' => $request->location,
                'country_id' => $request->country_id,
                'job_nature' => $request->job_nature,
                'office_type' => $request->office_type,
                'salary_range' => json_encode($salary),
                'application_last_date' => $request->application_last_date,
                'detail' => $request->detail
            ]);

            return $application;
        } catch (Exception $exception) {
            Log::error("createApplication error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            throw new Exception($exception->getMessage());
        }
    }

    public function createContact($request)
    {
        try {
            $application = $this->createApplication($request);
            Contact::create([
                'user_id' => auth()->user()->id,
                'application_id' => $application->id,
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'phone' => $request->phone,
                'social_link' => $request->social_link,
                'note' => $request->note
            ]);
        } catch (Exception $exception) {
            Log::error("createContact error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            throw new Exception($exception->getMessage());
        }
    }
    public function createNewApplication($request)
    {
        try {
            $this->createContact($request);
        } catch (Exception $exception) {
            Log::error("createNewApplication error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            throw new Exception($exception->getMessage());
        }
    }
    public function deleteApplication($applicationId)
    {
    }
}
