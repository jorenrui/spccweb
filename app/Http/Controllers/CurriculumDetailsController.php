<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\CurriculumDetails;
use App\Models\Prerequisite;
use App\Models\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurriculumDetailsController extends Controller
{
    private function filterCourses($id, $except_course = null) {
        $curriculum = Curriculum::find($id);
        $cur_details = CurriculumDetails::where('curriculum_id', $curriculum->curriculum_id)
                        ->orderBy('course_code', 'asc')->get();
        $all_courses = Course::orderBy('course_code', 'asc')->get();

        $courses = array();

        foreach($all_courses as $course) {
            $found = false;
            foreach($cur_details as $cur_detail) {
                if($course->course_code == $except_course) {
                    break;
                } else if($course->course_code == $cur_detail->course_code) {
                    $found = true;
                    break;
                }
            }

            if(!$found)
                array_push($courses, $course);
        }

        return $courses;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $curriculum = Curriculum::find($id);
        $courses = $this->filterCourses($id);
        $prereq_courses = $curriculum->curriculumDetails;

        return view('curriculum_details.create')
                ->with('curriculum', $curriculum)
                ->with('courses', $courses)
                ->with('prereq_courses', $prereq_courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'curriculum_id' => 'required',
            'course_code' => 'required',
            'sy' => 'required',
            'semester' => 'required',
            'is_year_standing' => 'required'
        ]);

        // Add Curriculum Detail
        $cur_details = new CurriculumDetails;
        $cur_details->curriculum_id = $request->input('curriculum_id');
        $cur_details->course_code = $request->input('course_code');
        $cur_details->sy = $request->input('sy');
        $cur_details->semester = $request->input('semester');
        $cur_details->is_year_standing = $request->input('is_year_standing');
        $cur_details->save();

        // Add Pre requisites
        if ($request->input('pre_req') != []) {

            foreach($request->input('pre_req') as $course_code) {
                $pre_req = new Prerequisite;
                $pre_req->curriculum_details_id = $cur_details->curriculum_details_id;
                $pre_req->course_code = $course_code;
                $pre_req->save();
            }

        }

        return redirect('/curriculums/' . $request->input('curriculum_id'))->with('success', 'Course Added to Curriculum');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cur_detail = CurriculumDetails::find($id);
        $courses = $this->filterCourses($cur_detail->curriculum_id, $cur_detail->course_code);
        $curriculum = Curriculum::find($cur_detail->curriculum_id);
        $prereq_courses = $curriculum->curriculumDetails;

        return view('curriculum_details.edit')
                ->with('cur_detail', $cur_detail)
                ->with('courses', $courses)
                ->with('prereq_courses', $prereq_courses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'curriculum_id' => 'required',
            'course_code' => 'required',
            'sy' => 'required',
            'semester' => 'required',
            'is_year_standing' => 'required'
        ]);

        // Update Curriculum Detail
        $cur_details = CurriculumDetails::find($id);
        $cur_details->curriculum_id = $request->input('curriculum_id');
        $cur_details->course_code = $request->input('course_code');
        $cur_details->sy = $request->input('sy');
        $cur_details->semester = $request->input('semester');
        $cur_details->is_year_standing = $request->input('is_year_standing');
        $cur_details->save();

        // Update Pre requisites
        if ($request->input('pre_req') != []) {

            // Delete All Pre requisites
            foreach ($cur_details->prerequisites as $pre_req) {
                $prerequisite = Prerequisite::find($pre_req->prerequisite_id);
                $prerequisite->delete();
            }

            // Add Inputted Pre requisites
            foreach ($request->input('pre_req') as $course_code) {
                $prerequisite = new Prerequisite;
                $prerequisite->curriculum_details_id = $cur_details->curriculum_details_id;
                $prerequisite->course_code = $course_code;
                $prerequisite->save();
            }

        }

        return redirect('/curriculums/' . $request->input('curriculum_id'))->with('success', 'Course in Curriculum Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cur_detail = CurriculumDetails::find($id);

        $curriculum_id = $cur_detail->curriculum_id;

        $cur_detail->delete();

        return redirect('/curriculums/' . $curriculum_id)->with('success', 'Course Removed in Curriculum');
    }
}
