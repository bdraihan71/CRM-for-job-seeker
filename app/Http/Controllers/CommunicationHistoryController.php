<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CommunicationRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class CommunicationHistoryController extends Controller
{
    public function __construct(
        protected CommunicationRepositoryInterface $communicationRepository
    ) {
    }
    public function index()
    {
        try {
            $communicationHistories = $this->communicationRepository->getAllCommunicationHistories();
            return view('backend.pages.communication.index')->with('communicationHistories', $communicationHistories);
        } catch (Exception $exception) {
            Log::error("get all communication error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            return redirect()->back()->with('error', 'An error occurred while fetching communication history.');
        }
    }

    public function create()
    {
        try {
            $data = $this->communicationRepository->showCreateCommunicationHistoryPage();
            return view('backend.pages.communication.create')->with([
                'applications' => $data['applications']
            ]);
        } catch (Exception $exception) {
            Log::error("create Communication error : " . json_encode($exception->getMessage()) . " User detail:" . auth()->user() . " trace : " . json_encode($exception->getTrace()));
            return redirect()->back()->with('error', 'An error occurred while creating Communication History.');
        }
    }
}
