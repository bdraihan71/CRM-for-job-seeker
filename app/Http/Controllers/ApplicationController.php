<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationFromRequest;
use App\Models\Application;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ApplicationController extends Controller
{
    public function index()
    {
        try {
            $applications = Application::where('user_id', auth()->user()->id)->latest()->get();
            return view('backend.pages.application.index')->with('applications', $applications);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching applications.');
        }
    }

    public function create()
    {
        $countries = Country::get();
        $jobNatures = config('data.data.job_nature');
        $officeTypes = config('data.data.office_type');
        return view('backend.pages.application.create')->with([
            'countries' => $countries,
            'jobNatures' =>  $jobNatures,
            'officeTypes' =>  $officeTypes
        ]);
    }

    public function show($id)
    {
        try {
            $application = Application::findOrFail($id);
            return view('backend.pages.application.show')->with('application', $application);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching application.');
        }
    }
    public function store(ApplicationFromRequest $request)
    {

        try {
            $salary = ['min' => $request->input('salary_min'), 'max' => $request->input('salary_max')];

            $application = new Application();
            $application->user_id = auth()->user()->id;
            $application->job_title = $request->input('job_title');
            $application->company_name = $request->input('company_name');
            $application->job_source = $request->input('job_source');
            $application->location = $request->input('location');
            $application->country_id = $request->input('country_id');
            $application->job_nature = $request->input('job_nature');
            $application->office_type = $request->input('office_type');
            $application->salary_range = json_encode($salary);
            $application->application_last_date = $request->input('application_last_date');
            $application->detail = $request->input('detail');
            $application->save();
            return redirect()->route('application.index')->with('message', 'Application added Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding the application.');
        }
    }

    public function update(Request $request, $id)
    {
        
        try {
            $application = Application::findOrFail($id);
            $application->stage_name = $request->input('stage_name');
            $application->save();
            return redirect()->route('application.index')->with('info', 'Application Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the application.');
        }
    }

    public function destroy($id)
    {
        try {
            $application = Application::findOrFail($id);
            $application->delete();
            return redirect()->route('application.index')->with('warning', 'Application Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the application.');
        }
    }
}
