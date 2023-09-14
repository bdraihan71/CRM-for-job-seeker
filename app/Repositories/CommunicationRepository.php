<?php

namespace App\Repositories;

use App\Models\Application;
use App\Models\CommunicationHistory;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Stage;
use App\Repositories\Interfaces\CommunicationRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;


class CommunicationRepository implements CommunicationRepositoryInterface
{

    public function getAllCommunicationHistories()
    {
        try {
            return CommunicationHistory::with('application')->latest()->get();
        } catch (Exception $exception) {
            Log::error("getAllCommunicationHistories error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            throw new Exception($exception->getMessage());
        }
    }
    public function showCreateCommunicationHistoryPage()
    {
        try {
            $applications = Application::pluck('job_title', 'id');
            return [
                'applications' => $applications
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

    public function generateSalary($salaryMin = 0, $salaryMax = 0)
    {
        return ['min' => $salaryMin, 'max' => $salaryMax];
    }

    public function createApplication($request)
    {
        try {
            $application = Application::create([
                'user_id' => auth()->user()->id,
                'job_title' => $request->job_title,
                'company_name' => $request->company_name,
                'job_source' => $request->job_source,
                'location' => $request->location,
                'country_id' => $request->country_id,
                'job_nature' => $request->job_nature,
                'office_type' => $request->office_type,
                'salary_range' => json_encode($this->generateSalary($request->input('salary_min'), $request->input('salary_max'))),
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

    public function updateApplication($request, $id)
    {
        try {
            $application = Application::findOrFail($id);
            $application->update([
                'user_id' => auth()->user()->id,
                'job_title' => $request->job_title,
                'current_stage_id' => $request->current_stage_id,
                'company_name' => $request->company_name,
                'job_source' => $request->job_source,
                'location' => $request->location,
                'country_id' => $request->country_id,
                'job_nature' => $request->job_nature,
                'office_type' => $request->office_type,
                'salary_range' => json_encode($this->generateSalary($request->input('salary_min'), $request->input('salary_max'))),
                'application_last_date' => $request->application_last_date,
                'detail' => $request->detail
            ]);
        } catch (Exception $exception) {
            Log::error("updateContact error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            throw new Exception($exception->getMessage());
        }
    }

    public function updateContact($request, $id)
    {
        try {
            $contact = Contact::where('application_id', $id)->first();
            $contact->update([
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
                'phone' => $request->phone,
                'social_link' => $request->social_link,
                'note' => $request->note
            ]);
        } catch (Exception $exception) {
            Log::error("updateContact error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            throw new Exception($exception->getMessage());
        }
    }

    public function updateOldApplication($request, $id)
    {
        try {
            $this->updateApplication($request, $id);
            $this->updateContact($request, $id);
        } catch (Exception $exception) {
            Log::error("updateApplication error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            throw new Exception($exception->getMessage());
        }
    }

    public function deleteApplication($applicationId)
    {
        try {
            $application = Application::findOrFail($applicationId);
            $application->delete();
            $application->contact()->delete();
        } catch (Exception $exception) {
            Log::error("deleteApplication error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            throw new Exception($exception->getMessage());
        }
    }
}
