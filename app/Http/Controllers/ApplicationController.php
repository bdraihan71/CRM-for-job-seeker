<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationFromRequest;
use App\Models\Application;
use App\Models\Country;
use App\Repositories\Interfaces\ApplicationRepositoryInterface;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;


class ApplicationController extends Controller
{
    public function __construct(
        protected ApplicationRepositoryInterface $applicationRepository
    ) {
    }
    public function index()
    {
        try {
            $applications = $this->applicationRepository->getAllApplication();
            return view('backend.pages.application.index')->with('applications', $applications);
        } catch (Exception $exception) {
            Log::error("get all application error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            return redirect()->back()->with('error', 'An error occurred while fetching applications.');
        }
    }

    public function create()
    {
        try {
            $data = $this->applicationRepository->showCreateApplicationPage();
            return view('backend.pages.application.create')->with([
                'countries' => $data['countries'],
                'jobNatures' =>  $data['jobNatures'],
                'officeTypes' =>  $data['officeTypes']
            ]);
        } catch (Exception $exception) {
            Log::error("create application error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            return redirect()->back()->with('error', 'An error occurred while creating applications.');
        }
    }

    public function show($id)
    {
        try {
            $application = $this->applicationRepository->getApplicationById($id);
            return view('backend.pages.application.show')->with('application', $application);
        } catch (Exception $exception) {
            Log::error("Show application error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            return redirect()->back()->with('error', 'An error occurred while fetching application.');
        }
    }
    public function store(ApplicationFromRequest $request)
    {
        try {
            $this->applicationRepository->createNewApplication($request);
            return redirect()->route('application.index')->with('message', 'Application added Successfully');
        } catch (Exception $exception) {
            Log::error("store application error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            return redirect()->back()->with('error', 'An error occurred while adding the application.');
        }
    }

    public function edit($id)
    {
        try {
            $data = $this->applicationRepository->showCreateApplicationPage();
            $application = $this->applicationRepository->getApplicationById($id);
            return view('backend.pages.application.edit')->with([
                'countries' => $data['countries'],
                'jobNatures' =>  $data['jobNatures'],
                'officeTypes' =>  $data['officeTypes'],
                'application' => $application
            ]);
        } catch (Exception $exception) {
            Log::error("edit application error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            return redirect()->back()->with('error', 'An error occurred while Edit the application.');
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
            $this->applicationRepository->deleteApplication($id);
            return redirect()->route('application.index')->with('warning', 'Application Deleted Successfully');
        } catch (Exception $exception) {
            Log::error("delete application error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            return redirect()->back()->with('error', 'An error occurred while deleting the application.');
        }
    }
}
