<?php

namespace App\Http\Controllers;

use App\Http\Requests\StageFromRequest;
use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    public function index()
    {
        try {
            $stages = Stage::latest()->get();
            return view('backend.pages.stage.index')->with('stages', $stages);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while fetching stages.');
        }
    }

    public function store(StageFromRequest $request)
    {
        try {
            Stage::create([
                'stage_name' => $request->stage_name
            ]);
            return redirect()->route('stage.index')->with('message', 'Stage added Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding the stage.');
        }
    }

    public function update(StageFromRequest $request, $id)
    {
        try {
            $stage = Stage::findOrFail($id);
            $stage->update([
                'stage_name' => $request->stage_name
            ]);
            return redirect()->route('stage.index')->with('info', 'Stage Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the stage.');
        }
    }

    public function destroy($id)
    {
        try {
            $stage = Stage::findOrFail($id);
            $stage->delete();
            return redirect()->route('stage.index')->with('warning', 'Stage Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the stage.');
        }
    }
}
