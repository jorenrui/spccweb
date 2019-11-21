<?php

namespace App\Http\Controllers;

use App\Models\SClass;
use App\Models\Activity;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileSummaryOfGrades extends Controller
{
    public function index($id, $period)
    {
        $sclass = SClass::find($id);

        return view('file_som.index')
                ->with('sclass', $sclass)
                ->with('period', $period);
    }

    public function store($id, $period, Request $request)
    {
        $this->validate($request, [
            'sog_file' => 'required|mimes:pdf|max:10240'
        ]);

        ini_set('memory_limit', '4096M');

        $sclass = SClass::find($id);

        if($period == 'prelims') {
            if($sclass->sog_prelims != null) {
                Storage::disk('public')->delete($sclass->sog_prelims);
            }
        }
        else if($period == 'midterms') {
            if($sclass->sog_midterms != null) {
                Storage::disk('public')->delete($sclass->sog_midterms);
            }
        }
        else if($period == 'finals') {
            if($sclass->sog_finals != null) {
                Storage::disk('public')->delete($sclass->sog_finals);
            }
        }
        else if($period == 'average') {
            if($sclass->sog_average != null) {
                Storage::disk('public')->delete($sclass->sog_average);
            }
        }

        $filename = $sclass->acad_term_id . '_' . $sclass->course_code . '_SOG-' . $sclass->class_id . '_' . strtoupper($period) . '.pdf';

        $path = $request->file('sog_file')
                    ->storeAs('/summary_of_grades', $filename, "public");

        if($period == 'prelims')
            $sclass->sog_prelims = $path;
        else if($period == 'midterms')
            $sclass->sog_midterms = $path;
        else if($period == 'finals')
            $sclass->sog_finals = $path;
        else if($period == 'average')
            $sclass->sog_average = $path;

        $sclass->save();

        // Add Activity
        $activity = new Activity;
        $activity->user_id = auth()->user()->id;
        $activity->description = 'has uploaded the ' . $period . ' summary of grades for ' . $sclass->course_code . ' class.';
        $activity->timestamp = now();
        $activity->save();

        if(auth()->user()->employee->employee_no == $sclass->instructor_id)
            return redirect('/faculty/load/' . $sclass->class_id)->with('success', ucfirst($period) . ' Summary of Grades Uploaded');

        return redirect('/grades/' . $sclass->class_id)->with('success', ucfirst($period) . ' Summary of Grades Uploaded');
    }

    public function download($id, $period)
    {
        $sclass = SClass::find($id);

        if($period == 'prelims') {
            $file = $sclass->sog_prelims;
        }
        else if($period == 'midterms') {
            $file = $sclass->sog_midterms;
        }
        else if($period == 'finals') {
            $file = $sclass->sog_finals;
        }
        else if($period == 'average') {
            $file = $sclass->sog_average;
        }

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Storage::disk('public')->download($file);
    }

    public function view($id, $period)
    {
        $sclass = SClass::find($id);

        if($period == 'prelims') {
            $file = $sclass->sog_prelims;
        }
        else if($period == 'midterms') {
            $file = $sclass->sog_midterms;
        }
        else if($period == 'finals') {
            $file = $sclass->sog_finals;
        }
        else if($period == 'average') {
            $file = $sclass->sog_average;
        }

        return Storage::disk('public')->response($file);
    }

    public function remove($id, $period)
    {
        $sclass = SClass::find($id);

        if($period == 'prelims') {
            Storage::disk('public')->delete($sclass->sog_prelims);
            $sclass->sog_prelims = null;
        }
        else if($period == 'midterms') {
            Storage::disk('public')->delete($sclass->sog_midterms);
            $sclass->sog_midterms = null;
        }
        else if($period == 'finals') {
            Storage::disk('public')->delete($sclass->sog_finals);
            $sclass->sog_finals = null;
        }
        else if($period == 'average') {
            Storage::disk('public')->delete($sclass->sog_average);
            $sclass->sog_average = null;
        }

        $sclass->save();

        // Add Activity
        $activity = new Activity;
        $activity->user_id = auth()->user()->id;
        $activity->description = 'has removed the ' . $period . ' summary of grades for ' . $sclass->course_code . ' class.';
        $activity->timestamp = now();
        $activity->save();

        if(auth()->user()->employee->employee_no == $sclass->instructor_id)
            return redirect('/faculty/load/' . $sclass->class_id)->with('success', ucfirst($period) . ' Summary of Grades Removed');

        return redirect('/grades/' . $sclass->class_id)->with('success', ucfirst($period) . ' Summary of Grades Removed');

    }
}
